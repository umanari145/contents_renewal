<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ItemTag extends Model{

    protected $table = 'item_tags';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    /**
     * 個別のレコードの登録
     *
     * @param string $item_id 商品id
     * @param string $tag_arr 複数タグid
     */
    public function createItemTags($item_id, $tag_arr=[])
    {
      $this->where('item_id', $item_id)->delete();

      $item_tags = [];
      if (!empty($tag_arr)) {
        foreach ($tag_arr as $tag_id) {
          $item_tags[] = [
            'item_id' => $item_id,
            'tag_id'  => $tag_id
          ];
        }
        $this->insert($item_tags);
      }
    }

}
