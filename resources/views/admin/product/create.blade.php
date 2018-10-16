@extends('layouts.backend.app')
@section('title','Product')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Vertical Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Product
                            </h2>
                        </div>
                        <div class="body">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" name="title" class="form-control">
                                    <label class="form-label">Product Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="price" name="price" class="form-control">
                                    <label class="form-label">Product Price</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="quantity" name="quantity" class="form-control">
                                    <label class="form-label">Product Quantity</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="image">Featured Image</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="file" class="form-control" name="product_image[]" id="image">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="file" class="form-control" name="product_image[]" id="image">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="file" class="form-control" name="product_image[]" id="image">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="file" class="form-control" name="product_image[]" id="image">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="file" class="form-control" name="product_image[]" id="image">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="file" class="form-control" name="product_image[]" id="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<input type="checkbox" name="status" id="publish" class="filled-in chk-col-pink" value="1">--}}
                                {{--<label for="publish">Publish</label>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Categories and Tags
                            </h2>
                        </div>
                        <div class="body">

                            <div class="form-group form-float">
                                {{--<div class="form-line {{$errors->has('categories') ? 'focused error' : '' }}">--}}
                                    {{--<label for="category">Select Category</label>--}}
                                    {{--<select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>--}}
                                        {{--@foreach($categories as $category)--}}
                                            {{--<option value="{{$category->id}}">{{$category->name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            </div>
                            <div class="form-group form-float">
                                {{--<div class="form-line {{$errors->has('tags') ? 'focused error' : '' }}">--}}
                                    {{--<label for="category">Select Tag</label>--}}
                                    {{--<select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>--}}
                                        {{--@foreach($tags as $tag)--}}
                                            {{--<option value="{{$tag->id}}">{{$tag->name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            </div>

                            <a href="{{route('admin.product.index')}}" class="btn btn-warning m-t-15 waves-effect">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Body
                            </h2>
                        </div>
                        <div class="body">
                            <textarea name="description" id="tinymce"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->
        </form>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <!-- TinyMCE -->
    <script src="{{asset('backend/plugins/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('backend/plugins/tinymce')}}';
        });
    </script>
@endpush
