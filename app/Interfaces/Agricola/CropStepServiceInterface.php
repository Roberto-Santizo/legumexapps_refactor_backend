<?php

namespace App\Interfaces\Agricola;

interface CropStepServiceInterface
{
    public function createCropStep(array $data);
    public function getCropSteps(?string $cropId);
    public function getCropStepById(string $id);
    public function updateCropStepById(array $data, string $id);
    public function deleteCropStepById(string $id);
}
