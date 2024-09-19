<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function __construct() 
    {
        
    }

    public function getOrderInfoById($id) 
    {
        if (empty($id)) {
            return null;
        }

        $currencys  = ['twd','usd','jpy','rmb','myr'];
        foreach ($currencys as $key => $currency) {
            if ($key == 0) {
                $query = DB::table(DB::table('orders_'.$currency));
            } else {
                $query = $query->unionAll(DB::table('orders_'.$currency));
            }
        }
        $order = $query->where('id',$id)->first();
        return $order;
    }
}
