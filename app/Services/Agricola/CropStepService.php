<?php

namespace App\Services\Agricola;

use App\Errors\BadRequestError;
use App\Errors\NotFoundError;
use App\Interfaces\Agricola\CropStepServiceInterface;
use App\Models\Agricola\CropStep;
use Override;

class CropStepService implements CropStepServiceInterface
{
    #[Override]
    public function createCropStep(array $data)
    {
        $result = CropStep::create($data);
        return $result;
    }

    #[Override]
    public function getCropSteps(?string $cropId)
    {
        if (!$cropId) throw new BadRequestError("El ID del cultivo es requerido");
        $steps = CropStep::where('crop_id', $cropId)->get();
        return $steps;
    }

    #[Override]
    public function getCropStepById(string $id)
    {
        $step = CropStep::find($id);
        if (!$step) throw new NotFoundError("El paso no existe");
        return $step;
    }

    #[Override]
    public function updateCropStepById(array $data, string $id)
    {
        $step = $this->getCropStepById($id);
        $step->update($data);
        return $step;
    }

    #[Override]
    public function deleteCropStepById(string $id)
    {
        $step = $this->getCropStepById($id);
        $step->delete();
        return true;
    }
}
