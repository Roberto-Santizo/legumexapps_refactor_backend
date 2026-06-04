<?php

namespace App\Models\Agricola;

use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    protected $fillable = [
        'name',
        'code',
        'terminal_id'
    ];  
}
