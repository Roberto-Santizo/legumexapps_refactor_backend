<?php

namespace App\Interfaces\Agricola;

interface FincaGroupServiceInterface
{
    public function createFincaGroup(array $data);
    public function getGroups(?string $limit);
    public function getGroupById(string $id);
    public function getGroupByCode(string $code);
}
