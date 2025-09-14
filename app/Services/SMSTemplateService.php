<?php

namespace App\Services;

use App\Models\SMSTemplate;
use App\Http\Resources\SMSTemplateResource;
use Illuminate\Pagination\LengthAwarePaginator;

class SMSTemplateService
{
    /**
     * Get a paginated list of SMS Templates.
     *
     * @param int $perPage
     * @return array
     */
    public function getSMSTemplates(int $perPage): array
    {
        $data = SMSTemplate::paginate($perPage);

        return [
            'sms_templates' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new SMS template record.
     *
     * @param array $data The validated data for creating the SMS template
     * @return SMSTemplate The newly created SMS template model
     */
    public function createSMSTemplate(array $data): SMSTemplate
    {
        return SMSTemplate::create($data);
    }

    /**
     * Update an existing SMS template record.
     *
     * @param SMSTemplate $sMSTemplate The SMS template model to update
     * @param array $data The validated data for updating the SMS template
     * @return SMSTemplate The updated SMS template model
     */
    public function updateSMSTemplate(SMSTemplate $sMSTemplate, array $data): SMSTemplate
    {
        $sMSTemplate->update($data);
        return $sMSTemplate;
    }
}

