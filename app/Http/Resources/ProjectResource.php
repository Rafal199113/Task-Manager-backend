<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Project\Statuses;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id_project' => $this->id_project,
            'id_project_statuses' => $this->id_project_statuses,
            'p_name' => $this->p_name,
            'p_key' => $this->p_key,
            'p_description' => $this->p_description,
            'p_repository' => $this->p_repository,
            'p_start_date' => $this->p_start_date,
            'p_end_date' => $this->p_end_date,
            'p_priority' => $this->p_priority,

            'owner' => new UserResource($this->whenLoaded('relationOwner')),
            'lead' => new UserResource($this->whenLoaded('relationLead')),
            'status' => $this->whenLoaded('relationStatus'),

            'statuses' => 
                Statuses::all()

        ];
    }
}
