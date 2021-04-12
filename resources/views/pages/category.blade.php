@extends('layouts.app')

@section('title')
    Store Category Page
@endsection

@section('content')
    <div class="page-content page-home" style="margin-top: 100px;">
        <section class="store-trend-categories">
        <div class="container">
            <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>All Categories</h5>
            </div>
            </div>
            <div class="row">
                @forelse ($categories as $category)
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{$loop->iteration * 100}}">
                        <a href="{{route('categories-detail', $category->slug)}}" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{Storage::url($category->photo)}}" alt="" class="w-100">
                            <p class="categories-text">{{$category->name}}</p>
                        </div>
                        </a>
                    </div>
                @empty
                    
                @endforelse
            </div>
        </div>
        </section>
        <section class="store-new-products">
        <div class="container">
            <div class="row">
            <div class="col-12" data-aos="fade-up">
                @if ($category_data)
                    <h5>All Products from {{$category_data->name}}</h5>
                @else
                    <h5>All Products</h5>
                @endif
            </div>
            </div>
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{route('detail', $product->slug)}}" class="component-products d-block">
                        <div class="products-thumbnail">
                            @if ($product->galleries->count())
                                <div class="products-image" style="background-image: url('{{Storage::url($product->galleries->first()->photo)}}');"></div>
                            @endif
                                <div class="products-image" style="background-image: url('https://picsum.photos/id/237/200/300');"></div>
                        </div>
                        <div class="products-text">
                            {{$product->name}}
                        </div>
                        <div class="products-price">
                            ${{$product->price}}
                        </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <p class="text-danger">No Product Found</p>
                    </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    {{$products->links()}}
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection