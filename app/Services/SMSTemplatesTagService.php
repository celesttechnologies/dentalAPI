<?php

namespace App\Services;

use App\Models\SMSTemplatesTag;
use App\Http\Resources\SMSTemplateTagResource;
use Illuminate\Pagination\LengthAwarePaginator;

class SMSTemplatesTagService
{
    /**
     * Get a paginated list of SMS Templates Tags.
     *
     * @param int $perPage
     * @return array
     */
    public function getSMSTemplatesTags(int $perPage): array
    {
        $data = SMSTemplatesTag::paginate($perPage);

        return [
            'sms_templates_tags' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new SMS templates tag record.
     *
     * @param array $data The validated data for creating the SMS templates tag
     * @return SMSTemplatesTag The newly created SMS templates tag model
     */
    public function createSMSTemplatesTag(array $data): SMSTemplatesTag
    {
        return SMSTemplatesTag::create($data);
    }

    /**
     * Update an existing SMS templates tag record.
     *
     * @param SMSTemplatesTag $sMSTemplatesTag The SMS templates tag model to update
     * @param array $data The validated data for updating the SMS templates tag
     * @return SMSTemplatesTag The updated SMS templates tag model
     */
    public function updateSMSTemplatesTag(SMSTemplatesTag $sMSTemplatesTag, array $data): SMSTemplatesTag
    {
        $sMSTemplatesTag->update($data);
        return $sMSTemplatesTag;
    }
}
