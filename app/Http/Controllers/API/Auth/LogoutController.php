<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends Controller
{
    /**
     * Logout a user.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        auth()->guard('web')->logout();

//        $request->session()->invalidate();
//        $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Successfully logged out.',
        ], Response::HTTP_OK);
    }
}
