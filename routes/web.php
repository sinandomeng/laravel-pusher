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

Route::get('/sb-admin',      'SBAdminController@index');

Route::get('/pusher',        'PusherController@index');
Route::get('/pusher/notify', 'PusherController@notify');
