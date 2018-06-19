<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cache;

class Payment extends Model
{
    /**
     * 検索結果を取得
     *
     * @return array 県データの取得
     */
    public function getCustomerPaymentDataGroupBy()
    {
        $data = $this->select(DB::raw('*, DATE_FORMAT(payment_date,"%Y%m") as payment_month'))
           ->orderby('payment_month')
           ->get()
           ->groupBy('customer_id')
           ->map(function ($v) {
               return $v->groupBy('payment_month');
           })
           ->toArray();
        dd($data);
    }
}
