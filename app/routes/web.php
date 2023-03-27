<?php

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

use App\Http\Controllers\PostController;
//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('choose', 'HomeController@choose')->name('choose');

Route::get('/user/account', 'HomeController@registerForm')->name('userRegister');
Route::post('/user/account', 'HomeController@userRegister');

Route::resource('teams', 'TeamController');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

    Route::resource('posts', 'PostController');

    Route::put('/profile', 'HomeController@editprofile')->name('editprofile');



    Route::resource('contacts', 'ContactController');

    Route::get('contacts/create/{id}', 'ContactController@create')->name('contacts.create');

    Route::post('/ajax_like', 'TeamController@ajaxLike');
});
Route::group(['middleware' => ['auth', 'can:admin']], function () {

    Route::get('/team', 'TeamController@teampage')->name('teampage');

    Route::group(['middleware' => 'can:post,post'], function () {

        Route::get('postEdit/{post}', 'PostController@postEdit')->name('postEdit');

        Route::post('postEdit/{post}', 'PostController@postUpdate')->name('postUpdate');
    });
});
