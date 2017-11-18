<?php

namespace App\Http\Controllers;

use App\Model\Item;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{

    public function index()
    {

        $items = Item::orderBy('id', 'desc')->paginate(20);
        return view('', ['items' => $items]);
    }
}