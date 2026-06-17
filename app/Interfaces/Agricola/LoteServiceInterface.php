<?php

namespace App\Interfaces\Agricola;

interface LoteServiceInterface
{
    public function createLote(array $data);
    public function getLotes(?string $limit);
    public function getLoteById(string $id);
    public function getLoteByCode(string $code);
    public function updateLoteByCode(array $data, string $code);
}
