<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\ContactMailUser;

class ContactController extends ApiController
{
    /**
     * お問い合わせ送信
     *
     * @param  array  $request->input
     * @return \Illuminate\View\View
     */
    public function sendMail(Request $request)
    {
        $input = $request->input();
        Validator::make($input, [
            'name' => ['required', 'max:50'],
            'company' => ['required', 'max:50'],
            'email' => ['required', 'email_ex', 'max:50'],
            'tel' => ['required', 'regex:/^[0-9]+$/', 'digits_between:8,11'],
            'content' => ['required', 'max:255'],
        ])->validate();

        try {
            $mailTo = env('MAIL_FROM_ADDRESS', "");
            Mail::to($mailTo)
                ->send(new ContactMail((array) $input, true));

            Mail::to($input['email'])
                ->send(new ContactMail((array) $input));

            return redirect()->route('contact.completed')->with('status', '成功しました。');
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'エラーが発生しました。']);
        }
    }
}
