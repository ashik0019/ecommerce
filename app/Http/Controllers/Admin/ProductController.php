<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\ProductImage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->slug = str_slug($request->title);
        $product->quantity = $request->quantity;

        $product->category_id = 1;
        $product->brand_id = 1;
        $product->admin_id = 1;
        $product->save();

        //product image insert single image
//        if($request->hasFile('product_image')) {
//            $image = $request->file('product_image');
//            $img = time().'.'.$image->getClientOriginalExtension();
//            $location = public_path('images/products/'.$img);
//            Image::make($image )->save($location);
//
//            $product_image = new ProductImage();
//            $product_image->product_id = $product->id;
//            $product_image->image = $img;
//            $product_image->save();
//        }
        if(count($request->product_image) > 0) {
            foreach ($request->product_image as $image){
                //$image = $request->file('product_image');
                $img = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('images/products/'.$img);
                Image::make($image )->save($location);

                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->image = $img;
                $product_image->save();
            }
        }
        Toastr::success('Product Successfully Saved :)' ,'Success');
        return redirect()->route('admin.product.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->slug = str_slug($request->title);
        $product->quantity = $request->quantity;
        $product->save();
        Toastr::success('Product Successfully Updated :)' ,'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Toastr::success('Product Successfully Deleted :)' ,'Success');
        return redirect()->back();
    }
}
