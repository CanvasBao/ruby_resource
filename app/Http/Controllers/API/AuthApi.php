<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthApi extends ApiController
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = array_merge(
                $request->only('email', 'password'),
                ['role' => 9]
            );

            if (!Auth::attempt($credentials)) {
                return $this->errorResponse([], 'certification failed.');
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse(Auth::user());
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function appRefresh(Request $request)
    {
        try {
            $token = $request->header('Refresh-Token');
            \Log::info($token);
            if (!$token || empty($token)) {
                throw new \Exception('token empty');
            }
            $token=base64_decode($token);

            $appKey = env('ADMIN_APP_KEY');
            if (!$appKey || empty($appKey)) {
                throw new \Exception('app key empty');
            }

            if (!Hash::check($appKey, $token)) {
                throw new \Exception('not compare');
            }

            $user = User::where('role', 9)->first();
            Auth::login($user);

            $token = $user->createToken('authToken')->plainTextToken;

        } catch (\Exception $e) {
            return $this->errorResponse([], 'certification failed.', 401);
        }

        return $this->successResponse([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        try {
            Auth::user()->tokens()->delete();
            $request->session()->invalidate();
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }

        return $this->successResponse();
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function loginInfo(Request $request)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return $this->notExist();
            }

            return new JsonResource($user);
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }
    }
}
