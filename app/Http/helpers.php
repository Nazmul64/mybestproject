<?php

use App\Models\Product;
use App\Models\Whilist;
use Illuminate\Support\Facades\Auth;

if (!function_exists('whilistcount')) {
    function whilistcount() {
        if (auth()->check()) {
            return \App\Models\Whilist::where('user_id', auth()->id())->count();
        } else {
            if (!session()->has('guest_id')) {
                session()->put('guest_id', uniqid('guest_', true));
            }

            $guest_id = session()->get('guest_id');

            return \App\Models\Whilist::where('guest_id', $guest_id)->count();
        }
    }
}



if (!function_exists('whilistcheck')) {
    function whilistcheck($product_id) {
        if (auth()->check()) {
            return \App\Models\Whilist::where('user_id', auth()->id()) ->where('product_id', $product_id)->exists();
        } else {
            return \App\Models\Whilist::where('guest_id', session()->get('guest_id'))->where('product_id', $product_id)->exists();
        }
    }
}

function allcart() {
    if (auth()->check()) {
        return \App\Models\Cart::with('product')->where('user_id', auth()->id())->get();
    } else {
        $guest_id = session()->get('guest_id');
        $cartItems = \App\Models\Cart::with('product')->where('guest_id', $guest_id)->get();
        if ($cartItems->isEmpty()) {
            session()->forget('guest_id');
        }
        return $cartItems;
    }
}



function allcartcount(){
    if (auth()->check()) {
        return \App\Models\Cart::where('user_id', auth()->id())->count();
    } else {
        return \App\Models\Cart::where('guest_id', session()->get('guest_id'))->count();
    }
}

function available_quantity($product_id)
{
    $product = Product::find($product_id);
    if (!$product) {
        return 0;
    }

    // Check cart amount already added by this user/guest
    $cartQty = \App\Models\Cart::where('product_id', $product_id)
        ->where(function ($query) {
            $query->where('user_id', Auth::id())
                  ->orWhere('guest_id', session()->get('guest_id'));
        })
        ->sum('amount');

    // Final available stock
    return max(0, $product->stock - $cartQty);
}


?>
