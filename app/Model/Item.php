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
    public function getResult($ar_search_data, $has_tag_info = true) {

        $query = DB::table('items')
                ->select('id', 'title', 'volume', 'created');
        $query->orderBy('items.id','desc');

        //カテゴリー検索

        //キーワード検索
        if($v = array_get($ar_search_data, 'word')) {
            $query->where('title', 'like', '%'.$v.'%');
        }

        $items = $query->paginate(20);
        $this->decorateItem($items, true);
        return  $items;
    }


    /**
     * 商品のデータ加工
     * @param object $items 商品データ
     */
    private function decorateItem(&$items, $has_tag = false)
    {
        if ($has_tag) {
            $item_ids = $items->pluck('id')->toArray();
            $tags = $this->getTagByItem($item_ids);
            $tags_hash = $tags->groupBy('item_id')->toArray();
        }

        foreach ($items as &$item) {
            $time1 = new \DateTime($item->created);
            $item->created = $time1->format('Y/m/d');
            if (isset($tags_hash[$item->id])) {
                $item->tags_arr = $tags_hash[$item->id];
            }
        }
    }

    private function getTagByItem($item_id)
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

}
