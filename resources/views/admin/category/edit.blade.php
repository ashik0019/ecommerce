@extends('layouts.backend.app')
@section('title','Category')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Category
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('admin.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" name="name" class="form-control" value="{{$category->name}}">
                                    <label class="form-label">Category Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea cols="80" rows="8" id="name" name="description" class="form-control">{{$category->description}}</textarea>
                                    <label class="form-label">Category Description</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="category">Parent Category</label>
                                    <select name="parent_id" id="category" class="form-control show-tick" data-live-search="true">
                                        @foreach($main_categories as $cat)
                                            <option value="{{$cat->id}}" {{$cat->id == $category->parent_id ? 'selected' : ''}}>{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">Category Image</label>
                                <div class="form-line">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <div class="">
                                <img class="img img-thumbnail img-responsive" src="{{asset('images/categories/'.$category->image)}}"  width="100" height="50">
                            </div>
                            <a href="{{route('admin.category.index')}}" class="btn btn-warning m-t-15 waves-effect">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
@endpush
