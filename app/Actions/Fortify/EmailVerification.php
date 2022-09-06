<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\VerifyEmailResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmailVerification extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\VerifyEmailResponse
     */
    public function verify(Request $request)
    {
        $user = User::find($request->route('id'));
        if (!$user) {
            return redirect()->route('verification.notice');
        }

        if (!hash_equals((string)$request->route('hash'), sha1($user->getEmailForVerification()))) {
            return redirect()->route('verification.notice');
        }

        Auth::login($user);

        if ($user->hasVerifiedEmail()) {
            return app(VerifyEmailResponse::class);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
        return app(VerifyEmailResponse::class);
    }

    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'email' => [
                'required',
                'email_ex'
            ]
        ])->validate();

        $user = User::where('email', $input['email'])->where('role', 1)->first();
        if (!$user) {
            return back()->withErrors("メールが存在しません。");
        }

        if ($user->hasVerifiedEmail()) {
            return back()->withErrors("メールが確認されました。");
        }

        $user->sendEmailVerificationNotification();

        return back()->with('status', '確認メールを送信しました。');
    }
}
