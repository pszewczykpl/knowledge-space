<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        if (auth()->guard('web')->attempt($request->validated())) {
            $request->session()->regenerate();
            $user = auth()->user();

            return response()->json([
                'message' => 'Successfully logged in.',
                'user' => new UserResource($user),
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Invalid credentials.',
        ], Response::HTTP_UNAUTHORIZED);
    }
}
