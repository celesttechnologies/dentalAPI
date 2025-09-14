<?php

namespace App\Services;

use App\Http\Resources\PatientWithAppointmentResource;
use App\Models\Patient;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PatientService
{
    /**
     * Create a new patient record.
     *
     * @param array $data The validated data for creating the patient
     * @return Patient The newly created patient model
     */
    public function createPatient(array $data): Patient
    {
        return DB::transaction(function () use ($data) {
            $patient = Patient::create($data);

            $patient->patient_addresses()->create([
                'PatientID' => $patient->PatientID,
                'AddressLine1' => $data['AddressLine1'],
                'AddressLine2' => $data['AddressLine2'],
                'Street' => $data['Street'],
                'Area' => $data['Area'],
                'City' => $data['City'],
                'State' => $data['State'],
                'Country' => $data['Country'],
                'ZipCode' => $data['ZipCode'],
            ]);

            return $patient;
        });
    }

    public function getPatients($perPage = 50, $search = null, $dateFilter = 'all', $startDate, $endDate)
    {
        if ($dateFilter === 'all') {
            $patientList = Patient::when($search, function (Builder $query, string $search) {
                $query->whereAny(['FirstName', 'LastName'], 'like', "%$search%");
            })
                ->paginate($perPage);
        } else {
            // Use whereHas when you want to filter patients based on conditions in their related appointments.
            // Use with when you want to eager load appointments, but not filter patients by them.
            // Here, since you want to filter patients who have appointments matching certain criteria, whereHas is correct.
            $patientList = Patient::select('Patient.*')
                ->join('Appointments as a', 'a.PatientID', '=', 'Patient.PatientID')
                ->when($dateFilter, function (Builder $query) use ($dateFilter, $startDate, $endDate) {
                    if ($dateFilter === 'today') {
                        $query->whereDate('a.StartDateTime', Carbon::now()->toDateString());
                    } elseif ($dateFilter === 'recent') {
                        $query->whereDate('a.StartDateTime', '>=', Carbon::now()->subDays(7)->toDateString())
                            ->whereDate('a.StartDateTime', '<=', Carbon::now()->toDateString());
                    } elseif ($dateFilter === 'custom' && $startDate && $endDate) {
                        $query->whereDate('a.StartDateTime', '>=', $startDate)
                            ->whereDate('a.EndDateTime', '<=', $endDate);
                    }
                })
                ->when($search, function (Builder $query, string $search) {
                    $query->whereAny(['Patient.FirstName', 'Patient.LastName'], 'like', "%$search%");
                })
                ->paginate($perPage);
        }

        return [
            'patients' => $patientList,
            'pagination' => [
                'currentPage' => $patientList->currentPage(),
                'perPage' => $patientList->perPage(),
                'total' => $patientList->total(),
            ]
        ];
    }

    /**
     * Elasticsearch-powered patient search with appointment date filtering.
     */
    public function getPatientsNew($perPage = 50, $search = null, $dateFilter = 'all', $startDate = null, $endDate = null)
    {
        $page = request('page', 1);
        $client = Patient::getElasticsearchClient();
        $must = [];

        if ($search) {
            // We combine prefix expansion (phrase_prefix) with a fuzzy match so that:
            //  - "ded" matches tokens that START with "ded" (e.g. dedhia)
            //  - also tolerates one-character typos giving variations like "deo", "der"
            // This works with your existing standard analyzer; no reindex / synonyms needed.
            $must[] = [
                'bool' => [
                    'should' => [
                        [
                            'multi_match' => [
                                'query' => $search,
                                'fields' => [
                                    'first_name^3',
                                    'last_name^3',
                                    'first_name',
                                    'last_name',
                                    'email',
                                    'email2',
                                    'phone',
                                    'mobile'
                                ],
                                'type' => 'phrase_prefix'
                            ]
                        ],
                        [
                            'multi_match' => [
                                'query' => $search,
                                'fields' => [
                                    'first_name^2',
                                    'last_name^2',
                                    'first_name',
                                    'last_name',
                                    'email',
                                    'email2',
                                    'phone',
                                    'mobile'
                                ],
                                'fuzziness' => 'AUTO',
                                'prefix_length' => 1,
                                'operator' => 'OR'
                            ]
                        ]
                    ],
                    'minimum_should_match' => 1
                ]
            ];
        }

        // Appointment date filter logic
        if ($dateFilter !== 'all') {
            $dateRange = [];
            if ($dateFilter === 'today') {
                $date = Carbon::now()->toDateString();
                $dateRange = ['gte' => $date, 'lte' => $date];
            } elseif ($dateFilter === 'recent') {
                $dateRange = [
                    'gte' => Carbon::now()->subDays(7)->toDateString(),
                    'lte' => Carbon::now()->toDateString(),
                ];
            } elseif ($dateFilter === 'custom' && $startDate && $endDate) {
                $dateRange = ['gte' => $startDate, 'lte' => $endDate];
            }
            if ($dateRange) {
                $must[] = [
                    'range' => [
                        'appointments.start_date' => $dateRange
                    ]
                ];
            }
        }

        $params = [
            'index' => 'patients',
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => $must
                    ]
                ],
                'from' => ($page - 1) * $perPage,
                'size' => $perPage
            ]
        ];
        $results = $client->search($params);
        $hits = $results['hits']['hits'] ?? [];
        $ids = collect($hits)->pluck('_source.id')->all();
        $patients = Patient::whereIn('PatientID', $ids)->get();

        // Manual pagination
        $total = $results['hits']['total']['value'] ?? 0;
        $paginated = $patients;

        return [
            'patients' => $paginated,
            'pagination' => [
                'current_page' => $page,
                'per_pages' => $perPage,
                'total' => $total,
            ]
        ];
    }

    public function deletePatient($patient)
    {
        $patient->delete();
        return true;
    }

    /**
     * Update an existing patient record.
     *
     * @param Patient $patient The patient model to update
     * @param array $data The validated data for updating the patient
     * @return Patient The updated patient model
     */
    public function updatePatient(Patient $patient, array $data): Patient
    {
        $patient->update($data);
        $patient->fresh();
        return $patient;
    }

    /**
     * Store the photo path for a patient.
     *
     * @param Patient $patient The patient model to update
     * @param string $photoPath The path to the uploaded photo
     * @return Patient The updated patient model
     */
    public function storePatientPhoto(Patient $patient, string $photoPath): Patient
    {
        $patient->ImagePath = $photoPath;
        $patient->save();
        return $patient;
    }

    public function getPatientWithAppointments($patient)
    {
        try {
            return new PatientWithAppointmentResource($patient);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException('Patient not found.');
        } catch (Exception $e) {
            throw new Exception('An error occurred while retrieving the patient data.');
        }
    }

    /**
     * Advanced search based on JSON filters (no Elasticsearch dependency).
     * Supported keys: first_name, last_name, mobile, building.
     * "building" maps to AddressLine1 (adjust if different schema).
     */
    public function advancedSearchPatients(int $perPage = 50, array $filters = [])
    {
        $query = Patient::query();
        if (!empty($filters['first_name'])) {
            $query->where('FirstName', 'like', '%' . $filters['first_name'] . '%');
        }
        if (!empty($filters['last_name'])) {
            $query->where('LastName', 'like', '%' . $filters['last_name'] . '%');
        }
        if (!empty($filters['mobile'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('MobileNumber', 'like', '%' . $filters['mobile'] . '%')
                    ->orWhere('PhoneNumber', 'like', '%' . $filters['mobile'] . '%');
            });
        }
        if (!empty($filters['building'])) {
            $query->where('AddressLine1', 'like', '%' . $filters['building'] . '%');
        }
        $patientList = $query->paginate($perPage);
        return [
            'patients' => $patientList,
            'pagination' => [
                'currentPage' => $patientList->currentPage(),
                'perPage' => $patientList->perPage(),
                'total' => $patientList->total(),
            ]
        ];
    }
}
