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
}
