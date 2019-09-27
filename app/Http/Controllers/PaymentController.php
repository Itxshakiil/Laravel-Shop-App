<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use App\RazorpayApi;
use Illuminate\Http\Request;
use Razorpay\Api\Errors\SignatureVerificationError;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->error){
            $error =$request->error['description'];
            return view('payment.failed', compact('error'));
        }
        try {
            // Please note that the razorpay order ID must
            // come from a trusted source (fetched from API here, but
            // could be database or something else)
            $payment = RazorpayApi::connect()->payment->fetch($request->razorpay_payment_id);
            $attributes = array(
                'razorpay_signature' => $request->razorpay_signature,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_order_id' => $payment->order_id
            );
            RazorpayApi::connect()->utility->verifyPaymentSignature($attributes);
        } catch (SignatureVerificationError $e) {
            // Check if payment really exists
            $error =$e->getMessage();
            return view('payment.failed', compact('error'));
        }
        $notes = $payment->notes->toArray();
        $order = Order::find($payment->order_id);
        $payment = $order->payments()->create([
            'id' => $payment->id,
            'entity' => $payment->entity,
            'amount' => $payment->amount,
            'currency' => $payment->currency,
            'status' => $payment->status,
            'invoice_id' => $payment->invoice_id,
            'international' => $payment->international,
            'method' => $payment->method,
            'amount_refunded' => $payment->amount_refunded,
            'refund_status' => "null",
            'captured' => $payment->captured,
            'description' => $payment->description,
            'card_id' => $payment->card_id,
            'bank' => $payment->bank,
            'wallet' => $payment->wallet,
            'vpa' => $payment->vpa,
            'email' => $payment->email,
            'contact' => $payment->contact,
            'fee' => $payment->fee,
            'tax' => $payment->tax,
            'error_code' => $payment->error_code,
            'error_description' => $payment->error_description,
            'notes' => json_encode($notes),
        ]);
        return redirect()->route('payment.status', ['payment' => $payment]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('payment.success', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
