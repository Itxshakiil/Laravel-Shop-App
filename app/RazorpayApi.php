<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Razorpay\Api\Api;

class RazorpayApi extends Model
{
    private static $privateKey = "23xP5rQCOqdRjie8nNvu3FD2";
    public static $publicKey = "rzp_test_UtGYTNBzepZoVA";
    
    public static function connect(){
        return new Api(self::$publicKey, self::$privateKey);
    }
}
