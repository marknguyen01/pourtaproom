<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class EventController extends Controller
{
    public function index(Request $rq, $slug) {
        $event = Event::where('slug', $slug)->first();

        if($event) {
            if(\App::environment('local')) {
                $event->image = 'http://pourcharlotte.com/storage/' . json_decode($event->image)[0];
            }
            else {
                $event->image = \Voyager::image(json_decode($event->image)[0]);
            }
            return view('event', ['event' => $event]);
        }
        else {
            return abort(404);
        }
    }
}
