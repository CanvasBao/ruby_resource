<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthApi extends ApiController
{
    /**
     * ログイン
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
                return $this->response->error('認証に失敗しました。');
            }
        } catch (\Exception $e) {
            return $this->response->data($e)->rollback();
        }

        return $this->response->data(Auth::user())->success();
    }

    /**
     * ログアウト
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        try {
            Auth::user()->tokens()->delete();
            $request->session()->invalidate();
        } catch (\Exception $e) {
            return $this->response->data($e)->rollback();
        }

        return $this->response->success();
    }

    /**
     * ログインしているユーザー情報取得
     *
     * @return \Illuminate\Http\Response
     */
    public function loginInfo(Request $request)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                throw new \Exception("レコードがありません。");
            }

            return new JsonResource($user);
        } catch (\Exception $e) {
            return $this->response->data($e)->rollback();
        }
    }
}
