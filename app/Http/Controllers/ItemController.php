<?php

namespace App\Http\Controllers;

use App\Model\Item;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function __construct()
    {
        $this->Item = new Item();
    }

    public function index(Request $request)
    {
        $ar_search_data = $request->get('s', []);

        $items = $this->Item->getResult($ar_search_data);

        return view('pc.index', ['items' => $items]);
    }
}