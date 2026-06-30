<?php

namespace App\Http\Controllers\Agricola;

use App\Helpers\ResponseHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Agricola\CropRanges\CreateCropRangeRequest;
use App\Interfaces\Agricola\CropRangesServiceInterface;
use Illuminate\Http\Request;

class CropRangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, CropRangesServiceInterface $service)
    {
        try {
            $cropId = $request->query('cropId');

            $ranges = $service->getCropRanges($cropId);

            return ResponseHandler::success($ranges, 'Rangos Obtenidos Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCropRangeRequest $request, CropRangesServiceInterface $service)
    {
        try {
            $data = $request->validated();

            $range = $service->createCropRange($data);

            return ResponseHandler::success($range, 'Rango Configurado Correctamente', 201);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, CropRangesServiceInterface $service)
    {
        try {
            $ranges = $service->getCropRangeById($id);

            return ResponseHandler::success($ranges, 'Rango Obtenido Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateCropRangeRequest $request, string $id, CropRangesServiceInterface $service)
    {
        try {
            $data = $request->validated();

            $range = $service->updateCropRangeById($data, $id);

            return ResponseHandler::success($range, 'Rango Actualizado Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, CropRangesServiceInterface $service)
    {
        try {
            $range = $service->deleteCropRangeById($id);

            return ResponseHandler::success($range, 'Rango Eliminado Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }
}
