<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_categories = Category::orderBy('name','desc')->where('parent_id', NULL)->get();
        return view('admin.category.create', compact('main_categories'));
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
            'name'=>'required',
            'image'=> 'nullable|mimes:jpeg,bmp,png,jpg',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
       // product image insert single image
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/categories/'.$img);
            Image::make($image )->save($location);
            $category->image = $img;
            //$category->image->save();
        }

        $category->save();
        Toastr::success('Product Successfully Saved :)' ,'Success');
        return redirect()->route('admin.category.index');
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
        $main_categories = Category::orderBy('name','desc')->where('parent_id', NULL)->get();
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category','main_categories'));
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
            'name'=>'required',
            'image'=> 'nullable|mimes:jpeg,bmp,png,jpg',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        // product image insert single image
        if(count($request->image) > 0) {
            // delete the old image
            if (File::exists('images/categories/'.$category->image)){
                File::delete('images/categories/'.$category->image);
            }
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/categories/'.$img);
            Image::make($image )->save($location);
            $category->image = $img;
            //$category->image->save();
        }

        $category->save();
        Toastr::success('Product Successfully Updated :)' ,'Success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        //if parent category delete with deleted sub category,
        if (!is_null($category)){
            $sub_categories = Category::orderBy('name','desc')->where('parent_id', $category->id)->get();
            foreach ($sub_categories as $sub){
                // delete subcategory image
                if (File::exists('images/categories/'.$sub->image)){
                    File::delete('images/categories/'.$sub->image);
                }
                $sub->delete();
            }
        }
        // delete category image
        if (File::exists('images/categories/'.$category->image)){
            File::delete('images/categories/'.$category->image);
        }
        $category->delete();
        Toastr::success('Product Successfully Deleted :)' ,'Success');
        return redirect()->route('admin.category.index');
    }
}
