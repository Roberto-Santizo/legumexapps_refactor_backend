<?php

namespace App\Models\Agricola;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['crop_id', 'key', 'max_value', 'min_value', 'result'])]
class CropRange extends Model
{
    //
}
