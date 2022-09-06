<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Actions\Fortify\PasswordValidationRules;

class UserApi extends ApiController
{
    use PasswordValidationRules;

    /**
     * ユーザー一覧取得
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $input = $request->all();
        try {
            $query = User::query();

            $response = $this->getListWithPraram($query, $input);

            return UserResource::collection($response);
        } catch (\Exception $e) {
            return $this->response->data($e)->rollback();
        }
    }

    /**
     *　ユーザーIDをもとにユーザー情報取得
     *
     * @return \Illuminate\Http\Response
     */
    public function detail()
    {
        $user = Auth::user();
        //存在チェック
        if ($user === null) {
            return $this->response->error('レコードがありません。');
        }

        return new UserResource($user);
    }

    /**
     * ユーザー登録
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //入力チェック
        $input = $request->input();
        $valiRule = [
            'last_name' => 'required|max:50',
            'first_name' => 'required|max:50',
            'last_name_kana' => 'required|kana_ex|max:50',
            'first_name_kana' => 'required|kana_ex|max:50',
            'email' => [
                'required',
                'email_ex',
                Rule::unique(User::class)->whereNull('deleted_at'),
            ],
            'password' => $this->passwordRules(),
            'tel' => ['required', 'regex:/^[0-9]+$/', 'digits_between:8,11'],
        ];

        if (empty($request->role) || $request->role != 9) {
            $valiRule = array_merge($valiRule, [
                'post_code' => ['required', 'numeric'],
                'address_1' => ['required', 'max:255'],
                'address_2' => ['nullable', 'max:255'],
                'birthday' => ['nullable', 'date'],
            ]);
        }

        $validator = Validator::make($input, $valiRule);
        if ($validator->fails()) {
            return $this->response->valiError($validator->errors());
        }

        //DBに登録
        DB::beginTransaction();
        try {
            $input['password'] = $this->makePassword($input['password']);
            User::create($input);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response->data($e)->rollback();
        }

        return $this->response->registed();
    }


    /**
     * ユーザー情報編集
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //存在チェック
        $user = User::find($id);
        if ($user === null) {
            return $this->response->error('ユーザーが存在しません。');
        }

        //入力チェック
        $input = $request->all();
        $valiRule = [
            'last_name' => ['sometimes', 'required', 'max:50'],
            'first_name' => ['sometimes', 'required', 'max:50'],
            'last_name_kana' => ['sometimes', 'required', 'kana_ex', 'max:50'],
            'first_name_kana' => ['sometimes', 'required', 'kana_ex', 'max:50'],
            'email' => [
                'sometimes',
                'required',
                'email_ex',
                'unique:users,email,' . $id . ',id,deleted_at,NULL'
            ],
            'tel' => ['sometimes', 'required', 'regex:/^[0-9 ]+$/', 'digits_between:8,11'],
        ];

        $password = $request->password;
        if (!empty($password)) {
            $valiRule['password'] = $this->passwordRules();
        }

        if (empty($request->role) || $request->role != 9) {
            $valiRule = array_merge($valiRule, [
                'post_code' => ['sometimes', 'required', 'numeric'],
                'address_1' => ['sometimes', 'required', 'max:255'],
                'address_2' => ['nullable', 'max:255'],
                'birthday' => ['nullable', 'date'],
            ]);
        }

        $validator = Validator::make($input, $valiRule);
        if ($validator->fails()) {
            return $this->response->valiError($validator->errors());
        }

        //DBに登録
        DB::beginTransaction();
        try {
            if (!empty($input['password'])) {
                $input['password'] = $this->makePassword($input['password']);
            } elseif (isset($input['password'])) {
                unset($input['password']);
            }
            $user->update($input);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response->data($e)->rollback();
        }

        return $this->response->registed();
    }

    /**
     * ユーザー削除
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        //存在チェック
        $user = User::find($id);
        if ($user === null) {
            return $this->response->error('ユーザーが存在しません。');
        }

        //自分チェック
        if ($id == Auth::id()) {
            return $this->response->error('自分を削除できません。');
        }

        //DBに登録
        $user->delete();

        return $this->response->success();
    }
}
