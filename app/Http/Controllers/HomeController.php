<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $categories, $items, $client = null;
    public function __construct() {
        $this->client = new \GuzzleHttp\Client(['auth' => ['marknguyen1621@gmail.com', 'jXrZmHv5Sowh4yoZUtvB']]);
        $sectionRes = $this->client->request('GET', 'https://business.untappd.com/api/v1/menus/55500/sections')->getBody()->getContents();
        $this->categories = $sectionRes;
        $firstSectionID = json_decode($sectionRes, true)['sections'][0]['id'];
        $itemRes = $this->client->request('GET', 'https://business.untappd.com/api/v1/sections/' . $firstSectionID . '/items')->getBody()->getContents();
        $this->items = $itemRes;
    }
    public function index() {
        return view('index', ['categories' => $this->categories, 'items' => $this->items]);
    }

    public function getItems(Request $rq, $sectionID) {
        if($rq->ajax()) {
            $res = $this->client->request('GET', 'https://business.untappd.com/api/v1/sections/' . $sectionID . '/items')->getBody()->getContents();

            return response()->json($res);
        }
        else return error(404);
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
                'message' => $errors,
            ), 400);
        }
        $data = array(
            'name' => strip_tags($rq->input('name')),
            'email' => strip_tags($rq->input('email')),
            'phone' => strip_tags($rq->input('phone')),
            'msg' => strip_tags($rq->input('message')),
            'subject' => 'Customer inquiry | ' . strip_tags($rq->input('name')),
        );
        if(\Session::get('contact_time') != null && !\Auth::check()) {
            if(time() - \Session::get('contact_time') <= 90)
                return response()->json(['message' => 'Please wait at least 15 minutes before sending another message'], 400);
        }
        try {
            $site_email = setting('site.email');
            if(\Auth::check()) {
                if(\Auth::user()->email === "marknguyen1621@gmail.com") {
                    \Mail::to('marknguyen1621@gmail.com')->send(new \App\Mail\EmailContact($data));
                }
                else {
                    \Mail::to($site_email . '.test-google-a.com')->send(new \App\Mail\EmailContact($data));
                }
            }
            else {
                \Mail::to($site_email . '.test-google-a.com')->send(new \App\Mail\EmailContact($data));
            }

            \Session::put('contact_time', time());
            return response()->json(array(
                'message' => 'An inquiry has been sent succesfully to ' . $site_email
            ));
            \Log::info($site_email);
        }
        catch(Exception $e) {
            return json_encode(array(
                'message' => 'Error: ' . $e->getMessage()
            ), 400);
        }
    }
}
