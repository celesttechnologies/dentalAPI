<?php

namespace App\Services;

use App\Models\PatientDOCFile;
use App\Http\Resources\PatientDOCFileResource;
use App\Models\Patient;

class PatientDOCFileService
{
    /**
     * Get a paginated list of Patient Document Files.
     *
     * @param int $perPage
     * @return array
     */
    public function getDOCFiles(Patient $patient, int $perPage): array
    {
        $data = PatientDOCFile::where('PatientID', $patient->id)->paginate($perPage);

        return [
            'doc_files' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createDocFile(array $data): PatientDOCFile
    {
        return PatientDOCFile::create($data);
    }

    public function updateDocFile(PatientDOCFile $pdocfile, array $data): PatientDOCFile
    {
        $pdocfile->update($data);
        $pdocfile->fresh();

        return $pdocfile;
    }
}
