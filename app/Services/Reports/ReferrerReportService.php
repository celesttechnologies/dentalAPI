<?php

namespace App\Services\Reports;

class ReferrerReportService
{
    public function getReferrerReport(array $filters): array
    {
        $startDate = $filters['start_date'] ?? null;
        $endDate = $filters['end_date'] ?? null;

        $query = \App\Models\Patient::query();

        if ($startDate && $endDate) {
            $query->whereBetween('RegistrationDate', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->where('RegistrationDate', '>=', $startDate);
        } elseif ($endDate) {
            $query->where('RegistrationDate', '<=', $endDate);
        }

        $query->where(function($q) {
            $q->whereNotNull('ReferralPatientID')
              ->where('ReferralPatientID', '!=', '00000000-0000-0000-0000-000000000000')
              ->orWhere(function($q2) {
                  $q2->whereNotNull('ReferralProviderID')
                      ->where('ReferralProviderID', '!=', '00000000-0000-0000-0000-000000000000');
              });
        });

        $patients = $query->get();

        $report = [];
        foreach ($patients as $patient) {
            $referrerType = null;
            $referrerName = null;
            $referrerEmail = null;
            $referrerMobile = null;

            if ($patient->ReferralPatientID && $patient->ReferralPatientID != '00000000-0000-0000-0000-000000000000') {
                $refPatient = \App\Models\Patient::find($patient->ReferralPatientID);
                if ($refPatient) {
                    $referrerType = 'Patient';
                    $referrerName = trim((trim($refPatient->FirstName) ?? '') . ' ' . ($refPatient->LastName ?? ''));
                    $referrerEmail = $refPatient->EmailAddress1;
                    $referrerMobile = $refPatient->MobileNumber;
                }
            } elseif ($patient->ReferralProviderID && $patient->ReferralProviderID != '00000000-0000-0000-0000-000000000000') {
                $refProvider = \App\Models\Provider::find($patient->ReferralProviderID);
                if ($refProvider) {
                    $referrerType = 'Provider';
                    $referrerName = $refProvider->ProviderName;
                    $referrerEmail = $refProvider->Email;
                    $referrerMobile = $refProvider->PhoneNumber;
                }
            }

            $report[] = [
                'RegistrationDate' => $patient->RegistrationDate,
                'PatientName' => trim(($patient->FirstName ?? '') . ' ' . ($patient->LastName ?? '')),
                'ReferredBy' => $referrerName,
                'ReferredEmail' => $referrerEmail,
                'ReferrerMobile' => $referrerMobile,
            ];
        }

        return $report;
    }
}
