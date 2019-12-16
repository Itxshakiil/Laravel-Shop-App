@extends('layouts.app')
@section('title','All payments')
@section('content')
<div class="container mx-auto">
    <h3 class="text-3xl my-2">Payments List</h3>
    <table class="overflow-x-auto w-full text-center border-collapse">
        <thead class="">
            <tr class="bg-gray-300">
                <th class="p-3">PaymentId</th>
                <th class="p-3">OrderId</th>
                <th class="p-3">Amount</th>
                <th class="p-3">Email</th>
                <th class="p-3">Contact</th>
                <th class="p-3">Created at</th>
                <th class="p-3">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr class="border-gray-300 border-b">
                    <td class="p-3">
                        <a class="text-blue-500" href="{{ route('payments.show',['id'=> $payment->id]) }}">{{ $payment->id }}</a>
                    </td>
                    <td class="p-3">
                        <a class="text-blue-500" href="{{ route('orders.show',['id'=> $payment->order_id]) }}">{{ $payment->order_id }}</a>
                    </td>
                    <td class="p-3">{{ $payment->amount.' '.$payment->currency }}</td>
                    <td class="p-3">{{ $payment->email }}</td>
                    <td class="p-3">{{ $payment->contact }}</td>
                    <td class="p-3">{{ $payment->created_at }}</td>
                    <td class="p-3"><span class="px-3 font-bold pb-1 capitalize tracking-loose bg-gray-400 text-white rounded-full @if($payment->status == 'captured') bg-success @elseif ($payment->status == 'failed') bg-danger @elseif ($payment->status == 'refund') bg-blue-500 @endif">{{ $payment->status }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection