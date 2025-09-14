<?php

namespace App\Services\Reports;

class MailingListService
{
    public function getPatientDetails($patientId)
    {
        $patient = \App\Models\Patient::where('PatientID', $patientId)
            ->select([
                'Title',
                'FirstName',
                'LastName',
                'AddressLine1',
                'AddressLine2',
                'Street',
                'Area',
                'City',
                'State',
                'ZipCode',
                'MobileNumber',
            ])->first();
        return $patient;
    }
}
