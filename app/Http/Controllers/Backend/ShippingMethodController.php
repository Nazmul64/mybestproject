<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\cr;
use App\Models\Shippingmethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipping =Shippingmethod::all();
        return view('Backend.Shipping.index',compact('shipping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'shipping_cost' => 'required|numeric',
            'is_active' => 'required',
        ], [
            'type.required' => 'অনুগ্রহ করে "ঢাকার ভিতরে" অথবা "ঢাকার বাইরে" টাইপটি দিন।',
            'shipping_cost.required' => 'অনুগ্রহ করে শিপিং খরচ নির্ধারণ করুন ("ঢাকার ভিতরে"/"বাইরে")।',
            'shipping_cost.numeric' => 'শিপিং খরচ অবশ্যই একটি সংখ্যা হতে হবে।',
            'is_active.required' => 'স্ট্যাটাস ফিল্ডটি নির্বাচন করুন।'
        ]);

        Shippingmethod::create([
            'type'          => $request->type,
            'shipping_cost' => $request->shipping_cost,
            'is_active'     => $request->is_active ? 1 : 0,
        ]);

        return back()->with('success', 'Shipping Method সফলভাবে যুক্ত করা হয়েছে!');
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
    public function edit($id)
    {
        $shipping =Shippingmethod::find($id);
        return view('Backend.Shipping.edit',compact('shipping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'shipping_cost' => 'required|numeric',
            'is_active' => 'required',
        ], [
            'type.required' => 'অনুগ্রহ করে "ঢাকার ভিতরে" অথবা "ঢাকার বাইরে" টাইপটি দিন।',
            'shipping_cost.required' => 'অনুগ্রহ করে শিপিং খরচ নির্ধারণ করুন।',
            'shipping_cost.numeric' => 'শিপিং খরচ অবশ্যই একটি সংখ্যা হতে হবে।',
            'is_active.required' => 'স্ট্যাটাস নির্বাচন করুন।'
        ]);

        $shipping = Shippingmethod::findOrFail($id);

        $shipping->update([
            'type'          => $request->type,
            'shipping_cost' => $request->shipping_cost,
            'is_active'     => $request->is_active ? 1 : 0,
        ]);

        return redirect()->route('shipping.index')->with('success', 'Shipping Method সফলভাবে আপডেট করা হয়েছে!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shipping = Shippingmethod::findOrFail($id);
        $shipping->delete();
        return redirect()->route('shipping.index')->with('success', 'শিপিং পদ্ধতি সফলভাবে মুছে ফেলা হয়েছে!');
    }


}
