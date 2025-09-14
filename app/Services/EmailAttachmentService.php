<?php

namespace App\Services;

use App\Models\EmailAttachment;
use App\Http\Resources\EmailAttachmentResource;
use Illuminate\Pagination\LengthAwarePaginator;

class EmailAttachmentService
{
    /**
     * Get a paginated list of Email Attachments.
     *
     * @param int $perPage
     * @return array
     */
    public function getEmailAttachments(int $perPage): array
    {
        $data = EmailAttachment::paginate($perPage);

        return [
            'attachments' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new email attachment record.
     *
     * @param array $data The validated data for creating the email attachment
     * @return EmailAttachment The newly created email attachment model
     */
    public function createEmailAttachment(array $data): EmailAttachment
    {
        return EmailAttachment::create($data);
    }

    /**
     * Update an existing email attachment record.
     *
     * @param EmailAttachment $emailAttachment The email attachment model to update
     * @param array $data The validated data for updating the email attachment
     * @return EmailAttachment The updated email attachment model
     */
    public function updateEmailAttachment(EmailAttachment $emailAttachment, array $data): EmailAttachment
    {
        $emailAttachment->update($data);
        return $emailAttachment;
    }
}