<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemsHierarchyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'item_type_id' => $this->ItemTypeID,
            'title' => $this->Title,
            'description' => $this->Description,
            'parent_item_type_id' => $this->ParentItemTypeID,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'row_guid' => $this->rowguid,
        ];
    }
}