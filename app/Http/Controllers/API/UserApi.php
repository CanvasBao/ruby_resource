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

            $response = $this->getListWithParams($query, $input);

            return UserResource::collection($response);
        } catch (\Exception $e) {
            return $this->errorResponse($e);
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
        // check input
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
            return $this->validateError($validator->errors());
        }

        //begin
        DB::beginTransaction();
        try {
            $input['password'] = $this->makePassword($input['password']);
            // update DB
            User::create($input);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($e);
        }

        return $this->registeredResponse([]);
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
        // check exist
        if ($user === null) {
            return $this->notExist();
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
        //check exists
        $user = User::find($id);
        if ($user === null) {
            return $this->notExist();
        }

        //check input
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
            return $this->validateError($validator->errors());
        }

        //begin
        DB::beginTransaction();
        try {
            if (!empty($input['password'])) {
                $input['password'] = $this->makePassword($input['password']);
            } elseif (isset($input['password'])) {
                unset($input['password']);
            }
            // update
            $user->update($input);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($e);
        }

        return $this->registeredResponse([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //check exists
        $user = User::find($id);
        if ($user === null) {
            return $this->notExist();
        }

        // check root admin
        if ($id == Auth::id()) {
            return $this->errorResponse([], "can't yourself");
        }

        //update DB
        $user->delete();

        return $this->successResponse();
    }
}
