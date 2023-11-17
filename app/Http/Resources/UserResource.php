<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var \App\Models\User $this */
        return [
            'id' =>  $this->getAttribute('id'),
            'first_name' => $this->getAttribute('first_name'),
            'last_name' => $this->getAttribute('first_name'),
            'email' => $this->getAttribute('email'),
            'phone' => $this->getAttribute('phone'),
        ];
    }
}
