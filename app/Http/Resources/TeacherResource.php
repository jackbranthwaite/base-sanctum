<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'school_id' => $this->user->school_id,
            'teacher_registration_number' => $this->teacher_registration_number,
            'teacher_role' => $this->teacher_role,
            'teacher_role_other' => $this->teacher_role_other,
            'teacher_country' => $this->teacher_country,
            'teacher_phone' => $this->teacher_phone,

        ];
    }
}
