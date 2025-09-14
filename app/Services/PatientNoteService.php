<?php

namespace App\Services;

use App\Models\PatientNote;

class PatientNoteService
{
    public function getAll($patientId)
    {
        return PatientNote::where('PatientID', $patientId)->get();
    }

    public function create($patientId, array $data)
    {
        $data['PatientID'] = $patientId;
        $data['CreatedOn'] = now();
        return PatientNote::create($data);
    }

    public function get($patientId, $noteId)
    {
        return PatientNote::where('PatientID', $patientId)
            ->where('PatientNoteID', $noteId)
            ->firstOrFail();
    }

    public function update($patientId, $noteId, array $data)
    {
        $note = $this->get($patientId, $noteId);
        $data['LastUpdatedOn'] = now();
        $note->update($data);
        return $note;
    }

    public function delete($patientId, $noteId)
    {
        $note = $this->get($patientId, $noteId);
        $note->delete();
        return true;
    }
}
