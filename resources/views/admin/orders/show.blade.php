@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <a href="{{ url()->previous() }}" class="inline-block bg-blue-400 px-2 text-white mt-4 rounded">Go Back</a>
    <div class="md:mx-auto card max-w-lg p-8 pb-2 m-3">
        <p class="text-white font-semibold float-right px-3 font-semibold capitalize tracking-loose bg-gray-400 text-white rounded-full @if($order->status == 'paid') bg-success @elseif ($order->status == 'attempted') bg-blue-500  @endif ">{{ $order->status }}</p>
        <h1 class="text-blue-500 text-xl pb-2">{{ $order->id }}</h1>
        <hr>
        <p class="text-gray-600 mt-2">Amount</p>
        <p class="font-semibold text-gray-900">{{ $order->amount." " .$order->currency }}</p>
        <p class="text-gray-600 mt-2">Attempts</p>
        <p class="font-semibold text-gray-900">{{ $order->attempts }}</p>
        <p class="text-gray-600 mt-2">Receipt</p>
        <p class="font-semibold text-gray-900">{{ $order->receipt }}</p>
        <p class="text-gray-500 text-xs float-right pt-3">{{ $order->created_at->setTimezone('Asia/Kolkata')->toDateTimeString() }}</p>
    </div>
</div>
@endsection