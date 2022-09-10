<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Actions\Fortify\PasswordValidationRules;

class UserApi extends Controller
{
    use PasswordValidationRules;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = request()->all();
        try {
            $query = User::query();

            $response = $this->getListWithPraram($query, $input);

            return UserResource::collection($response);
        } catch (\Exception $e) {
            return $this->response->data($e)->rollback();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //入力チェック
        $input = $request->input();
        $valiRule = [
            'name' => 'required|max:50',
            'company' => 'required|max:50',
            'email' => [
                'required',
                'email_ex',
                Rule::unique(User::class)->whereNull('deleted_at'),
            ],
            'password' => $this->passwordRules(),
            'tel' => ['required', 'regex:/^[0-9]+$/', 'digits_between:8,11'],
        ];

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //存在チェック
        if ($user === null) {
            return $this->response->error('レコードがありません。');
        }

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
            'name' => ['sometimes', 'required', 'max:50'],
            'company' => ['sometimes', 'required', 'max:50'],
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
