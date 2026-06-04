<?php

use App\Http\Controllers\Agricola\FincaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/fincas', FincaController::class)->middleware('jwt.auth');