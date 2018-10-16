<?php

namespace App\Http\Controllers\Frontend;

use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(2);
        return view('pages.product.index', compact('products'));
    }
    public function details($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if(!is_null($product)){
            return view('pages.product.details', compact('product'));
        }else{
            Toastr::error('Sorry there is no product available :)' ,'Error');
            return redirect()->route('product.index');
        }
    }
}
