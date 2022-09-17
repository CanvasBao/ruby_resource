<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:50'],
            'company' => ['required', 'string', 'max:50'],
            'email' => [
                'required',
                'string',
                'email_ex',
                Rule::unique(User::class)->whereNull('deleted_at'),
            ],
            'password' => $this->passwordRules(),
            'address' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'tel_ex']
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'company' => $input['company'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'address' => $input['address'],
            'tel' => $input['tel']
        ]);

        return $user;
    }
}
