@extends('frontend::layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('frontend/css/components/ion.rangeslider.css') }}" type="text/css" />
<title>Sản Phẩm - {{ web_config('site_name') }}</title>
@endpush
@section('content')
<section id="page-title">
   <div class="container clearfix">
      <h1>{{ web_config('site_name') }}</h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
         <li class="breadcrumb-item active" aria-current="page"><a href={{ route('web.product.get.getProductList') }}>Sản Phẩm</a></li>
      </ol>
   </div>
</section>
<section id="content">
   <div class="content-wrap">
      <div class="container notopmargin clearfix">
         <div class="postcontent nobottommargin col_last">
            <div class="row">
              <div class="col-md-12">
                <div class="filter"></div>
              </div>
            </div>
            <div id="shop1" class="row">
               @if(!empty($products))
               @foreach($products as $key => $product)
               <div class="product col-md-4">
                  <div class="iportfolio clearfix">
                     <div class="portfolio-image clearfix">
                       <a href="{{ $product->getRoute() }}" data-lightbox="gallery-item"><img src="{{ $product->image }}" alt="{{ $product->getTitle() }}" ></a>
                        {{-- 
                        <div class="product-cart"><a href="#"><i class="icon-shopping-cart"></i></a></div>
                        --}}
                        <div class="product-quickview"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Sizes: @foreach($product->getSizeAttribute() as $key => $val) {{$val->title}} @endforeach"><i class="icon-info"></i></a></div>
                     </div>
                     <div class="portfolio-desc nobottompadding">
                        <h3>
                           <a href="{{ $product->getRoute() }}">{{ $product->getTitle() }}</a>
                        </h3>
                        @if($product->getPrice() > $product->getPriceSale() && $product->getPriceSale() !== null)
                          <div class="item-price product-price">
                            <span>
                              <del class="">{{ $product->getPrice() }} đ</del> 
                            </span>
                          </div>
                          <div class="item-price product-price" style="float: right;">
                            <span>
                              <ins>{{ format_price($product->getPriceSale()) }} đ</ins>
                            </span>
                          </div>
                        @else
                          <div class="item-price product-price" style="float: right;">
                            <span>
                              <ins>{{ format_price($product->getPrice()) }} đ</ins>
                            </span>
                          </div>
                        @endif
                     </div>
                  </div>

               </div>
               @endforeach
               @endif
            </div>
         </div>
         {{--  @include('frontend::san_pham.product_sidebar') --}}
         @include('frontend::san_pham.single_product_sidebar') 
      </div>
   </div>
</section>
@endsection