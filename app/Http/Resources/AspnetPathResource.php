<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AspnetPathResource extends JsonResource
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
            'id' => $this->ApplicationId,
            'path_id'        => $this->PathId,
            'path'           => $this->Path,
            'lowered_path'   => $this->LoweredPath,
        ];
    }
}