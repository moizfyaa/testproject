@extends('layout.app')
@section('content')
    

    <!-- Header Section End -->
    
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
                <div class="col-lg-9">
                    <div class="shop__product__option">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix ">
                            <div class="product__item">
                                <a href="{{ route('shop_detail', $product->id) }}"><img src="/uploads/product/{{ $product->image }}" alt=""></a>
                                <div class="product__item__text">
                                    <h6>{{ $product->name }}</h6>
                                    <a href="{{ route('add.to.cart', $product->id) }}" class="add-cart">+ Add To Cart</a>
                                    <h5>${{ $product->price }}</h5>
                                    <div class="product__color__select">
                                        <label for="pc-4">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
           {{-- cut here  --}}
                    </div>
                    {{-- paginattion  --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <!-- Footer Section Begin -->
    @endsection