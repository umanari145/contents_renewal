<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cache;

class Item extends Model
{

    /**
     * 検索結果を取得
     *
     * @param array $ar_search_data 検索クエリ
     * @return array 検索結果
     */
    public function getResult($ar_search_data, $has_tag_info = true)
    {

        $query = DB::table('items')
                ->select('id','original_id','title','volume','created');

        $query = $this->makeWhere($query, $ar_search_data);
        $query->orderBy('items.id','desc');

        $items = $query->paginate(20);
        $this->decorateItem($items, true);
        return  $items;
    }

    /**
     * 検索句の作成
     * @param object $query クエリオブジェクト
     * @param array $ar_search_data 検索句
     * @return クエリオブジェクト
     */
    private function makeWhere($query, $ar_search_data)
    {
        //キーワード検索
        if($v = array_get($ar_search_data, 'word')) {
            $query->where('title', 'like', '%'.$v.'%');
        }

        //タグ検索
        if ($tag_id = array_get($ar_search_data, 'tag')) {

            $query->whereExists(function ($query) use ($tag_id) {
                $query->select('item_tags.id')
                ->from('item_tags')
                ->where('item_tags.tag_id', $tag_id)
                ->whereRaw('item_tags.item_id = items.id');
            });
        }
        return $query;
    }

    /**
     * 商品のデータ加工
     * @param object $items 商品データ
     */
    private function decorateItem(&$items, $has_tag = false)
    {
        $tags_hash = [];
        if ($has_tag) {
            $item_ids = $items->pluck('id')->toArray();
            $tags = $this->getTagByItem($item_ids);
            $tags_hash = $tags->groupBy('item_id')->toArray();
        }

        foreach ($items as &$item) {
            if ($has_tag == true &&isset($tags_hash[$item->id])) {
                $item->tags_arr = $tags_hash[$item->id];
            }
        }
    }

    /**
     * タグ情報を取得
     * @param string $item_id 商品id(変数、配列ともにあり)
     * @return array タグのクエリ
     *
     */
    public function getTagByItem($item_id)
    {
        $query = DB::table('tags')
              ->select('item_tags.item_id','tags.id','tags.tag')
              ->join('item_tags',function ($join){
                $join->on('tags.id','=','item_tags.tag_id');
              });

        if (is_array($item_id)) {
            $query->whereIn('item_tags.item_id', $item_id);
        } else {
            $query->where('item_tags.item_id', $item_id);
        }
        $tags = $query->get();
        return $tags;
    }

    public function hogehogeb()
    {
        //このメソッドで保存
        $value = Cache::remember('aaaaa', 120, function() {
            return DB::table('items')->limit(10)->get();
        });

        //このメソッドで取得
        $value2 = Cache::get('aaaaa', function() {
            return DB::table('items')->limit(10)->get();
        });

        //ログを見てsqlを発行しているかどうかを確認
        dd($value2);
    }

}
