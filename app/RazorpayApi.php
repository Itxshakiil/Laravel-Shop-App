<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Razorpay\Api\Api;

class RazorpayApi extends Model
{
    private static $privateKey = '23xP5rQCOqdRjie8nNvu3FD2';
    public static $publicKey = 'rzp_test_UtGYTNBzepZoVA';

    private static function connect()
    {
        return new Api(self::$publicKey, self::$privateKey);
    }

    public static function createOrder($orderData){
        return self::connect()->order->create($orderData);
    }

    public static function fetchOrder($razorpay_order_id){
        return self::connect()->order->fetch($razorpay_order_id);
    }
    public static function fetchCard($card_id){
        return self::connect()->card->fetch($card_id);
    }

    public static function verifyPaymentSignature($attributes){
        return self::connect()->utility->verifyPaymentSignature($attributes);
    }

    public static function fetchPayment($razorpay_payment_id){
        return self::connect()->payment->fetch($razorpay_payment_id);
    }
}
