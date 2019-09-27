@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <a href="{{ url()->previous() }}" class="inline-block bg-blue-400 px-2 text-white mt-4 rounded">Go Back</a>
    <div class="md:mx-auto card max-w-lg p-8 pb-2 m-3 border border-black ">
        {{-- #TODO : Class optimization --}}
        <p class="text-white font-semibold float-right px-3 font-bold pb-1 capitalize tracking-loose bg-gray-400 text-white rounded-full @if($payment->status == 'captured') bg-success @elseif ($payment->status == 'failed') bg-danger @elseif ($payment->status == 'refund') bg-blue-500 @endif">{{ $payment->status }}</p>
        <h1 class="text-blue-500 text-xl pb-2 border-b">{{ $payment->id }}</h1>
        <p class="text-gray-600 mt-2">Order Id</p>
        <a class="font-semibold text-blue-900" href="{{ route('orders.show',['id'=> $payment->order_id]) }}">{{ $payment->order_id }}</a>
        <p class="text-gray-600 mt-2">Payment Method</p>
        <p class="font-semibold text-gray-900 capitalize">{{ $payment->method }}</p>
        @if ($payment->card_id)   
            <p class="text-gray-600 mt-2">Card Id</p>
            <details>
                <summary><span class="font-semibold text-gray-900">{{ $payment->card_id }}</span></summary>
                <p class="text-gray-600 mt-2">Name</p>
                <p class="font-semibold text-gray-900">{{ $payment->getCardDetails()->name }}</p>
                <p class="text-gray-600 mt-2">CardNumber</p>
                <p class="font-semibold text-gray-900">XXXXXXXX{{ $payment->getCardDetails()->last4 }}</p>
                <p class="text-gray-600 mt-2">Network</p>
                <p class="font-semibold text-gray-900">{{ $payment->getCardDetails()->network }}</p>
                <p class="text-gray-600 mt-2">Type</p>
                <p class="font-semibold text-gray-900">{{ $payment->getCardDetails()->type }}</p>
            </details>
        @endif
        <p class="text-gray-600 mt-2">Email</p>
        <p class="font-semibold text-gray-900">{{ $payment->email }}</p>
        <p class="text-gray-600 mt-2">Contact</p>
        <p class="font-semibold text-gray-900">{{ $payment->contact }}</p>
        <p class="text-gray-600 mt-2">Shipping Address</p>
        <p class="font-semibold text-gray-900">{{ $payment->getShippingAddress() }}</p>
        <p class="text-gray-500 text-xs float-right pt-3">{{ $payment->created_at->setTimezone('Asia/Kolkata')->toDateTimeString() }}</p>
    </div>
</div>
@endsection