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

Route::get('/', function () {
    return view('filipay');
});

Route::get('/pusher', function () {
    return view('pusher');
});

Route::get('/portfolio', function () {
    return view('portfolio.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () { return view('admin.dashboard'); });
    // Route::get('/', function () { });
});

Route::get('/status-liked', function (Faker $faker) {
    // send real-time notification
    event(new StatusLikingEvent($faker->firstName));

    // send email notification
    Notification::send(User::find(1), new StatusLikingNotif());

    return view('event-launched');
});
