<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Item extends Model
{
    //
    /**
     * 検索結果を取得
     *
     * @param array $ar_search_data 検索クエリ
     * @return array 検索結果
     */
    public function getResult($ar_search_data ) {

        $query = DB::table('items')
        ->join('item_tags',function ($join){
            $join->on('items.id','=','item_tags.item_id');
        })
        ->groupBy('items.id')
        ->orderBy('items.id','desc');

        //カテゴリー検索

        //キーワード検索
        if($v = array_get($ar_search_data, 'word')) {
            $query->where('title', 'like', '%'.$v.'%');
        }

        $item = $query->paginate(20);
        return  $item;
    }

}
