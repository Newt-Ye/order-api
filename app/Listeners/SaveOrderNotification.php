<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class SaveOrderNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        //
        $params = $event->order;
        // logger(['SaveOrderNotification'=>$params]);
        
        $table = 'orders_' . strtolower($params['currency']);
        DB::table($table)->insert([
            'id' => $params['id'],
            'name' => $params['name'],
            'address' => json_encode($params['address']),
            'price' => $params['price'],
            'currency' => $params['currency'],
        ]);
    }
}
