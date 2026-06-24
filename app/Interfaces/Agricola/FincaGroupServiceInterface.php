<?php

namespace App\Interfaces\Agricola;

use App\Models\Agricola\WeeklyPlan;

interface FincaGroupServiceInterface
{
    public function createFincaGroup(array $data);
    public function getGroups(?string $limit);
    public function getGroupById(string $id);
    public function getGroupByCode(string $code, ?string $weeklyPlanId);
    public function getGroupsSummaryByWeeklyPlan(WeeklyPlan $plan);
}
