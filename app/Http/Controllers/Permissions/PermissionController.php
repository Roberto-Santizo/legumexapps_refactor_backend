<?php

namespace App\Http\Controllers\Permissions;

use App\Helpers\ErrorHandler;
use App\Helpers\ResponseHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permissions\CreatePermissionRequest;
use App\Http\Resources\Permissions\PaginatedPermissionsResource;
use App\Http\Resources\Permissions\PermissionsResource;
use App\Interfaces\Permissions\PermissionServiceInterface;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, PermissionServiceInterface $service)
    {
        try {
            $limit = $request->query('limit');
            $permissions = $service->getPermissions($limit);

            $data = $limit ? new PaginatedPermissionsResource($permissions) : PermissionsResource::collection($permissions);

            return ResponseHandler::success($data, 'Permisos Obtenidos Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePermissionRequest $request, PermissionServiceInterface $service)
    {
        try {
            $data = $request->validated();
            $service->createPermission($data);

            return ResponseHandler::success(null, 'Permiso Creado Correctamente', 201);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }
}
