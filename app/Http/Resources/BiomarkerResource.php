<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BiomarkerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'heart_rate' => $this->heart_rate,
            'calories_burned' => $this->calories_burned,
            'sleep_duration_minutes' => $this->sleep_duration_minutes,
            'steps_count' => $this->steps_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
