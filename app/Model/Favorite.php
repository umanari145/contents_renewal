<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cache;

class Favorite extends Model
{
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    /**
     * お気に入り判定
     *
     * @param string $session_id セッションid
     * @param int $item_id 商品id
     * @param boolean true(お気に入りあり)/false(お気に入りなし)
     */
    public function is_fav($sesion_id, $item_id)
    {
      $item_count = $this->where(['session_id' =>$sesion_id,
                    'item_id' => $item_id])
            ->count();
      return ($item_count > 0) ? '1':'0';
    }

    /**
     * お気に入り登録
     *
     * @param string $session_id セッションid
     * @param int $item_id 商品id
     */
    public function regist_favorite($sesion_id, $item_id)
    {
      $this->session_id = $sesion_id;
      $this->item_id = $item_id;
      $this->save();
    }

    /**
     * お気に入り削除
     *
     * @param string $session_id セッションid
     * @param int $item_id 商品id
     */
    public function delete_favorite($sesion_id, $item_id)
    {
      $this->where(['session_id' =>$sesion_id,
                    'item_id' => $item_id])
            ->delete();
    }
}
