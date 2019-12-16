<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::instance('default')->content();
        $saveForLaterItems = Cart::instance('saveForLater')->content();
        return view('cart.index', compact('cartItems', 'saveForLaterItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        });
        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success', 'Item is already in your cart!');
        }
        Cart::add($product->id, $product->name, 1, $product->price)->associate('App\Product');
        return redirect()->route('cart.index')->with('success', 'Item was added to your cart');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5' // Total Stock
        ]);
        if ($validator->fails()) {
            session()->flash('error', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false], 400);
        }
        // if ($request->quantity > $request->productQuantity) {
        //     session()->flash('error', 'We currently do not have enough items in stock.');
        //     return response()->json(['success' => false], 400);
        // }
        Cart::update($id, $request->quantity);
        session()->flash('success', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success', 'Item was removed from your cart');
    }

    /**
     * Switch to Save From Later
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::instance('default')->get($id);

        Cart::instance('default')->remove($id);
        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($item) {
            return $cartItem->id === $item->id;
        });
        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success', 'Item is already saved For Later!');
        }
        Cart::instance('saveForLater')->add($item->model->id, $item->model->name, 1, $item->model->price)->associate('App\Product');
        return redirect()->route('cart.index')->with('success', 'Item is saved for Later.');
    }
}
