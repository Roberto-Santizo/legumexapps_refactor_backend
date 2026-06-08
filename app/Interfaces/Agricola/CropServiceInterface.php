<?php

namespace App\Interfaces\Agricola;

interface CropServiceInterface
{
    public function createCrop(array $data);
    public function getCrops(string | null $limit);
    public function getCropById(string $id);
    public function updateCropById(array $data, string $id);
}
