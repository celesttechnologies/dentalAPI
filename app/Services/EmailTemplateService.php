<?php

namespace App\Services;

use App\Models\EmailTemplate;
use App\Http\Resources\EmailTemplateResource;
use Illuminate\Pagination\LengthAwarePaginator;

class EmailTemplateService
{
    /**
     * Get a paginated list of Email Templates.
     *
     * @param int $perPage
     * @return array
     */
    public function getEmailTemplates(int $perPage): array
    {
        $data = EmailTemplate::paginate($perPage);

        return [
            'templates' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new email template record.
     *
     * @param array $data The validated data for creating the email template
     * @return EmailTemplate The newly created email template model
     */
    public function createEmailTemplate(array $data): EmailTemplate
    {
        return EmailTemplate::create($data);
    }

    /**
     * Update an existing email template record.
     *
     * @param EmailTemplate $emailTemplate The email template model to update
     * @param array $data The validated data for updating the email template
     * @return EmailTemplate The updated email template model
     */
    public function updateEmailTemplate(EmailTemplate $emailTemplate, array $data): EmailTemplate
    {
        $emailTemplate->update($data);
        return $emailTemplate;
    }
}