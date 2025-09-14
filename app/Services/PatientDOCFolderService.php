<?php

namespace App\Services;

use App\Models\PatientDOCFolder;
use App\Http\Resources\PatientDOCFolderResource;
use App\Models\Patient;

class PatientDOCFolderService
{
    /**
     * Get a paginated list of Patient Document Folders.
     *
     * @param int $perPage
     * @return array
     */
    public function getDOCFolders(Patient $patient, int $perPage): array
    {
        $data = PatientDOCFolder::where(['PatientID' => $patient->id, 'IsDeleted' => 0])->paginate($perPage); // Fetch only non-deleted folders

        return [
            'folders' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createDocFolder(array $data): PatientDOCFolder
    {
        return PatientDOCFolder::create($data);
    }

    public function updateDocFolder(PatientDOCFolder $pdocfolder, array $data): PatientDOCFolder
    {
        $pdocfolder->update($data);
        $pdocfolder->fresh();

        return $pdocfolder;
    }
}