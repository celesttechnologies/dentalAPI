<?php

namespace App\Services;

use App\Models\ClinicLabWork;

class ClinicLabWorkService
{
    /**
     * Create a new lab work record.
     *
     * @param int $perPage
     * @return ClinicLabWork The newly created lab work model
     */
    public function getLabWorks(int $perPage, $patientId)
    {
        if($patientId == null) {
            $clinicLabWork = ClinicLabWork::paginate($perPage);
        } else {
            $clinicLabWork = ClinicLabWork::where('PatientID', $patientId)
                ->select('clinic_lab_works.*', 'clinic_lab_work_components.*')
                ->join('clinic_lab_work_details', 'clinic_lab_works.id', '=', 'clinic_lab_work_details.ClinicLabWorkID')
                ->join('clinic_lab_work_components', 'clinic_lab_work_details.LabWorkComponentID', '=', 'clinic_lab_work_components.id')
                ->paginate($perPage);
        }

        return [
            'lab_works' => $clinicLabWork,
            'pagination' => [
                'total' => $clinicLabWork->total(),
                'per_page' => $clinicLabWork->perPage(),
                'current_page' => $clinicLabWork->currentPage(),
            ]
        ];
    }

    /**
     * Create a new lab work record.
     *
     * @param array $data The validated data for creating the lab work
     * @return ClinicLabWork The newly created lab work model
     */
    public function createLabWork(array $data): ClinicLabWork
    {
        // Convert arrays to CSV or JSON as needed for DB
        $sentCSV = isset($data['sent']) ? implode(',', $data['sent']) : null;
        $collarCSV = isset($data['collar']) ? implode(',', $data['collar']) : null;
        $lastRecord = ClinicLabWork::orderBy('OrderNo', 'desc')->first();
        $orderNo = $lastRecord ? $lastRecord->OrderNo + 1 : 1;
        $labWork = ClinicLabWork::create([
            'ClinicID' => $data['chair'] ?? null,
            'TreatmentID' => $data['treatmentId'] ?? null,
            'OrderNo' => $orderNo,
            'OrderNumber' => "LAB$orderNo",
            'ProviderID' => $data['inChargeLT'] ?? null,
            'PatientID' => $data['selectedpatient'] ?? null,
            'LabWorkDate' => $data['date'] ?? null,
            'LabSupplierID' => $data['supplier'] ?? null,
            'DeliveryDate' => $data['deliveryDate'] ?? null,
            'OrderType' => $data['caseType'] ?? null,
            'StageID' => $data['Stage'] ?? null,
            'SentRecievedIDCSV' => $sentCSV,
            'Shade' => $data['Shade'] ?? null,
            'SelectedTeeth' => $data['selected_teeth'] ?? null,
            'TotalCost' => $data['totalCost'] ?? null,
            'Instructions' => $data['instruction'] ?? null,
            'CollarMetalDesignsIDCSV' => $collarCSV,
            'LabInvoiceNumber' => $data['labinvoiceno'] ?? null,
            'LabInvoiceDate' => $data['invoiceDate'] ?? null,
            'Status' => $data['status'] ?? null,
            'WarrantyDetails' => $data['details'] ?? null,
        ]);

        // Save lab work details (components)
        if (!empty($data['labComponents'])) {
            foreach ($data['labComponents'] as $component) {
                if (!empty($component['children'])) {
                    foreach ($component['children'] as $child) {
                        if($child['selected'] !== true) {
                            continue; // Skip if the component is not selected
                        }
                        $labWork->clinic_lab_work_details()->create([
                            'LabWorkComponentID' => $child['id'],
                            'SelectedTeeth' => $child['teeth'] ?? null,
                            'LabWorkComponentCost' => $child['cost'],
                        ]);
                    }
                }
            }
        }

        return $labWork;
    }

    /**
     * Update an existing lab work record.
     *
     * @param ClinicLabWork $clinicLabWork The lab work model to update
     * @param array $data The validated data for updating the lab work
     * @return ClinicLabWork The updated lab work model
     */
    public function updateLabWork(ClinicLabWork $clinicLabWork, array $data): ClinicLabWork
    {
        $clinicLabWork->update($data);
        return $clinicLabWork;
    }
}
