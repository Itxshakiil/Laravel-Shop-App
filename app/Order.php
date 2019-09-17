<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $incrementing = false;
    
    public static function createOrder($orderData)
    {
        $data = RazorpayApi::connect()->order->create($orderData);;
        $order = new \App\Order;
        $order->id = $data->id;
        $order->entity = $data->entity;
        $order->amount = $data->amount;
        $order->currency = $data->currency;
        $order->receipt = $data->receipt;
        $order->status = $data->status;
        $order->attempts = $data->attempts;
        // $order->notes = $data->notes;
        $order->save();
        return $data->id;
    }
}
