<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $incrementing = false;
    protected $guarded = [];
    protected $casts = [
        'notes' => 'array',
    ];

    public static function createOrder($orderData)
    {
        $data = RazorpayApi::createOrder($orderData);
        $notes = $data->notes->toArray();
        $order = new \App\Order;
        $order->id = $data->id;
        $order->entity = $data->entity;
        $order->amount = $data->amount;
        $order->currency = $data->currency;
        $order->receipt = $data->receipt;
        $order->status = $data->status;
        $order->attempts = $data->attempts;
        $order->notes = json_encode($notes);
        $order->save();
        return $order;
    }

    public function getAmountAttribute($value)
    {
        return $value / 100;
    }

    public function getStatusAttribute($value)
    {
        //TODO: Check for refund
        if ($value != 'paid') {
            return $this->fetchRecentInfo()->status;
        }
        return $value;
    }

    public function fetchRecentInfo()
    {
        $orderData = RazorpayApi::fetchOrder($this->id);
        $this->update([
            'amount_paid' => $orderData->amount_paid,
            'amount_due' => $orderData->amount_due,
            'offer_id' => $orderData->offer_id,
            'attempts' => $orderData->attempts,
            'status' => $orderData->status, ]);
        return $orderData;
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }
}
