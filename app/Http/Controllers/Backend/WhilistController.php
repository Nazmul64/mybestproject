<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\cr;
use App\Models\Product;
use App\Models\Whilist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhilistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
    public function whilistinsert(Request $request, $product_id)
    {
        $product = Product::find($product_id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'প্রোডাক্ট খুঁজে পাওয়া যায়নি।'
            ]);
        }

        $color = $request->input('color');
        $size = $request->input('size');

        if (empty($color) || empty($size)) {
            return response()->json([
                'status' => 'error',
                'message' => 'কালার এবং সাইজ অবশ্যই দিতে হবে।'
            ]);
        }
        $user_id = Auth::check() ? Auth::id() : null;
        $guest_id = !$user_id ? session()->getId() : null;
        $exists = Whilist::where('product_id', $product_id)
            ->where('product_color', $color)
            ->where('product_size', $size)
            ->when($user_id, function ($query) use ($user_id) {
                return $query->where('user_id', $user_id);
            })
            ->when($guest_id, function ($query) use ($guest_id) {
                return $query->where('guest_id', $guest_id);
            })
            ->exists();

        if ($exists) {
            return response()->json([
                'status' => 'warning',
                'message' => 'এই প্রোডাক্টটি ইতোমধ্যেই উইশলিস্টে আছে।'
            ]);
        }
        $wishlist = new Whilist();
        $wishlist->product_id = $product_id;
        $wishlist->product_color = $color;
        $wishlist->product_size = $size;
        $wishlist->user_id = $user_id;
        $wishlist->guest_id = $guest_id;
        $wishlist->save();

        return response()->json([
            'status' => 'success',
            'message' => 'উইশলিস্টে সফলভাবে যোগ করা হয়েছে।'
        ]);
    }




    public function checkwhilist(Request $request, $product_id)
{
    $product = Product::find($product_id);

    if (!$product) {
        return response()->json(['status' => 'error', 'message' => 'প্রোডাক্ট খুঁজে পাওয়া যায়নি।']);
    }

    $type = $request->input('type'); // color or size

    if ($type === 'color') {
        $colors = json_decode($product->color_text, true);
        if (empty($colors)) {
            return response()->json(['status' => 'warning', 'message' => 'কালার পাওয়া যায়নি।']);
        }
        return response()->json(['status' => 'success', 'message' => 'কালার পাওয়া গেছে।', 'colors' => $colors]);
    }

    if ($type === 'size') {
        $sizes = json_decode($product->size_description, true);
        if (empty($sizes)) {
            return response()->json(['status' => 'warning', 'message' => 'সাইজ পাওয়া যায়নি।']);
        }
        return response()->json(['status' => 'success', 'message' => 'সাইজ পাওয়া গেছে।', 'sizes' => $sizes]);
    }

    return response()->json(['status' => 'error', 'message' => 'অকার্যকর রিকোয়েস্ট।']);
}

public function whilistremove($product_id)
{
    $user_id = Auth::check() ? Auth::id() : null;
    $guest_id = !$user_id ? session()->getId() : null;

    Whilist::where('product_id', $product_id)
        ->when($user_id, fn($q) => $q->where('user_id', $user_id))
        ->when($guest_id, fn($q) => $q->where('guest_id', $guest_id))
        ->delete();

    return response()->json(['status' => 'success', 'message' => 'উইশলিস্ট থেকে মুছে ফেলা হয়েছে।']);
}


}
