<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Admin;
use App\Model\Item;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function login(Request $request)
    {
      $message = '';
      if ($request->isMethod('post')) {
        $authinfo =[
          'username' => $request->username,
          'password' => $request->password
        ];

        //'username'=> 'umanari145',
        //'password' => bcrypt('aaaa')

        if (Auth::attempt($authinfo)){
          return redirect()->route('AdminHome');
        } else {
          $message = 'ログインに失敗しました。';
        }
      }
      return view('pc.admins.login',[
        'message' => $message
      ]);
    }

    public function index()
    {
      $item = new Item();
      list($items, $search_word) = $item->getResult([]);
      return view('pc.admins.index',[
        'items' => $items
      ]);

    }
}
