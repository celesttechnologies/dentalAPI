<?php

namespace App\Services\Reports;

use Illuminate\Support\Facades\DB;

class DailyNewPatientAttendanceService
{
    /**
     * Get daily new patient list report data based on filters.
     *
     * @param array $filters
     * @return array
     */
    public function getDailyNewPatientList(array $filters): array
    {
        $startDate = $filters['start_date'] ?? null;
        $endDate = $filters['end_date'] ?? null;

        if (!$startDate || !$endDate) {
            return [];
        }

        // Join Country and group by gender, country, and age groups
        $patients = \App\Models\Patient::query()
            ->whereBetween(DB::raw('DATE(Patient.RegistrationDate)'), [$startDate, $endDate])
            ->leftJoin('countries', 'countries.CountryID', '=', 'Patient.Country')
            ->select([
                'Patient.Gender',
                'countries.CountryName',
                DB::raw('CASE 
                    WHEN Patient.Age BETWEEN 0 AND 4 THEN "0-4"
                    WHEN Patient.Age BETWEEN 5 AND 9 THEN "5-9"
                    WHEN Patient.Age BETWEEN 10 AND 14 THEN "10-14"
                    WHEN Patient.Age BETWEEN 15 AND 19 THEN "15-19"
                    WHEN Patient.Age BETWEEN 20 AND 24 THEN "20-24"
                    WHEN Patient.Age BETWEEN 25 AND 29 THEN "25-29"
                    WHEN Patient.Age BETWEEN 30 AND 34 THEN "30-34"
                    WHEN Patient.Age BETWEEN 35 AND 39 THEN "35-39"
                    WHEN Patient.Age BETWEEN 40 AND 44 THEN "40-44"
                    WHEN Patient.Age BETWEEN 45 AND 49 THEN "45-49"
                    WHEN Patient.Age BETWEEN 50 AND 54 THEN "50-54"
                    WHEN Patient.Age BETWEEN 55 AND 59 THEN "55-59"
                    WHEN Patient.Age BETWEEN 60 AND 64 THEN "60-64"
                    WHEN Patient.Age BETWEEN 65 AND 69 THEN "65-69"
                    WHEN Patient.Age BETWEEN 70 AND 74 THEN "70-74"
                    WHEN Patient.Age BETWEEN 75 AND 79 THEN "75-79"
                    WHEN Patient.Age BETWEEN 80 AND 84 THEN "80-84"
                    ELSE ">=85" END as AgeGroup'),
                DB::raw('COUNT(*) as PatientCount'),
            ])
            ->groupBy([
                'Patient.Gender',
                'countries.CountryName',
                DB::raw('CASE 
                    WHEN Patient.Age BETWEEN 0 AND 4 THEN "0-4"
                    WHEN Patient.Age BETWEEN 5 AND 9 THEN "5-9"
                    WHEN Patient.Age BETWEEN 10 AND 14 THEN "10-14"
                    WHEN Patient.Age BETWEEN 15 AND 19 THEN "15-19"
                    WHEN Patient.Age BETWEEN 20 AND 24 THEN "20-24"
                    WHEN Patient.Age BETWEEN 25 AND 29 THEN "25-29"
                    WHEN Patient.Age BETWEEN 30 AND 34 THEN "30-34"
                    WHEN Patient.Age BETWEEN 35 AND 39 THEN "35-39"
                    WHEN Patient.Age BETWEEN 40 AND 44 THEN "40-44"
                    WHEN Patient.Age BETWEEN 45 AND 49 THEN "45-49"
                    WHEN Patient.Age BETWEEN 50 AND 54 THEN "50-54"
                    WHEN Patient.Age BETWEEN 55 AND 59 THEN "55-59"
                    WHEN Patient.Age BETWEEN 60 AND 64 THEN "60-64"
                    WHEN Patient.Age BETWEEN 65 AND 69 THEN "65-69"
                    WHEN Patient.Age BETWEEN 70 AND 74 THEN "70-74"
                    WHEN Patient.Age BETWEEN 75 AND 79 THEN "75-79"
                    WHEN Patient.Age BETWEEN 80 AND 84 THEN "80-84"
                    ELSE ">=85" END'),
            ])
            ->get()
            ->toArray();

        // Prepare result for Male Indian, Female Indian, Male NRI, Female NRI
        $result = [
            'Male Indian' => [],
            'Female Indian' => [],
            'Male NRI' => [],
            'Female NRI' => [],
        ];

        foreach ($patients as $row) {
            $isIndian = strtolower($row['CountryName']) === 'india';
            $gender = strtolower($row['Gender']);
            $key = '';
            if ($gender === 'm' && $isIndian) {
                $key = 'Male Indian';
            } elseif ($gender === 'f' && $isIndian) {
                $key = 'Female Indian';
            } elseif ($gender === 'm' && !$isIndian) {
                $key = 'Male NRI';
            } elseif ($gender === 'f' && !$isIndian) {
                $key = 'Female NRI';
            }
            if ($key) {
                $result[$key][$row['AgeGroup']] = $row['PatientCount'];
            }
        }

        return $result;
    }
}
