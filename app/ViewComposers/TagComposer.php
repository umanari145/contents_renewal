<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Model\Tag;

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

    private function getTagLists()
    {
        $tag = new Tag;
        $tags = $tag->calcItemCountGroupByTag();

        return $tags;
    }

}
