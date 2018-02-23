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
     * @param string $favorite_number お気にいり番号
     * @param int $item_id 商品id
     * @param boolean true(お気に入りあり)/false(お気に入りなし)
     */
    public function is_fav($favorite_number, $item_id)
    {
      $item_count = $this->where(['favorite_number' =>$favorite_number,
                    'item_id' => $item_id])
            ->count();
      return ($item_count > 0) ? '1':'0';
    }

    /**
     * お気に入り登録
     *
     * @param string $favorite_number お気に入り番号
     * @param int $item_id 商品id
     */
    public function regist_favorite($favorite_number, $item_id)
    {
      $this->favorite_number = $favorite_number;
      $this->item_id = $item_id;
      $this->save();
    }

    /**
     * お気に入り削除
     *
     * @param string $favorite_number お気に入り番号
     * @param int $item_id 商品id
     */
    public function delete_favorite($favorite_number, $item_id)
    {
      $this->where(['favorite_number' =>$favorite_number,
                    'item_id' => $item_id])
            ->delete();
    }

    /**
     * お気に入り時の番号を発行
     * @return string お気に入り番号
     */
    public function generateNo()
    {
      $favorite_number ='';
      while (true) {
        $favorite_number = str_random(40);
        $is_exist = $this->where(['favorite_number' => $favorite_number])
             ->count();
        if ($is_exist === 0) {
          break;
        }
      }
      return $favorite_number;
    }
}
