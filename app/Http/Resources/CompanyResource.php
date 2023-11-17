<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var \App\Models\Company $this */
        return [
            'id' => $this->getAttribute('id'),
            'title' => $this->getAttribute('title'),
            'phone' => $this->getAttribute('phone'),
            'description' => $this->getAttribute('description'),
        ];
    }
}
