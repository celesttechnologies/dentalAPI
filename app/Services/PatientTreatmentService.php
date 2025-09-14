<?php

namespace App\Services;

use App\Models\PatientTreatment;
use Illuminate\Support\Str;
use App\Http\Resources\PatientTreatmentResource;
use App\Http\Resources\PatientGetCompletedTreatmentResource;;

use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Patient;
use Carbon\Carbon;
//use App\Traits\ApiResponse;
class PatientTreatmentService
{
    public function getTreatmentDetails()
    {
        return PatientTreatmentResource::collection(
            PatientTreatment::select(['PatientTreatmentID', 'PatientID', 'ProviderID', 'TreatmentTypeID', 'TeethTreatment', 'TreatmentDetails', 'TreatmentCost'])->get()
        );
    }

    /**
     * Create a new patient treatment record.
     *
     * @param array $data The validated data for creating the patient treatment
     * @return PatientTreatment The newly created patient treatment model
     */
    public function createTreatment(array $data): PatientTreatment
    {
        return PatientTreatment::create($data);
    }

    /**
     * Update an existing patient treatment record.
     *
     * @param PatientTreatment $patientTreatment The patient treatment model to update
     * @param array $data The validated data for updating the patient treatment
     * @return PatientTreatment The updated patient treatment model
     */
    public function updateTreatment(PatientTreatment $patientTreatment, array $data): PatientTreatment
    {
        $patientTreatment->update($data);
        return $patientTreatment;
    }

    public function deletePatientTreatment($id)
    {
        $patient = PatientTreatment::findOrFail($id);

        $patient->delete();
        return true;
    }


    public function getOngoingTreatmentDetails(Patient $patient)
    {
        try {
            Log::info('Fetching ongoing treatments for Patient ID: ' . $patient->id);

            // Fetch only "ongoing" treatments using Lazy Query
            $treatments = $patient->treatments()
                ->where('IsArchived', 0)
                ->with(['provider:ProviderID,ProviderName']) // Eager load provider details
                ->get(); // Lazy Query (efficient memory usage)

            if ($treatments->isEmpty()) {
                Log::warning('No ongoing treatments found for Patient ID: ' . $patient->id);
                return [];
            }

            Log::info('Ongoing treatments retrieved successfully.');

            // Convert to JSON Resource
            return PatientGetCompletedTreatmentResource::collection($treatments);
        } catch (Exception $e) {
            Log::error('Error retrieving ongoing treatments', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            return [];
        }
    }


    public function getCompletedTreatmentDetails(Patient $patient)
    {
        try {
            Log::info('Fetching ongoing treatments for Patient ID: ' . $patient->id);

            $treatments = $patient->treatments()
                ->where('IsArchived', 1)
                ->with(['provider:ProviderID,ProviderName']) // Eager load provider details
                ->get(); // Lazy Query (efficient memory usage)

            if ($treatments->isEmpty()) {
                Log::warning('No ongoing treatments found for Patient ID: ' . $patient->id);
                return [];
            }

            Log::info('Ongoing treatments retrieved successfully.');

            // Convert to JSON Resource
            return PatientGetCompletedTreatmentResource::collection($treatments);
        } catch (Exception $e) {
            Log::error('Error retrieving ongoing treatments', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            return [];
        }
    }
}
