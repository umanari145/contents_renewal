<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Ext\TTatemono;
use App\Models\Estate;

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
        return ['aaa','bbb', 'ccc'];
    }

}
