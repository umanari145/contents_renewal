<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Model\Tag;
use Illuminate\Support\Facades\Redis;

/**
 * Class LinksComposer
 *
 * @package App\Http\ViewComposers
 */
class TagComposer {


    public function compose(View $view)
    {
        $view->with('tags', $this->getTagLists());
    }

    /**
     *
     * キャッシュを活用してカテゴリー別のタグ数を出力
     *
     * @return タグ情報
     */
    private function getTagLists()
    {
        if (Redis::command('exists',['ranking_list'])) {
           $cached = Redis::command('lrange', ['ranking_list',0,-1]);
           $tags= array_map(function($val){return unserialize($val);}, $cached);
        } else {
            $tag = new Tag;
            $tags = $tag->calcItemCountGroupByTag();
            Redis::pipeline(function ($pipe) use ($tags) {
                foreach ($tags as $tag){
                    $tag_str = serialize($tag);
                    Redis::rpush('ranking_list', $tag_str);
                }
            });
        }
        return $tags;
    }

}
