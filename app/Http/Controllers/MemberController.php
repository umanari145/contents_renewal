<?php

namespace App\Http\Controllers;

use App\Model\Master;
use App\Model\Member;
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
        $errors = null;
        $formHash = $formCheck->getFormParam($request->all(), $request->isMethod('post'));
        if ($request->isMethod('post')) {
            $validator = $formCheck->getErrorMessage($formHash);
            if(!$validator->fails()){
                $member = new Member();
                $formParams = $request->all();
                unset($formParams['_token']);
                $member->fill($formParams)->save();
            } else {
                $errors = $validator->errors();
            }
        }

        return view('pc.member.create',[
            'data'       => $formHash,
            'errors'     => $errors,
            'masterLists' => $masterLists
        ]);
    }

    public function edit(Request $request, $memId)
    {
        $memberObj = Member::where('mem_id', $memId)->first()->toArray();
        $master = new Master();
        $formCheck = new FormCheck('Member/create', $memberObj);
        $masterLists = $master->getLists([
          'traffic','sex', 'area'
        ]);

        $data = null;
        $errors = null;
        $formHash = $formCheck->getFormParam($request->all(), $request->isMethod('post'));
        $formHash['mem_id'] = $memId;

        if ($request->isMethod('post')) {
            $validator = $formCheck->getErrorMessage($formHash);
            if(!$validator->fails()){
                $member = Member::find($memId);
                $formParams = $request->all();
                unset($formParams['_token']);
                $member->fill($formParams)->save();
            } else {
                $errors = $validator->errors();
            }
        }

        return view('pc.member.edit',[
            'data'       => $formHash,
            'errors'     => $errors,
            'masterLists' => $masterLists
        ]);

    }


}
