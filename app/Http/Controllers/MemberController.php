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
        $masterLists = $master->getLists([
          'traffic','sex', 'area'
        ]);
        $data = null;
        return view('pc.member.create',[
            'query'       => $data,
            'masterLists' => $masterLists
        ]);
    }


}
