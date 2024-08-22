<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

use App\Livewire\Panel\Curso\Index as CursoIndex;
use App\Livewire\Panel\Curso\Create as CursoCreate;

use App\Livewire\Panel\UnidadeCurricular\Index as UCIndex;
use App\Livewire\Panel\UnidadeCurricular\Create as UCCreate;

use App\Livewire\Panel\AreaDeConhecimento\Index as ACIndex;
use App\Livewire\Panel\AreaDeConhecimento\Create as ACCreate;

use App\Livewire\Panel\Users\Index as UsersIndex;
use App\Livewire\Panel\Users\Create as UsersCreate;

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

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::prefix('cursos')->name('cursos')->group(function () {
        Route::get('/', CursoIndex::class)
            ->name('.index');

        Route::get('new/', CursoCreate::class)
            ->name('.create');
    });

    Route::prefix('uc')->name('ucs')->group(function () {
        Route::get('/', UCIndex::class)
            ->name('.index');

        Route::get('new/', UCCreate::class)
            ->name('.create');
    });

    Route::prefix('ac')->name('ac')->group(function () {
        Route::get('/', ACIndex::class)
            ->name('.index');

        Route::get('new/', ACCreate::class)
            ->name('.create');
    });

    Route::prefix('usuarios')->name('users')->group(function () {
        Route::get('/', UsersIndex::class)
            ->name('.index');

        Route::get('new/', UsersCreate::class)
            ->name('.create');
    });

    Route::get('logout', LogoutController::class)
        ->name('logout');
});
