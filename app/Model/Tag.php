<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tag extends Model{

    protected $table = 'tags';

    public function calcItemCountGroupByTag()
    {
        $query = DB::table('tags')
                ->select('tags.id','tags.tag',DB::raw('COUNT(item_tags.id) as num'))
                ->join('item_tags',function ($join){
                    $join->on('tags.id','=','item_tags.tag_id');
                })
               ->groupBy('tags.id')
               ->orderBy('num','desc')
               ->limit(20);

        $tags = $query->get();
        return $tags;
    }

}
