<?php

namespace App\Http\Controllers\Agricola;

use App\Helpers\ResponseHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Agricola\FincaGroups\CreateFincaGroupRequest;
use App\Http\Resources\Agricola\FincaGroupResource;
use App\Http\Resources\Agricola\PaginatedFincaGroupsResource;
use App\Interfaces\Agricola\FincaGroupServiceInterface;

use Illuminate\Http\Request;

class FincaGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, FincaGroupServiceInterface $service)
    {
        try {
            $limit = $request->query('limit');
            $groups = $service->getGroups($limit);
            $data = $limit ? new PaginatedFincaGroupsResource($groups) : FincaGroupResource::collection($groups);

            return ResponseHandler::success($data, 'Grupos Obtenidos Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFincaGroupRequest $request, FincaGroupServiceInterface $service)
    {
        try {
            $data = $request->validated();
            $group = $service->createFincaGroup($data);

            return ResponseHandler::success($group, 'Grupo Creado Correctamente', 201);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, FincaGroupServiceInterface $service)
    {
        try {
            $group = $service->getGroupById($id);
            $data = new FincaGroupResource($group);

            return ResponseHandler::success($data, 'Grupo Obtenido Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }
}
