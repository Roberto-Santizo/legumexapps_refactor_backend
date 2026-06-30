<?php

namespace App\Models\Agricola;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['crop_id', 'left', 'right', 'step_order', 'result_key', 'operation'])]
class CropStep extends Model
{
    //
}
