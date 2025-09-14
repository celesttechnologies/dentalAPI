<?php

namespace App\Services;

use App\Models\PatientDOCServerDocumentDetail;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\PatientDOCServerDocumentDetailResource;
use App\Models\Patient;

class PatientDOCServerDocumentDetailService
{
    /**
     * Get a paginated list of Patient Document Server Details.
     *
     * @param int $perPage
     * @return array
     */
    public function getDocumentDetails(Patient $patient, int $perPage): array
    {
        $data = PatientDOCServerDocumentDetail::where(['PatientID' => $patient->id, 'IsDeleted' => 0])->paginate($perPage); // Fetch only non-deleted details

        return [
            'document_details' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new document detail record.
     *
     * @param array $data The validated data for creating the document detail
     * @return PatientDOCServerDocumentDetail The newly created document detail model
     */
    public function createDocumentDetail(array $data): PatientDOCServerDocumentDetail
    {
        return PatientDOCServerDocumentDetail::create($data);
    }

    /**
     * Update an existing document detail record.
     *
     * @param PatientDOCServerDocumentDetail $patientDOCServerDocumentDetail The document detail model to update
     * @param array $data The validated data for updating the document detail
     * @return PatientDOCServerDocumentDetail The updated document detail model
     */
    public function updateDocumentDetail(PatientDOCServerDocumentDetail $patientDOCServerDocumentDetail, array $data): PatientDOCServerDocumentDetail
    {
        $patientDOCServerDocumentDetail->update($data);
        return $patientDOCServerDocumentDetail;
    }
}