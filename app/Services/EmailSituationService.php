<?php

namespace App\Services;

use App\Models\EmailSituation;
use App\Http\Resources\EmailSituationResource;
use Illuminate\Pagination\LengthAwarePaginator;

class EmailSituationService
{
    /**
     * Get a paginated list of Email Situations.
     *
     * @param int $perPage
     * @return array
     */
    public function getEmailSituations(int $perPage): array
    {
        $data = EmailSituation::paginate($perPage);

        return [
            'situations' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new email situation record.
     *
     * @param array $data The validated data for creating the email situation
     * @return EmailSituation The newly created email situation model
     */
    public function createEmailSituation(array $data): EmailSituation
    {
        return EmailSituation::create($data);
    }

    /**
     * Update an existing email situation record.
     *
     * @param EmailSituation $emailSituation The email situation model to update
     * @param array $data The validated data for updating the email situation
     * @return EmailSituation The updated email situation model
     */
    public function updateEmailSituation(EmailSituation $emailSituation, array $data): EmailSituation
    {
        $emailSituation->update($data);
        return $emailSituation;
    }
}