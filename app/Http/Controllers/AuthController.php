<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHandler;
use App\Http\Requests\Auth\LoginRequest;
use App\Interfaces\Auth\AuthServiceInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthServiceInterface $authService)
    {
        try {
            $data = $request->validated();
            $token = $authService->login($data);

            return ResponseHandler::success($token, 'Sesión Iniciada Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }

    public function checkstatus()
    {
        try {
            $payload = JWTAuth::getPayload();
            $data = [
                'id' => $payload->get('id'),
                'name' => $payload->get('name'),
                'role' => $payload->get('role'),
                'username' => $payload->get('username'),
            ];

            return ResponseHandler::success($data, 'Usuario Obtenido Correctamente', 200);
        } catch (\Throwable $th) {
            return ResponseHandler::error($th);
        }
    }
}
