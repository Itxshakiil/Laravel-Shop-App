@extends('layouts.app')
@section('title','Payment Successfull')
@section('content')
    <div class="container mx-auto">
        <div class="md:mx-auto card max-w-lg p-8 pb-2 m-3">
            <p class="text-success font-semibold float-right">{{ $payment->amount." " .$payment->currency }}</p>
            <h1 class="text-blue-500 text-xl pb-2">Payment Successfull.</h1>
            <hr>
            <p class="text-gray-600 mt-2">Transaction Id</p>
            <p class="font-semibold text-gray-900">{{ $payment->id }}</p>
            <p class="text-gray-600 mt-2">Order Id</p>
            <p class="font-semibold text-gray-900">{{ $payment->order_id }}</p>
            <p class="text-gray-600 mt-2">Shipping Address</p>
            <p class="font-semibold text-gray-900">{{ $payment->getShippingAddress() }}</p>
            <p class="text-gray-500 text-xs float-right pt-3">{{ $payment->created_at->setTimezone('Asia/Kolkata')->toDateTimeString() }}</p>
        </div>
    </div>
@endsection