<?php

namespace App\Interfaces\Agricola;

interface SupplyServiceInterface
{
    public function createSupply(array $data);
    public function getSupplies(?string $limit);
    public function getSupplyById(string $id);
    public function getSupplyByCode(string $code);
    public function updateSupplyByCode(array $data, string $code);
}
