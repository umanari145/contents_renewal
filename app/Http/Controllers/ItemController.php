<?php

namespace App\Http\Controllers;

use App\Model\Item;
use App\Model\Favorite;
use App\Model\History;
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
        $ar_search_data = $this->getSearchData($request);

        $has_paginate = true;
        $is_fav = false;
        $is_history = false;

        if (!empty($ar_search_data['is_fav'])) {
          $is_fav = true;
          $ar_search_data['is_fav'] = $request->cookie('laravel_session');
        }

        if (!empty($ar_search_data['is_history'])) {
          $has_paginate = false;
          $is_history = true;
          $ar_search_data['is_history'] = $request->cookie('laravel_session');
        }

        list($items, $search_word) = $this->Item->getResult($ar_search_data);

        return view('pc.items.index',
              [
                'is_fav'=> $is_fav,
                'is_history' => $is_history,
                'search_word' => $search_word,
                'items' => $items,
                'has_paginate' => $has_paginate
                ]
        );
    }

    public function view(Request $request, $id) {
        $item = Item::find($id);
        $item->registViewCount($item);

        $favorite = new Favorite();
        $session_id = $request->cookie('laravel_session');

        $history = new History();
        $history->regist_history($session_id, $id);

        $is_fav = $favorite->is_fav($session_id, $id);
        $item->tags_arr = $this->Item->getTagByItem($id);
        return view('pc.items.view',
          [
            'item' => $item,
            'is_fav' => $is_fav
          ]
        );
    }

    /**
     * お気に入り登録
     * @param $item_id 商品id
     */
    public function regist_favorite(Request $request){
      $Favorite = new Favorite();
      $sesion_id = $request->cookie('laravel_session');
      $item_id = $request->input('item_id');
      $Favorite->regist_favorite($sesion_id, $item_id);
    }

    /**
     * お気に入り削除
     * @param $item_id 商品id
     */
    public function delete_favorite(Request $request){
      $sesion_id = $request->cookie('laravel_session');
      $item_id = $request->input('item_id');
      $Favorite = new Favorite();
      $Favorite->delete_favorite($sesion_id, $item_id);
    }

    /**
     * 検索クエリの作成
     * @param Request $request リクエスト
     * @return array 検索クエリ
     */
    private function getSearchData(Request $request)
    {
        $ar_search_data = $request->get('s', []);
        //get句は基本的に登録
        if (!empty($ar_search_data)) {
            $request->session()->put('search_data', $ar_search_data);
        }

        //ページャー使用時はセッションから検索句を使う
        if ($page_no = $request->get('page', [])) {
            $ar_search_data = $request->session()->get('search_data', []);
        }
        return $ar_search_data;
    }


}
