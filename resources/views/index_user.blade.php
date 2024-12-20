@extends('layout_user')
@section('content')
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With {{ __( app()->getlocale().'.1') }}</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @foreach ( $products as $product)

            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    @if (!empty($product['pr_sale_price']) && $product['pr_stock']>0)
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>
                    @elseif (empty($product['pr_stock']) || $product['pr_stock']==0)
                    <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Out of Stock</div>
                  @endif
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ $product['pr_image'] }}" alt="{{ $product['pr_name'] }}"/>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $product['pr_name'] }}</h5>
                            <!-- Product price-->
                            @if(!empty($product['pr_price']))
                            <span class="text-muted text-decoration-line-through">{{ 'PKR. '.$product['pr_price'] }}</span>
                            @endif
                            @if (!empty($product['pr_price']) && !empty($product['pr_sale_price']))
                             {{ 'PKR. '.$product['pr_sale_price'] }}
                             @endif
                        </div>
                    </div>

                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('product_info',['product'=>$product['pr_code'] ]) }}">View Product</a></div>
                    </div>
                </div>
              </div>
            @endforeach
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="{{ route('product-list') }}" class="btn btn-outline-dark">View All</a>
            </div>

        </div>
    </div>
</section>
@endsection
@section('store_locator')
@include('store_locator')
@endsection
