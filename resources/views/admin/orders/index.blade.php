@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <h3 class="text-3xl my-2">Orders List</h3>
    <table class="overflow-x-auto w-full text-center border-collapse">
        <thead class="">
            <tr class="bg-gray-300">
                <th class="p-3">orderId</th>
                <th class="p-3">Amount</th>
                <th class="p-3">Attempts</th>>
                <th class="p-3">Receipt</th>
                <th class="p-3">Created at</th>
                <th class="p-3">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="border-gray-300 border-b">
                    <td class="p-3">
                        <a class="text-blue-500" href="{{ route('orders.show',['id'=> $order->id]) }}">{{ $order->id }}</a>
                    </td>
                    <td class="p-3">
                        <a class="text-blue-500" href="{{ route('orders.show',['id'=> $order->order_id]) }}">{{ $order->order_id }}</a>
                    </td>
                    <td class="p-3">{{ $order->amount.' '.$order->currency }}</td>
                    <td class="p-3">{{ $order->email }}</td>
                    <td class="p-3">{{ $order->contact }}</td>
                    <td class="p-3">{{ $order->created_at }}</td>
                    <td class="p-3"><span class="px-3 font-bold pb-1 capitalize tracking-loose bg-gray-400 text-white rounded-full @if($order->status == 'captured') bg-success @elseif ($order->status == 'failed') bg-danger @elseif ($order->status == 'refund') bg-blue-500 @endif">{{ $order->status }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection