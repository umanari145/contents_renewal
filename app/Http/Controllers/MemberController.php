<?php

namespace App\Http\Controllers;

use App\Model\Master;
use App\Model\Favorite;
use App\Model\History;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Cookie;
use Yaml;


class MemberController extends Controller
{

    public function __construct()
    {
    }

    public function index(Request $request)
    {
    }

    public function create(Request $request)
    {
        $master = new Master();
        $totalLists = $master->getLists([
          'traffic','sex', 'area'
        ]);
        var_dump($totalLists);
    }


}
