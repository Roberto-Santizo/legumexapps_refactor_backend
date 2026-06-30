<?php

namespace App\Interfaces\Agricola;

interface CropRangesServiceInterface
{
    public function createCropRange(array $data);
    public function getCropRanges(?string $cropId);
    public function getCropRangeById(string $id);
    public function updateCropRangeById(array $data, string $id);
    public function deleteCropRangeById(string $id);
}
