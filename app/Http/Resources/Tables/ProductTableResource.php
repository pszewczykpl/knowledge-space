<?php

namespace App\Http\Resources\Tables;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code_toil' => $this->code_toil,
            'code_owu' => $this->code_owu,
            'code' => (int) $this->code,
            'group_code' => $this->group_code,
            'partner_code' => $this->partner_code,
            'partner_name' => $this->partner_name,
            'type' => $this->type->label(),
            'kind' => $this->kind->label(),
        ];
    }
}
