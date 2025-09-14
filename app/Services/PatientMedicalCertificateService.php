<?php

namespace App\Services;

use App\Models\PatientMedicalCertificate; // Assuming you have a PatientMedicalCertificate model
use App\Http\Resources\PatientMedicalCertificateResource; // Assuming you have a resource for Patient Medical Certificate
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientMedicalCertificateService
{
    /**
     * Get a paginated list of Patient Medical Certificates.
     *
     * @param int $perPage
     * @return array
     */
    public function getMedicalCertificates(Patient $patient, int $perPage): array
    {
        $data = PatientMedicalCertificate::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated medical certificates

        return [
            'medical_certificates' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new Patient Medical Certificate.
     *
     * @param array $data
     * @return PatientMedicalCertificate
     */
    public function createMedicalCertificate(array $data): PatientMedicalCertificate
    {
        return PatientMedicalCertificate::create($data); // Create a new medical certificate
    }
    /**
     * Update an existing Patient Medical Certificate.
     *
     * @param PatientMedicalCertificate $certificate
     * @param array $data
     * @return PatientMedicalCertificate
     * @throws ModelNotFoundException
     */
    public function updateMedicalCertificate(PatientMedicalCertificate $certificate, array $data): PatientMedicalCertificate
    {
        $certificate->update($data); // Update the medical certificate with new data
        $certificate->fresh(); // Update the medical certificate with new data

        return $certificate; // Return the updated medical certificate
    }
}    