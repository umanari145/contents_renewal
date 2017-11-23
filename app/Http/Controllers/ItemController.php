<?php

namespace App\Http\Controllers;

use App\Model\Item;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class ItemController extends Controller
{

    public function index()
    {
       Redis::set('hoge', 'yamamotomasa');
       $hoge = Redis::get('hoge');
var_dump($hoge);
//        $hogehoge = $radis->get('foo');
//var_dump($hogehoge);

        $items = Item::orderBy('id', 'desc')->paginate(20);
        return view('pc.index', ['items' => $items]);
    }
}