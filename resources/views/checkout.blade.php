@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="form-wrapper">
        <h3 class="lead text-primary">Checkout with RazorPay</h3>
        <p class="text-dark">You are going to Pay <strong>₹ {{ $order['amount']/100 }}</strong> for
            <strong>#{{ $order->id }}</strong></p>
            <form method="POST" action="https://api.razorpay.com/v1/checkout/embedded">  
                <input type="hidden" name="key_id" value="rzp_test_UtGYTNBzepZoVA">  
                <input type="hidden" name="order_id" value="{{ $order->id }}">  
                <input type="hidden" name="name" value="Acme Corp">  
                <input type="hidden" name="description" value="Payment for Order #{{ $order->id }}">
                <fieldset>
                    <legend class="font-semibold mt-1">Personal Details</legend>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="prefill[name]">
                            Full Name
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="prefill[name]" name="prefill[name]" type="text" placeholder="John Doe">
                        </div>
                    </div>  
        
                    
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="prefill[email]">Email
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="prefill[email]" name="prefill[email]" type="email" placeholder="example@company.com">
                            <p class="text-gray-600 text-xs italic">We'll use this for password reset.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="prefill[contact]">
                            Mobile Number
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="prefill[contact]" name="prefill[contact]" type="tel" placeholder="9123456780">
                        </div>
                    </div> 
                </fieldset>
                <fieldset>
                    <legend class="font-semibold">Shipping Address</legend>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="notes[shipping address][local]">
                            Street Address
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="notes[shipping address][local]" name="notes[shipping address][local]" type="text" placeholder="Flat/House No./Colony/Street/Locality">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="notes[shipping address][state]">
                            State
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="notes[shipping address][state]" name="notes[shipping address][state]" type="text" placeholder="Albuquerque">
                        </div>
                        {{-- <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                            State
                            </label>
                            <div class="relative">
                                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"   id="grid-state">
                                    <option>Faridabad</option>
                                    <option>Delhi</option>
                                    <option>Noida</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div> --}}
                        <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="notes[shipping address][pincode]">
                            Zip
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="notes[shipping address][pincode]" name="notes[shipping address][pincode]" type="text" placeholder="6 digits [0-9] pincode">
                        </div>
                    </div>
                </fieldset>
            <input type="hidden" name="callback_url" value="http://127.0.0.1:8000/payment">
            <input type="hidden" name="cancel_url" value="http://127.0.0.1:8000/cancel-payment">  
            <small>You will be redirect to payment page.</small>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>            
        </form>
    </div>
</div>

@endsection