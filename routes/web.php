<?php

use App\Actions\Fortify\EmailVerification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.top');
})->name('top');

// verification
Route::controller(EmailVerification::class)->name('verification.')->prefix('email')->group(function () {
    Route::get('/verify', function (Request $request) {
        return view('auth.verify-email');
    })->name('notice');
    Route::post('/verification-notification', 'send')->name('send');
    Route::get('/verify/{id}/{hash}', 'verify')->name('verify');
});

Route::name('profile.')->prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', function () {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    })->name('show');

    Route::get('/edit', function () {
        $user = Auth::user();
        return view('pages.profile-edit', compact('user'));
    })->name('edit');

    Route::get('/password', function () {
        return view('pages.profile-password');
    })->name('password');
});

Route::get('/home', function () {
    return view('welcome');
})->middleware('auth')->name('home');

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware('verified')->name('dashboard');

Route::get('/home2', function () {
    return view('welcome');
})->middleware(['verified', 'password.confirm'])->name('home2');

Route::delete('/user', function (Request $request) {
    $user = User::find(Auth::user()->id);

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    if ($user->delete()) {
        return redirect('login')->with('status', 'Your account has been deleted!');
    }
})->middleware('auth', 'password.confirm')->name('profile.delete');


// お問い合わせ
Route::controller(ContactController::class)->name('contact.')->prefix('contact')->group(function () {
    Route::get('/', function () {
        return view('pages.contact.contact');
    })->name('show');
    Route::post('/send', 'sendMail')->name('send');
    Route::get('/completed', function () {
        return view('pages.contact.completed');
    })->name('completed');
});
// default error route
Route::get('/{any?}', function () {
    return redirect()->route('top');
})->where('any', '.*');
