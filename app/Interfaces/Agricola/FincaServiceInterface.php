<?php

namespace App\Interfaces\Agricola;

interface FincaServiceInterface
{
    public function createFinca(array $data);
    public function getFincas(string | null $limit);
    public function getFincaById(string $id);
    public function getFincaByCode(string $code);
    public function updateFincaByCode(array $data, string $code);
}
