<?php

namespace App\Interfaces\Agricola;

interface FincaServiceInterface
{
    public function createFinca(array $data);
    public function getFincas(string | null $limit);
    public function getFincaById(string $id);
    public function updateFincaById(array $data, string $id);
}
