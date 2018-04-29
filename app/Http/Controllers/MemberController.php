<?php

namespace App\Http\Controllers;

use App\Model\Master;
use App\Model\Favorite;
use App\Model\History;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Forms\FormCheck;
use Cookie;
use Yaml;
use Validator;




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
        $formCheck = new FormCheck('Member/create');
        $masterLists = $master->getLists([
          'traffic','sex', 'area'
        ]);
        $data = null;
        $formHash = $formCheck->getFormParam($request->all(), $request->isMethod('post'));
        if ($request->isMethod('post')) {
            $validator = $formCheck->getErrorMessage($formHash);
            $errors = $validator->errors();
            var_dump($errors);
        }

        return view('pc.member.create',[
            'data'       => $formHash,
            'masterLists' => $masterLists
        ]);
    }


}
