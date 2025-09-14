<?php

namespace App\Services;

use App\Models\PersonalReminder; // Assuming you have a PersonalReminder model
use App\Http\Resources\PersonalReminderResource; // Assuming you have a resource for Personal Reminder
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class PersonalReminderService
{
    /**
     * Get a paginated list of Personal Reminders.
     *
     * @param int $perPage
     * @return array
     */
    public function getPersonalReminders(int $perPage, $patientId): array
    {
        if($patientId == null) {
            $data = PersonalReminder::paginate($perPage);
        } else {
            $data = PersonalReminder::where('PatientID', $patientId)->paginate($perPage);
        }

        return [
            'personal_reminders' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new personal reminder record.
     *
     * @param array $data The validated data for creating the personal reminder
     * @return PersonalReminder The newly created personal reminder model
     */
    public function createReminder(array $data): PersonalReminder
    {
        return PersonalReminder::create($data);
    }

    /**
     * Update an existing personal reminder record.
     *
     * @param PersonalReminder $personalReminder The personal reminder model to update
     * @param array $data The validated data for updating the personal reminder
     * @return PersonalReminder The updated personal reminder model
     */
    public function updateReminder(PersonalReminder $personalReminder, array $data): PersonalReminder
    {
        $personalReminder->update($data);
        return $personalReminder;
    }
}
