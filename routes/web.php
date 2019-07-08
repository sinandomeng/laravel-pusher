<?php

use App\User;
use App\Events\StatusLiked as StatusLikingEvent;
use App\Notifications\StatusLiked as StatusLikingNotif;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Notification;

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

Route::get('/',              'FiliPayController@index');

Route::get('/portfolio', function () {
    return view('portfolio.index');
});

Route::prefix('sb-admin')->group(function () {
    Route::get('/',                'SBAdminController@index');
    Route::get('/buttons',         'SBAdminController@buttons');
    Route::get('/cards',           'SBAdminController@cards');
    Route::get('/colors',          'SBAdminController@colors');
    Route::get('/borders',         'SBAdminController@borders');
    Route::get('/animations',      'SBAdminController@animations');
    Route::get('/other',           'SBAdminController@other');
    Route::get('/login',           'SBAdminController@login');
    Route::get('/register',        'SBAdminController@register');
    Route::get('/forgot-password', 'SBAdminController@forgotPassword');
    Route::get('/error',           'SBAdminController@error');
    Route::get('/blank',           'SBAdminController@blank');
    Route::get('/charts',          'SBAdminController@charts');
    Route::get('/tables',          'SBAdminController@tables');
});

Route::get('/pusher',        'PusherController@index');
Route::get('/pusher/notify', 'PusherController@notify');
