<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    return view('home');
});


Auth::routes();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/login/github', function () {
    return Socialite::driver('github')->redirect();
})->name('loginGithub');

Route::get('/login/github', 'Auth\LoginController@github')->name('github');

Route::get('/login/github/callback', 'Auth\LoginController@githubRedirect');

Route::get('/login/google', 'Auth\LoginController@google')->name('google');

Route::get('/login/google/callback', 'Auth\LoginController@googleRedirect');