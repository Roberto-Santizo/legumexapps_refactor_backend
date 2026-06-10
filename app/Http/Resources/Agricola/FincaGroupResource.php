<?php

namespace App\Http\Resources\Agricola;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FincaGroupResource extends JsonResource
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
            'code' => $this->code,
            'lote_id' => $this->lote_id,
            'lote' => $this->lote->name,
            'finca_id' => $this->finca_id,
            'finca' => $this->finca->name
        ];
    }
}
