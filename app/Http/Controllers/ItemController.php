<?php

namespace App\Http\Controllers;

use App\Model\Item;
use App\Model\Favorite;
use App\Model\History;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Cookie;


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
          $ar_search_data['is_fav'] = $request->cookie('favorite_number','');
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

        $session_id = $request->cookie('laravel_session');
        $history = new History();
        $history->regist_history($session_id, $id);

        $favorite = new Favorite();
        $favorite_number = @$request->cookie('favorite_number')?: $favorite->generateNo();
        $is_fav = $favorite->is_fav($favorite_number, $id);
        $item->tags_arr = $this->Item->getTagByItem($id);
        $item->movie_url = str_replace('watch?v=','embed/', $item->movie_url);
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
      $favorite_number = @$request->cookie('favorite_number')?:$Favorite->generateNo();
      $item_id = $request->input('item_id');
      $Favorite->regist_favorite($favorite_number, $item_id);
      Cookie::queue('favorite_number', $favorite_number, 60 * 24 * 365);
    }

    /**
     * お気に入り削除
     * @param $item_id 商品id
     */
    public function delete_favorite(Request $request){
      $Favorite = new Favorite();
      $favorite_number = @$request->cookie('favorite_number');
      $item_id = $request->input('item_id');
      $Favorite->delete_favorite($favorite_number, $item_id);
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
        $page_no = $request->get('page', []);
        if (!empty($page_no)) {
            $ar_search_data = $request->session()->get('search_data', []);
        }

        //ページャー&検索句共にからの場合はセッションを削除
        if (empty($ar_search_data) && empty($page_no)) {
          $request->session()->forget('search_data');
        }

        return $ar_search_data;
    }


}
