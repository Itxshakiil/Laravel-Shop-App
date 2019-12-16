<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
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
    public function store()
    {
        $order_data = [
            'receipt' => 3499,
            'amount' => Cart::total() * 100, // 2000 rupees in paise
            'currency' => 'INR',
            'payment_capture' => 1 // auto capture
        ];
        $order = Order::createOrder($order_data);
        $products = Cart::content()->map(function ($item) {
            return $item->model->id;
        })->values();
        $order->products()->attach($products);

        session(['order' => $order->id]);
        return redirect(route('order.checkout', ['order' => $order]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * Show the form for checkout.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function checkout(Order $order)
    {
        return view('checkout', compact('order'));
    }
}
