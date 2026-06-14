<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Models\Module;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (!$token = JWTAuth::attempt($credentials)) {
        return response()->json([
            'error' => 'Invalid credentials'
        ], 401);
    }

    $refreshToken = JWTAuth::claims([
        'type' => 'refresh'
    ])->fromUser(auth()->user());

    $data = $this->buildUserData($request);

    $data['token'] = $token;

    return response()->json($data)
        ->cookie(
            'token',
            $refreshToken,
            60,
            '/',
            null,
            false,
            true,
            false,
            'Lax'
        );
}

    public function logout(Request $request)
    {
         JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Logged out']);
    }

    public function refreshToken(Request $request){
        try {
            $refreshToken = $request->cookie('token');





              JWTAuth::setToken($refreshToken);

            $payload = JWTAuth::getPayload();



            $user = JWTAuth::setToken($refreshToken)->toUser();

            $newAccessToken = JWTAuth::fromUser($user);

            return response()->json([
                'access_token' => $newAccessToken
            ]);

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'Refresh token expired', $e->getMessage()], 401);
        }

        catch (\Exception $e) {
            return response()->json([
                'error' => 'Invalid refresh token'
            ], 401);
        }
    }

    public function getMe(Request $request){
        return $this->buildUserData($request);
    }

    private function buildUserData(Request $request): array
{
    $modulesPermissions = [];
    $modules = [];

    foreach (auth()->user()->roles as $role) {
        foreach ($role->permissions as $permission) {
            [$module, $action] = explode('.', $permission->name);

            if ($action === 'view') {
                $modules[] = Module::where('m_code', $module)->first();
            }

            $modulesPermissions[$module][$action] = true;
        }
    }

    return [
        'header' => $request->header('Authorization'),
        'user' => auth()->user()->load('roles'),
        'roles' => auth()->user()->roles->first(),
        'modulesPermissions' => $modulesPermissions,
        'modules' => $modules
    ];
}
}
