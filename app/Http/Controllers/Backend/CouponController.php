<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\cr;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupon =Coupon::all();
       return view('Backend.coupon.index',compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required|string|max:255|unique:coupons,coupon_name',
            'discount_percentage' => 'required|numeric|min:1|max:100',
            'validity' => 'required|date|after_or_equal:today',
            'limit' => 'required|integer|min:1',
        ], [
            'coupon_name.required' => 'অনুগ্রহ করে কুপনের নাম প্রদান করুন।',
            'coupon_name.string' => 'কুপনের নাম অবশ্যই একটি স্ট্রিং হতে হবে।',
            'coupon_name.max' => 'কুপনের নাম সর্বোচ্চ ২৫৫ অক্ষরের হতে পারে।',
            'coupon_name.required' => 'অনুগ্রহ করে কুপনের নাম প্রদান করুন।',
            'coupon_name.unique' => 'এই কুপনের নামটি ইতিমধ্যেই বিদ্যমান রয়েছে। অন্য একটি নাম ব্যবহার করুন।',
    
            'discount_percentage.required' => 'ডিসকাউন্ট শতাংশ অবশ্যই দিতে হবে।',
            'discount_percentage.numeric' => 'ডিসকাউন্ট শতাংশ একটি সংখ্যায় হতে হবে।',
            'discount_percentage.min' => 'ডিসকাউন্ট শতাংশ ন্যূনতম ১ হতে হবে।',
            'discount_percentage.max' => 'ডিসকাউন্ট শতাংশ সর্বোচ্চ ১০০ হতে পারে।',
    
            'validity.required' => 'কুপনের বৈধতার তারিখ দিতে হবে।',
            'validity.date' => 'বৈধতার তারিখ সঠিক ফরম্যাটে দিতে হবে।',
            'validity.after_or_equal' => 'বৈধতার তারিখ আজকের সমান বা পরবর্তী হতে হবে।',
    
            'limit.required' => 'কুপনের ব্যবহার সীমা দিতে হবে।',
            'limit.integer' => 'সীমা অবশ্যই একটি পূর্ণসংখ্যা হতে হবে।',
            'limit.min' => 'সীমা কমপক্ষে ১ হতে হবে।',
        ]);
        Coupon::create($request->except('_token'));
        return redirect()->route('coupon.index')->with('success', 'নতুন কুপন সফলভাবে যোগ করা হয়েছে!');
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
        $coupon =Coupon::find($id);
       return view('Backend.coupon.edit',compact('coupon')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
    
        $validated = $request->validate([
            'coupon_name' => 'required|string|max:255|unique:coupons,coupon_name,' . $id,
            'discount_percentage' => 'required|numeric|min:1|max:100',
            'validity' => 'required|date|after_or_equal:today',
            'limit' => 'required|integer|min:1',
        ], [
            'coupon_name.required' => 'অনুগ্রহ করে কুপনের নাম প্রদান করুন।',
            'coupon_name.string' => 'কুপনের নাম অবশ্যই একটি স্ট্রিং হতে হবে।',
            'coupon_name.max' => 'কুপনের নাম সর্বোচ্চ ২৫৫ অক্ষরের হতে পারে।',
            'coupon_name.unique' => 'এই কুপনের নামটি ইতিমধ্যেই বিদ্যমান রয়েছে। অন্য একটি নাম ব্যবহার করুন।',
    
            'discount_percentage.required' => 'ডিসকাউন্ট শতাংশ অবশ্যই দিতে হবে।',
            'discount_percentage.numeric' => 'ডিসকাউন্ট শতাংশ একটি সংখ্যায় হতে হবে।',
            'discount_percentage.min' => 'ডিসকাউন্ট শতাংশ ন্যূনতম ১ হতে হবে।',
            'discount_percentage.max' => 'ডিসকাউন্ট শতাংশ সর্বোচ্চ ১০০ হতে পারে।',
    
            'validity.required' => 'কুপনের বৈধতার তারিখ দিতে হবে।',
            'validity.date' => 'বৈধতার তারিখ সঠিক ফরম্যাটে দিতে হবে।',
            'validity.after_or_equal' => 'বৈধতার তারিখ আজকের সমান বা পরবর্তী হতে হবে।',
    
            'limit.required' => 'কুপনের ব্যবহার সীমা দিতে হবে।',
            'limit.integer' => 'সীমা অবশ্যই একটি পূর্ণসংখ্যা হতে হবে।',
            'limit.min' => 'সীমা কমপক্ষে ১ হতে হবে।',
        ]);
    
        $coupon->update($validated);
    
        return redirect()->route('coupon.index')->with('success', 'কুপন সফলভাবে আপডেট করা হয়েছে!');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('coupon.index')->with('success', 'কুপন সফলভাবে ডিলিট  করা হয়েছে!');
    }
}
