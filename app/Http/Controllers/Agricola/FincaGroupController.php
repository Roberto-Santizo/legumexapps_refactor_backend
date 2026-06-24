<?php

namespace App\Http\Controllers\Agricola;

use App\Helpers\ResponseHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Agricola\FincaGroups\CreateFincaGroupRequest;
use App\Http\Resources\Agricola\FincaGroupDetailsResource;
use App\Http\Resources\Agricola\FincaGroupResource;
use App\Http\Resources\Agricola\FincaGroupsSummaryResource;
use App\Http\Resources\Agricola\PaginatedFincaGroupsResource;
use App\Interfaces\Agricola\FincaGroupServiceInterface;
use App\Interfaces\Agricola\WeeklyPlanServiceInterface;
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
    public function show(Request $request, string $id, FincaGroupServiceInterface $service)
    {
        try {
            $planId = $request->query('weeklyPlanId');

            $group = $service->getGroupByCode($id, $planId);
            $data = new FincaGroupDetailsResource($group);

            return ResponseHandler::success($data, 'Grupo Obtenido Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    public function groupsSummaryByWeeklyPlan(string $id, FincaGroupServiceInterface $service, WeeklyPlanServiceInterface $weeklyPlanService)
    {
        try {
            $plan = $weeklyPlanService->getWeeklyPlanById($id);
            $groups = $service->getGroupsSummaryByWeeklyPlan($plan);

            return ResponseHandler::success(FincaGroupsSummaryResource::collection($groups), 'Grupos Obtenidos Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }
}
