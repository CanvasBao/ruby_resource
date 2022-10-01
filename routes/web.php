<?php

use App\Actions\Fortify\EmailVerification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

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
        return view('pages.profile.index', compact('user'));
    })->name('show');

    Route::get('/edit', function () {
        $user = Auth::user();
        return view('pages.profile.edit', compact('user'));
    })->name('edit');

    Route::get('/password', function () {
        return view('pages.profile.password');
    })->name('password');

    Route::delete('/', function (Request $request) {
        $user = User::find(Auth::user()->id);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($user->delete()) {
            return redirect('login')->with('status', 'Your account has been deleted!');
        }
    })->middleware('password.confirm')->name('delete');
});

// Product
Route::name('product.')->prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('show');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

// contact
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
    return view('pages.404');
})->where('any', '.*');
