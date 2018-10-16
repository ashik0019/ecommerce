<?php

namespace App\Http\Controllers\Frontend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {


        $products = Product::orderBy('id', 'desc')->paginate(8);
        return view('pages.index',compact('products'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::orWhere('title', 'LIKE', '%'.$search.'%')
            ->orWhere('description', 'LIKE', '%'.$search.'%')
            ->orWhere('slug', 'LIKE', '%'.$search.'%')
            ->orWhere('price', 'LIKE', '%'.$search.'%')
            ->orWhere('quantity', 'LIKE', '%'.$search.'%')
            ->orderBy('id', 'desc')
            ->paginate(9);
        return view('pages.product.search', compact('products','search' ));
    }
}
