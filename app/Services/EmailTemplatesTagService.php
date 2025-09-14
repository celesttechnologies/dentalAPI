<?php

namespace App\Services;

use App\Models\EmailTemplatesTag;
use App\Http\Resources\EmailTemplatesTagResource;
use Illuminate\Pagination\LengthAwarePaginator;

class EmailTemplatesTagService
{
    /**
     * Get a paginated list of Email Templates Tags.
     *
     * @param int $perPage
     * @return array
     */
    public function getEmailTemplatesTags(int $perPage): array
    {
        $data = EmailTemplatesTag::paginate($perPage);

        return [
            'tags' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new email templates tag record.
     *
     * @param array $data The validated data for creating the email templates tag
     * @return EmailTemplatesTag The newly created email templates tag model
     */
    public function createEmailTemplatesTag(array $data): EmailTemplatesTag
    {
        return EmailTemplatesTag::create($data);
    }

    /**
     * Update an existing email templates tag record.
     *
     * @param EmailTemplatesTag $emailTemplatesTag The email templates tag model to update
     * @param array $data The validated data for updating the email templates tag
     * @return EmailTemplatesTag The updated email templates tag model
     */
    public function updateEmailTemplatesTag(EmailTemplatesTag $emailTemplatesTag, array $data): EmailTemplatesTag
    {
        $emailTemplatesTag->update($data);
        return $emailTemplatesTag;
    }
}