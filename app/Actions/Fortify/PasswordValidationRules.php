<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        // return ['required', 'string', new Password, 'confirmed'];
        return ['required', 'string', new Password];
    }

    /**
     * make passwords.
     *
     * @return array
     */
    protected function makePassword($password)
    {
        if (!empty($password)) {
            return '';
        }

        return Hash::make($password);
    }
}
