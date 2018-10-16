@extends('layouts.frontend.master')
@section('title','Products')
@section('content')

    <!-- Start Sidebar + Content -->
    <div class='container margin-top-20'>
        <div class="row">
            <div class="col-md-4">

                @include('layouts.frontend.partials.product-sidebar')

            </div>

            <div class="col-md-8">
                <div class="widget">
                    <h3> Searched Products For - <span class="badge badge-info">{{$search}}</span></h3>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-4">
                                <div class="card">
                                    {{-- <img class="card-img-top feature-img" src="{{ asset('images/products/'. 'galaxy.png') }}" alt="Card image" > --}}
                                    @php $i = 1; @endphp

                                    @foreach ($product->images as $image)
                                        @if ($i > 0)
                                            <a href="{{route('product.details', $product->slug)}}">
                                                <img class="card-img-top feature-img" src="{{ asset('images/products/'. $image->image) }}" alt="Card image" >
                                            </a>
                                        @endif
                                        @php $i--; @endphp
                                    @endforeach
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="{{route('product.details', $product->slug)}}">{{ $product->title }}</a>
                                        </h4>
                                        <p class="card-text">Taka - {{ $product->price }}</p>
                                        <a href="#" class="btn btn-outline-warning">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination">
                        {{$products->links()}}
                    </div>
                </div>
                <div class="widget">

                </div>
            </div>


        </div>
    </div>

    <!-- End Sidebar + Content -->
@endsection
