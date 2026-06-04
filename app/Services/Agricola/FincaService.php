<?php

namespace App\Services\Agricola;

use App\Interfaces\Agricola\FincaServiceInterface;
use App\Models\Agricola\Finca;

class FincaService implements FincaServiceInterface 
{
    public function createFinca(array $data)
    {
        return Finca::create($data);
    }
}