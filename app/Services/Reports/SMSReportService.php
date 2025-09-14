<?php

namespace App\Services\Reports;

class SMSReportService
{
    public function getSMSReport(array $filters): array
    {
        $startDate = $filters['start_date'] ?? null;
        $endDate = $filters['end_date'] ?? null;

        $query = \App\Models\SMSTransaction::query()
            ->leftJoin('Patient', 'Patient.PatientID', '=', 'SMSTransactions.PatientID')
            ->select([
                'Patient.Title',
                'Patient.FirstName',
                'Patient.LastName',
                'SMSTransactions.MobileNumber',
                'SMSTransactions.MessageText',
                'SMSTransactions.SentStatus',
                'SMSTransactions.SentOn',
                'SMSTransactions.SentStatusMessage',
                'SMSTransactions.CreatedOn as RequestedOn',
            ]);

        if ($startDate) {
            $query->whereDate('SMSTransactions.SentOn', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('SMSTransactions.SentOn', '<=', $endDate);
        }

        $results = $query->orderBy('SMSTransactions.SentOn', 'desc')->get();

        return $results->map(function ($row) {
            return [
                'PatientName' => trim($row->Title .' '. (trim($row->FirstName) ?? '') . ' ' . ($row->LastName ?? '')),
                'MobileNumber' => $row->MobileNumber,
                'MessageText' => $row->MessageText,
                'SentStatus' => $row->SentStatus,
                'SentOn' => $row->SentOn,
                'StatusMessage' => $row->SentStatusMessage,
                'RequestedOn' => $row->RequestedOn,
            ];
        })->toArray();
    }
}
