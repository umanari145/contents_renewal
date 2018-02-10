<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cache;

class History extends Model
{
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    /**
     * 履歴登録
     *
     * @param string $session_id セッションid
     * @param int $item_id 商品id
     */
    public function regist_history($sesion_id, $item_id)
    {
      $this->session_id = $sesion_id;
      $this->item_id = $item_id;
      $this->save();
    }

}
