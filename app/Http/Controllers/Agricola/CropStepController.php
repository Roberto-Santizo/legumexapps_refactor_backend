<?php

namespace App\Http\Controllers\Agricola;

use App\Helpers\ResponseHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Agricola\CropSteps\CreateCropStepRequest;
use App\Interfaces\Agricola\CropStepServiceInterface;
use Illuminate\Http\Request;

class CropStepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, CropStepServiceInterface $service)
    {
        try {
            $cropId = $request->query('cropId');
            $result = $service->getCropSteps($cropId);
            return ResponseHandler::success($result, 'Pasos Obtenidos Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCropStepRequest $request, CropStepServiceInterface $service)
    {
        try {
            $data = $request->validated();
            $result = $service->createCropStep($data);
            return ResponseHandler::success($result, 'Paso Configurado Correctamente', 201);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, CropStepServiceInterface $service)
    {
        try {
            $result = $service->getCropStepById($id);
            return ResponseHandler::success($result, 'Paso Obtenido Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateCropStepRequest $request, string $id,  CropStepServiceInterface $service)
    {
        try {
            $data = $request->validated();
            $result = $service->updateCropStepById($data, $id);
            return ResponseHandler::success($result, 'Paso Actualizado Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,  CropStepServiceInterface $service)
    {
        try {
            $result = $service->deleteCropStepById($id);
            return ResponseHandler::success($result, 'Paso Eliminado Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }
}
