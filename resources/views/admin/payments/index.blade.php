@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <h3 class="text-3xl mt-2">Payments List</h3>
    <table>
        <tr class="bg-gray-300">
            <th>PaymentId</th>
            <th>OrderId</th>
            <th>Amount</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Created at</th>
            <th>Status</th>
        </tr>
        @foreach ($payments as $payment)
        <tr>
            <td>
                <a class="text-blue-500" href="{{ route('payments.show',['id'=> $payment->id]) }}">{{ $payment->id }}</a>
            </td>
            <td>
                <a class="text-blue-500" href="{{ route('orders.show',['id'=> $payment->order_id]) }}">{{ $payment->order_id }}</a>
            </td>
            <td>{{ $payment->amount.' '.$payment->currency }}</td>
            <td>{{ $payment->email }}</td>
            <td>{{ $payment->contact }}</td>
            <td>{{ $payment->created_at }}</td>
            <td><span class="px-3 font-bold pb-1 capitalize tracking-loose bg-gray-400 text-white rounded-full @if($payment->status == 'captured') bg-success @elseif ($payment->status == 'failed') bg-danger @elseif ($payment->status == 'refund') bg-blue-500 @endif">{{ $payment->status }}</span></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection