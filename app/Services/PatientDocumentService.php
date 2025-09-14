<?php

namespace App\Services;

use App\Models\PatientDocument;
use App\Http\Resources\PatientDocumentResource;
use App\Models\Patient;

class PatientDocumentService
{
    /**
     * Get a paginated list of Patient Documents.
     *
     * @param int $perPage
     * @return array
     */
    public function getDocuments(Patient $patient, int $perPage): array
    {
        $data = PatientDocument::where('PatientID', $patient->id)->paginate($perPage); // Fetch only non-deleted documents

        return [
            'documents' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new patient document record.
     *
     * @param array $data The validated data for creating the patient document
     * @return PatientDocument The newly created patient document model
     */
    public function createPatientDocument(array $data): PatientDocument
    {
        return PatientDocument::create($data);
    }

    /**
     * Update an existing patient document record.
     *
     * @param PatientDocument $patientDocument The patient document model to update
     * @param array $data The validated data for updating the patient document
     * @return PatientDocument The updated patient document model
     */
    public function updatePatientDocument(PatientDocument $patientDocument, array $data): PatientDocument
    {
        $patientDocument->update($data);
        return $patientDocument;
    }
}