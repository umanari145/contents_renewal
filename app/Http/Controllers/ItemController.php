<?php

namespace App\Http\Controllers;

use App\Model\Item;
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
        $items = $this->Item->getResult($ar_search_data);
        return view('pc.index', ['items' => $items]);
    }

    public function hogehoge(Request $request)
    {
        $this->Item->hogehogeb();

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