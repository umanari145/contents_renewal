<?php

namespace App\Http\Controllers;

use App\Model\Address;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Cookie;


class AddressController extends Controller
{

    public function __construct()
    {
        $this->address = new Address();
    }

    /**
     * 県の取得
     *
     * @param  Request $request リクエストパラメーター
     * @return response  市区町村
     */
    public function getPref(Request $request)
    {
        $prefs = $this->address->getPref();
        return response()->json($prefs);
    }

}
