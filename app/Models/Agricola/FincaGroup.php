<?php

namespace App\Models\Agricola;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['code', 'finca_id', 'lote_id'])]

class FincaGroup extends Model
{
    public function finca()
    {
        return $this->belongsTo(Finca::class);
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }
}
