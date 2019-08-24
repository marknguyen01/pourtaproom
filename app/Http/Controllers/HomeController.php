<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{   
    private $categories, $items = null;
    public function __construct() {
        $client = new \GuzzleHttp\Client(['auth' => ['marknguyen1621@gmail.com', 'jXrZmHv5Sowh4yoZUtvB']]);
        $sectionRes = $client->request('GET', 'https://business.untappd.com/api/v1/menus/55500/sections')->getBody()->getContents();
        $this->categories = json_decode($sectionRes, true)['sections'];
        $firstSectionID = $this->categories[0]['id'];
        $itemRes = $client->request('GET', 'https://business.untappd.com/api/v1/sections/' . $firstSectionID . '/items')->getBody()->getContents();
        $this->items = json_decode($itemRes, true)['items'];
    }
    public function index() {
        return view('index', ['categories' => $this->categories, 'items' => $this->items]);
    }

    public function getItems(Request $rq, $sectionID) {
        if($request->ajax()) {
            
        }
        else return error(404);
    }
}
