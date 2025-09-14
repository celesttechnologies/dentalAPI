<?php

namespace App\Services;

use App\Models\PromotionalSMSTemplate; // Assuming you have a PromotionalSMSTemplate model
use App\Http\Resources\PromotionalSMSTTemplateResource; // Assuming you have a resource for Promotional SMS Template
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class PromotionalSMSTemplateService
{
    /**
     * Get a paginated list of Promotional SMS Templates.
     *
     * @param int $perPage
     * @return array
     */
    public function getPromotionalSMSTemplates(int $perPage): array
    {
        $data = PromotionalSMSTemplate::paginate($perPage); // Fetch paginated promotional SMS templates

        return [
            'promotional_sms_templates' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'last_page' => $data->lastPage(),
            ]
        ];
    }

    /**
     * Create a new promotional SMS template record.
     *
     * @param array $data The validated data for creating the promotional SMS template
     * @return PromotionalSMSTemplate The newly created promotional SMS template model
     */
    public function createPromotionalTemplate(array $data): PromotionalSMSTemplate
    {
        return PromotionalSMSTemplate::create($data);
    }

    /**
     * Update an existing promotional SMS template record.
     *
     * @param PromotionalSMSTemplate $promotionalSMSTemplate The promotional SMS template model to update
     * @param array $data The validated data for updating the promotional SMS template
     * @return PromotionalSMSTemplate The updated promotional SMS template model
     */
    public function updatePromotionalTemplate(PromotionalSMSTemplate $promotionalSMSTemplate, array $data): PromotionalSMSTemplate
    {
        $promotionalSMSTemplate->update($data);
        return $promotionalSMSTemplate;
    }
}
