<?php

namespace App\Services\Agricola;

use App\Errors\NotFoundError;
use App\Interfaces\Agricola\FincaGroupServiceInterface;
use App\Models\Agricola\FincaGroup;
use Override;

class FincaGroupService implements FincaGroupServiceInterface
{
    #[Override]
    public function createFincaGroup(array $data)
    {
        $group = FincaGroup::create($data);
        return $group;
    }

    #[Override]
    public function getGroups(?string $limit)
    {
        $query = FincaGroup::query();

        if($limit) return $query->paginate($limit);

        return $query->get();
    }

    #[Override]
    public function getGroupById(string $id)
    {
        $group = FincaGroup::where(['id' => $id])->first();
        if(!$group) throw new NotFoundError("El grupo no existe");
        return $group;
        
    }
}
