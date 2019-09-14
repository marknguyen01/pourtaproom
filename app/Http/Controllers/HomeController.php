<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use DebugBar\DebugBar;
use Exception;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;

class HomeController extends Controller
{
    private $menuCategories, $menuItems, $unTappdClient, $eventItems, $errors = null;
    public function __construct() {
        $unTappdApiToken = trim(setting('api.untappd_token'));
        $unTappdapiID = trim(setting('api.untappd_id'));
        $unTappdapiMenuID = trim(setting('api.untappd_menu_id'));

        $facebookToken = trim(setting('api.facebook_token'));
        $facebookID = trim(setting('api.facebook_page_id'));

        if(empty($unTappdApiToken) || empty($unTappdapiID) || empty($unTappdapiMenuID)) {
            $this->menuCategories = $this->menuItems = null;
            $this->errors = 'Untappd API Token or User ID or Menu ID is not set, please check your settings';
        }
        else {
            // Create untappd client
            $this->unTappdClient = new \GuzzleHttp\Client([
                'auth' => [$unTappdapiID, $unTappdApiToken],
                'base_uri' => 'https://business.untappd.com/api/v1/',
                'timeout' => 10.0,
            ]);
        }
    }
    public function index() {
        if(\Auth::check() || \App::environment('local')) {
            if(isset($this->unTappdClient)) $this->getFirstItems();
            $this->getEvents();
            return view('index', [
                'categories' => $this->menuCategories,
                'items' => $this->menuItems,
                'events' => $this->eventItems,
                'errors' => $this->errors,
            ]);
        }
        else return view('construction');
    }

    private function getFirstItems() {
        // If Guzzle is not unable to make a request
        try {
            $sectionRes = $this->unTappdClient->request('GET', 'menus/'
                . trim(setting('api.untappd_menu_id')) . '/sections')->getBody()->getContents();
            $this->menuCategories = $sectionRes;
            $firstSectionID = json_decode($sectionRes, true)['sections'][0]['id'];
            $itemRes = $this->unTappdClient->request('GET', 'sections/'
                . $firstSectionID . '/items')->getBody()->getContents();
            $this->menuItems = $itemRes;
        }
        catch (\Throwable | Exception $e) {
            $this->menuCategories = $this->menuItems = null;
            $this->errors = 'Please check your credentials. Cannot establish a connection to Untappd API server. ' . $e->getMessage();
        }
    }

    public function getItems(Request $rq, $sectionID) {
        if($rq->ajax()) {
            $res = $this->unTappdClient->request('GET', 'sections/' . $sectionID . '/items')->getBody()->getContents();
            return response()->json($res);
        }
        else abort(403, 'Unauthorized action.');
    }

    private function getEvents() {
        $events = Event::where('published', true)->get();
        $events->map(function($event, $key) {
            $event->description_text = html_entity_decode(strip_tags($event->description));
            $event->description = \Str::words($event->description, 50);
            if(\App::environment('local')) {
                $event->image = 'http://pourcharlotte.com/storage/' . json_decode($event->thumbnail('cropped'))[0];
            }
            else {
                $event->image = \Voyager::image(json_decode($event->thumbnail('cropped'))[0]);
            }
            $event->date_time = (new \DateTime($event->date_time))->format('F dS, Y \a\t h:i A');
            $event->url = route('event', $event->slug);
            return $event;
        });
        $this->eventItems = $events;
    }

    public function createReservation(Request $rq) {
        $validator = \Validator::make($rq->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|numeric|phone',
            'email' => 'required|email',
            'event' => 'required|max:125',
            'date_time' => 'required|date',
            'num_people' => 'required|integer',
            'catering' => 'max:255',
        ]);
        if($validator->fails()) {
            $errors = array();
            foreach($validator->errors()->all() as $message) {
                array_push($errors, $message);
            }
            return response()->json(array(
                'title' => 'Please correct the following errors',
                'message' => $errors,
            ), 400);
        }
        $data = array(
            'first_name' => strip_tags($rq->input('first_name')),
            'last_name' => strip_tags($rq->input('last_name')),
            'phone_number' => strip_tags($rq->input('phone_number')),
            'email' => strip_tags($rq->input('email')),
            'event' => strip_tags($rq->input('event')),
            'date_time' => strip_tags($rq->input('date_time')),
            'company' => strip_tags($rq->input('company')),
            'num_people' => strip_tags($rq->input('num_people')),
            'catering' => strip_tags($rq->input('catering')),
            'subject' => 'Reservation | ' . strip_tags($rq->input('first_name') . ' ' . strip_tags($rq->input('last_name'))),
        );
        if(\Session::get('contact_time') != null && !\App::environment('local')) {
            if(time() - \Session::get('contact_time') <= 90)
                return response()->json([
                    'title' => 'Spam prevention system',
                    'message' => 'Please wait at least 15 minutes before sending another message'
                ], 400);
        }
        try {
            if(\Auth::check()) {
                if(\Auth::user()->email === "marknguyen1621@gmail.com") {
                    \Mail::to('marknguyen1621@gmail.com')->send(new \App\Mail\EmailContact($data));
                }
                else {
                    \Mail::to(setting('contact.email'))->send(new \App\Mail\EmailContact($data));
                }
            }
            else {
                \Mail::to(setting('contact.email'))->send(new \App\Mail\EmailContact($data));
            }
        }
        catch(Exception $e) {
            return json_encode(array(
                'title' => 'Unexpected error',
                'message' => $e->getMessage(),
            ), 400);
        }
        finally {
            \Session::put('contact_time', time());
            return response()->json(array(
                'title' => 'Your reservation has been submitted',
                'message' => ['Please allow at least 24 hours for confirmation'],
            ));
        }
    }
}
