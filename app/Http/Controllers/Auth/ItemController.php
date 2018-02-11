<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Admin;
use App\Model\Item;
use App\Model\Tag;
use DB;
class ItemController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function regist(Request $request, $item_id)
    {
      $item = Item::find($item_id);

      $tag = new Tag();
      $tags = $tag->where('show_tag',0)->pluck('id','tag');
      return view('pc.admins.items.regist',[
        'item' => $item,
        'tags' => $tags
      ]);

    }
}
