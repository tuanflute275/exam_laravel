<?php

namespace App\Http\Controllers\Customer;

use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\product\AddToCartRequest;
use App\Models\products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(Cart $cart)
    {
        $carts = $cart->getCart();
        $totalPrice = $cart->getTotalPrice();
        return view('pages.customer.cart', compact('carts', 'totalPrice'));
    }

    public function add_to_cart(AddToCartRequest $request, $id){
        $product = products::find($id);
        $cart = new Cart();
        $cart->add($product, $request->quantity);
        return redirect()->route('show_cart');
    }

    public function update_cart(AddToCartRequest $request, Cart $cart, $id){
        $product = products::find($id);
        $cart->update($request->quantity, $product);
        return redirect()->back();
    }

    public function delete_cart(Cart $cart, $id){
        $product = products::find($id);
        $cart->delete($product);
        return redirect()->back();
    }

    public function clear(Cart $cart){
        $cart->clear();
        return redirect()->route('show_cart');
    }
}
