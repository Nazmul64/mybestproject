<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Shippingmethod;
use App\Models\Whilist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addtowhilistcart(Request $request, $wishlist_id)
    {
        $wishlist = Whilist::find($wishlist_id);
        $userId = Auth::id();
        $guestId = session('guest_id');

        $cartQuery = Cart::where(function ($query) use ($userId, $guestId) {
            $query->where('user_id', $userId)->orWhere('guest_id', $guestId);
        })->where('product_id', $wishlist->product_id);

        if ($cartQuery->exists()) {
            $cartQuery->increment('amount', 1);
        } else {
            Cart::create([
                'user_id' => $userId,
                'guest_id' => $guestId,
                'product_id' => $wishlist->product_id,
                'product_size' => $wishlist->product_size,
                'product_color' => $wishlist->product_color,
                'amount' => 1,
            ]);
        }

        $wishlist->delete();
        return redirect()->back()->with('success', 'পণ্যটি কার্টে যোগ করা হয়েছে সফলভাবে');
    }

    public function addtocart(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $qtyRequested = (int) $request->ec_qtybtn;

        if ($product->stock < $qtyRequested) {
            return response()->json([
                'status' => 'error',
                'message' => '⛔ চাহিদাকৃত পরিমাণ স্টকে নেই!'
            ]);
        }

        $userId = Auth::id();
        $guestId = session('guest_id');

        $cartQuery = Cart::where(function ($query) use ($userId, $guestId) {
            $query->where('user_id', $userId)->orWhere('guest_id', $guestId);
        })->where([
            ['product_id', $product->id],
            ['product_size', $request->product_size],
            ['product_color', $request->product_color],
        ]);

        if ($cartQuery->exists()) {
            $existingAmount = $cartQuery->first()->amount;
            if ($existingAmount + $qtyRequested > $product->stock) {
                return response()->json([
                    'status' => 'error',
                    'message' => '⛔ মোট পরিমাণ স্টকের চেয়ে বেশি হচ্ছে!'
                ]);
            }

            $cartQuery->increment('amount', $qtyRequested);
            return response()->json(['status' => 'success', 'message' => '✅ কার্টে পণ্যের পরিমাণ বাড়ানো হয়েছে।']);
        }

        Cart::create([
            'user_id' => $userId,
            'guest_id' => $guestId,
            'product_id' => $product->id,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'amount' => $qtyRequested,
        ]);

        return response()->json(['status' => 'success', 'message' => '✅ পণ্যটি কার্টে সফলভাবে যোগ করা হয়েছে।']);
    }

    public function removecart(Request $request, $cart_remove)
    {
        $cart = Cart::findOrFail($cart_remove);
        $userId = Auth::id();
        $guestId = session('guest_id');

        if ($cart->user_id == $userId || $cart->guest_id == $guestId) {
            $cart->delete();
            return response()->json(['status' => 'success', 'message' => 'পণ্যটি সফলভাবে কার্ট থেকে সরানো হয়েছে।']);
        }

        return response()->json(['status' => 'error', 'message' => 'কার্ট থেকে পণ্য সরানোর সময় একটি ত্রুটি ঘটেছে।']);
    }

    public function getShippingCharge($id)
    {
        $shipping = Shippingmethod::find($id);

        if (!$shipping) {
            return response()->json(['error' => 'Shipping method not found.'], 404);
        }

        session(['total_shipping_cost' => $shipping->shipping_cost]);

        return response()->json(['charge' => $shipping->shipping_cost]);
    }

    public function cartview(Request $request)
    {
        $carts = allcart();
        $subtotal = 0;

        foreach ($carts as $item) {
            $subtotal += ($item->product->sale_price ?? 0) * $item->amount;
        }

        session(['subtotal' => $subtotal]);

        $discount = 0;
        $coupon_name = $request->coupon_name;

        if ($coupon_name) {
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            if ($coupon && $coupon->limit > 0 && Carbon::parse($coupon->validity)->isFuture()) {
                $discount = ($subtotal * $coupon->discount_percentage) / 100;
                session(['coupon_name' => $coupon_name, 'discount_total' => $discount]);
            } else {
                return back()->with('error', 'অকার্যকর কুপন অথবা মেয়াদ শেষ!');
            }
        }

        session(['discount_total' => session('discount_total', 0)]);
        $delivery_charge = session('total_shipping_cost', 0);
        $total_price = $subtotal + $delivery_charge - session('discount_total', 0);

        session(['total_price' => $total_price]);

        $shippingMethod = Shippingmethod::all();
        return view('frontend.body.pages.cartview', compact('shippingMethod'));
    }

    public function clearshoppingcart($id)
    {
        Cart::where('user_id', $id)->orWhere('guest_id', $id)->delete();
        return redirect()->back()->with('success', 'কার্ট সফলভাবে মুছে ফেলা হয়েছে!');
    }

    public function cartremove($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'আইটেম মুছে ফেলা হয়েছে!');
        }
        return redirect()->back()->with('error', 'কার্টে আইটেম খুঁজে পাওয়া যায়নি।');
    }

    public function cartupdate(Request $request)
    {
        foreach ($request->cartqtybutton as $cart_id => $update_amount) {
            $cart = Cart::find($cart_id);
            if ($cart) {
                $available = available_quantity($cart->product_id);
                if ($update_amount <= $available) {
                    $cart->update(['amount' => $update_amount]);
                } else {
                    return back()->with('error', 'স্টকে পর্যাপ্ত পণ্য নেই।');
                }
            }
        }

        return back()->with('success', 'কার্ট সফলভাবে আপডেট হয়েছে!');
    }

    public function updateCartAjax(Request $request)
    {
        $cart = Cart::find($request->id);
        $cart->amount = $request->quantity;
        $cart->save();

        $carts = allcart();
        $subtotal = 0;
        $item_total = 0;

        foreach ($carts as $item) {
            $total = ($item->product->sale_price ?? 0) * $item->amount;
            $subtotal += $total;
            if ($item->id == $request->id) {
                $item_total = $total;
            }
        }

        session(['subtotal' => $subtotal]);

        $discount = 0;
        if (session('coupon_name')) {
            $coupon = Coupon::where('coupon_name', session('coupon_name'))->first();
            if ($coupon && Carbon::parse($coupon->validity)->isFuture()) {
                $discount = ($subtotal * $coupon->discount_percentage) / 100;
            } else {
                session()->forget(['coupon_name', 'discount_total']);
            }
        }

        session(['discount_total' => $discount]);
        $delivery_charge = session('total_shipping_cost', 0);
        $total_price = $subtotal + $delivery_charge - $discount;
        session(['total_price' => $total_price]);

        return response()->json([
            'item_total' => $item_total,
            'subtotal' => $subtotal,
            'delivery_charge' => $delivery_charge,
            'total' => $total_price
        ]);
    }
}
