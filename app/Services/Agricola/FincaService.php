<?php

namespace App\Services\Agricola;

use App\Errors\NotFoundError;
use App\Interfaces\Agricola\FincaServiceInterface;
use App\Models\Agricola\Finca;

class FincaService implements FincaServiceInterface
{
    public function createFinca(array $data)
    {
        return Finca::create($data);
    }

    public function getFincas(string | null $limit)
    {
        $query = Finca::query();

        if ($limit) {
            return $query->paginate($limit);
        }

        return $query->get();
    }

    public function getFincaById(string $id)
    {
        $finca = Finca::find($id, ['id', 'name', 'code']);
        if (!$finca) {
            throw new NotFoundError("Finca No Encontrada");
        }
        return $finca;
    }

    public function updateFincaById(array $data, string $id)
    {
        $this->getFincaById($id);
        $finca = Finca::where('id', '=', $id, null)->update($data);
        return $finca;
    }
}
