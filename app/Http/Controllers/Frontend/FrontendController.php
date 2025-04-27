<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shippingmethod;
use App\Models\Slider;
use App\Models\Websetting;
use App\Models\Whilist;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function frontend()
    {
        $product =Product::all();
        $sliders = Slider::all();
        $websetting =Websetting::all();
        $category =Category::all();
        return view('frontend.index',compact('sliders','websetting','product','category'));
    }
    public function productdetails($slug)
    {

        $product = Product::where('product_slug', $slug)->firstOrFail();

        $whilist_status = Whilist::where('product_id', $product->id)->where(function($query) {$query->where('user_id', auth()->id())->orWhere('guest_id', session()->get('guest_id'));})->exists();


        $shipping =Shippingmethod::all();
        $product = Product::where('product_slug', $slug)->firstOrFail();
        return view('frontend.body.pages.productdetails', compact('product','shipping','whilist_status'));
    }

    public function whilist(){
        $whilist = Whilist::where('user_id', auth()->id())->orWhere('guest_id', session()->get('guest_id'))->get();
        return view('frontend.body.pages.whilist',compact('whilist'));
    }
    public function searchproductajax(Request $request)
    {
        $search = $request->get('term');

        $products = Product::where('product_name', 'LIKE', "%{$search}%")->get();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id'    => $product->id,
                'name'  => $product->product_name,
                'slug'  => $product->product_slug,
                'image' => asset('uploads/product/' . $product->photo),
                'price' => $product->regular_price,
            ];
        }

        return response()->json($data);
    }


    public function searchsubmit(Request $request)
    {
        $keyword = $request->name ?? $request->search_product;

        $products = Product::where('product_name', 'LIKE', "%{$keyword}%")->get();

        if ($request->ajax()) {
            if ($products->isEmpty()) {
                return response()->json(['status' => 'error', 'message' => 'কোন পণ্য পাওয়া যায়নি: ' . $keyword]);
            }

            // Blade ভিউ রেন্ডার করে পাঠানো (অথবা HTML return করা)
            $view = view('frontend.body.pages.search_ajax_result', compact('products', 'keyword'))->render();

            return response()->json(['status' => 'success', 'html' => $view]);
        }

        // fallback for normal POST request
        if ($products->isEmpty()) {
            return redirect()->back()->with('error', 'কোন পণ্য পাওয়া যায়নি: ' . $keyword);
        }

        return view('frontend.body.pages.product_search', compact('products', 'keyword'));
    }


}
