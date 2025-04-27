<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Cart;
use App\Models\Billing_detail;
use App\Models\Coupon;
use App\Models\Incompleate_order;
use App\Models\Order_detail;
use App\Models\Order_summery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{

    public function checkout(Request $request)
    {

        $sessionData = session()->all();

        $shipping_id = $request->shipping_id;

        if (!$shipping_id) {
            return response()->json([
                'status' => 'error',
                'message' => '⚠️ অনুগ্রহ করে আপনার এলাকা সিলেক্ট করুন।'
            ]);
        }

        // সেশন থেকে ডেটা ইনসার্ট করার কোড
      $oder_summery= Order_summery::insertGetId([
            'shipping_id'      => $shipping_id,
            'coupon_name'      => $sessionData['coupon_name'] ?? null,
            'sub_total'        => $sessionData['subtotal'] ?? 0,
            'discount_total'   => $sessionData['discount_total'] ?? 0,
            'delivery_charge'  => $sessionData['selected_shipping_charge'] ?? 0,
            'total'            => $sessionData['total_price'] ?? 0,
            'user_id'          => Auth::check() ? Auth::id() : null,
            'guest_id'         => $sessionData['guest_id'] ?? null,
            'product_size'     => $sessionData['product_size'] ?? null,
            'product_color'    => $sessionData['product_color'] ?? null,
        ]);
         Billing_detail::insert([
            'order_summery_id' => $oder_summery,
            'customer_name' =>$request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_phone'  => $request->customer_phone,
            'customer_note'   => $request->customer_note,
            'order_date'      => now(),
            'user_id'         => Auth::check() ? Auth::id() : null,
            'guest_id'        => $sessionData['guest_id'] ?? null,
         ]);
      foreach(allcart() as $carts ){
          Order_detail::insert([
              'order_summery_id' => $oder_summery,
              'product_id'       => $carts->product_id,
              'product_size'     => $carts->product_size,
              'product_color'    => $carts->product_color,
              'amount'           => $carts->amount,
              'created_at'     => now(),
              'updated_at'     => now(),
          ]);
          // product table deduction
          Product::find($carts->product_id)->decrement('stock', $carts->amount);

          $guestId = session('guest_id'); //  Session::get('guest_id');

          Cart::where(function($query) use ($guestId) {
              if (Auth::check()) {
                  $query->where('user_id', Auth::id());
              }
              if ($guestId) {
                  $query->orWhere('guest_id', $guestId);
              }
          })->delete();

          if(session()->has('coupon_name')){
             Coupon::where('coupon_name', session('coupon_name'))->decrement('limit', 1);
          }

          return redirect()
          ->route('checkoutconfirm')
          ->with('success', '✅ অর্ডার সফলভাবে সম্পন্ন হয়েছে।');


      }
    }
public function checkoutconfirm(){
    return view('frontend.body.pages.confirm');
}

// In your CheckoutController
public function autosaveCheckout(Request $request)
{
    // Guest ID না থাকলে জেনারেট করুন
    if (!session()->has('guest_id')) {
        session(['guest_id' => (string) \Str::uuid()]);
    }

    // ইনপুট ভ্যালিডেশন
    $validated = $request->validate([
        'customer_name'     => 'required|string|max:255',
        'customer_phone'    => 'required|string|max:20',
        'customer_address'  => 'required|string|max:500',
        'shipping_id'       => 'required|integer',
        'customer_note'     => 'nullable|string|max:1000',
    ]);

    // Session এ ইনপুট ডাটা সংরক্ষণ
    session([
        'customer_name'     => $validated['customer_name'],
        'customer_phone'    => $validated['customer_phone'],
        'customer_address'  => $validated['customer_address'],
        'shipping_id'       => $validated['shipping_id'],
        'customer_note'     => $validated['customer_note'] ?? null,
    ]);

    // Session থেকে প্রয়োজনীয় ভ্যালু সংগ্রহ
    $cartTotal                = session('cart_total', 0);
    $discount                 = session('discount_total', session('coupon_discount', 0));
    $subtotal                 = session('subtotal', round($cartTotal) - $discount);
    $total_shipping_cost      = session('total_shipping_cost', 0);
    $selected_shipping_charge = session('selected_shipping_charge', 0);
    $selected_area            = session('selected_area', null);

    // shipping_charge এর মান আপডেট করুন
    // Fix: Make sure that shipping_charge is correctly updated based on area selection
    $shipping_charge = $selected_area ? $selected_shipping_charge : $total_shipping_cost;

    // সর্বমোট মূল্য হিসাব
    $final_total = round($cartTotal + $shipping_charge - $discount);

    // shipping_id চেক
    $shipping_id = $request->shipping_id;
    if (!$shipping_id) {
        return response()->json([
            'status' => 'error',
            'message' => '⚠️ অনুগ্রহ করে আপনার এলাকা সিলেক্ট করুন।'
        ]);
    }

    // Guest ID বা User ID চেক করুন
    $guestId = session('guest_id');
    $userId = auth()->check() ? auth()->id() : null;

    // Incompleate_order টেবিলে আপডেট বা তৈরি
    $existingOrder = Incompleate_order::where('guest_id', $guestId)->orWhere('user_id', $userId)->first();

    if ($existingOrder) {
        // ডেটা ইতিমধ্যে আছে, শুধু আপডেট করুন
        $existingOrder->update([
            'customer_name'     => $validated['customer_name'],
            'customer_phone'    => $validated['customer_phone'],
            'customer_address'  => $validated['customer_address'],
            'shipping_id'       => $shipping_id,
            'note'              => $validated['customer_note'] ?? null,
            'sub_total'         => $subtotal,  // Ensure it's stored correctly
            'discount_total'    => $discount,  // Ensure it's stored correctly
            'delivery_charge'   => $shipping_charge, // Correct the charge here
            'coupon_name'       => session('coupon_name', null),
            'total_price'       => $final_total,  // Ensure it's correct here
            'product_size'      => session('product_size', null),
            'product_color'     => session('product_color', null),
            'updated_at'        => now(),
        ]);
    } else {
        // নতুন রেকর্ড তৈরি করুন
        Incompleate_order::create([
            'customer_name'     => $validated['customer_name'],
            'customer_phone'    => $validated['customer_phone'],
            'customer_address'  => $validated['customer_address'],
            'shipping_id'       => $shipping_id,
            'note'              => $validated['customer_note'] ?? null,
            'sub_total'         => $subtotal,
            'discount_total'    => $discount,
            'delivery_charge'   => $shipping_charge, // Correct the charge here
            'total_shipping_cost'=> $total_shipping_cost,
            'coupon_discount'   => session('coupon_discount', 0),
            'coupon_name'       => session('coupon_name', null),
            'total_price'       => $final_total,  // Correct the price calculation here
            'product_size'      => session('product_size', null),
            'product_color'     => session('product_color', null),
            'user_id'           => $userId,
            'guest_id'          => $guestId,
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
    }

    return response()->json(['status' => 'success']);
}






}





