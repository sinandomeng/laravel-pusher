<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\StatusLiked as StatusLikingEvent;
use App\Notifications\StatusLiked as StatusLikingNotif;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Notification;

use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function index()
    {
        return view('pusher.index');
    }

    public function notify(Faker $faker)
    {
        // send real-time notification
        event(new StatusLikingEvent($faker->firstName));

        // send email notification
        Notification::send(User::find(1), new StatusLikingNotif());

        return view('pusher.notify');
    }
}
