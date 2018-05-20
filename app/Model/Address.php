<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cache;

class Address extends Model
{
    protected $connection = 'master';

    protected $table = 'postcode';

    /**
     * 検索結果を取得
     *
     * @return array 県データの取得
     */
    public function getPref()
    {
        return $this->select('pref')
                  ->from('postcode')
                  ->groupBy('pref')
                  ->pluck('pref');
    }

}
