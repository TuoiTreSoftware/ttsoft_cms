@extends('frontend::layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('frontend/css/components/ion.rangeslider.css') }}" type="text/css" />
<!-- meta -->
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
<!-- end meta -->
@endpush

@section('content')
<section id="page-title">
 <div class="container clearfix">
  <h1>{{ $product->getTitle() }}</h1>
  <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ trans('frontend::frontend.home') }}</a></li>
   <li class="breadcrumb-item active" aria-current="page"><a href="{{ $product->category->getRoute() }}">{{ $product->category->getTitle() }}</a></li>
   <li class="breadcrumb-item active" aria-current="page"><a href="{{ $product->getRoute() }}">{{ $product->getTitle() }}</a></li>
 </ol>
</div>
</section>
<!-- #page-title end -->
<section id="content">
 <div class="content-wrap">
  <div class="container notopmargin clearfix">
   <!-- Sidebar -->
   {{-- @include('frontend::san_pham.single_product_sidebar') --}}

   <!-- Post Content -->
   <div class="postcontent nomargin">
    <!-- Shop -->
    <div class="single-product">
     <div class="product">
      <div class="col_half">
       <!-- Product Single - Gallery -->
       <div class="product-image">
        <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
         <div class="flexslider">
          <div class="slider-wrap" data-lightbox="gallery">
           @foreach($product->all_image as $key => $c)
           <div class="slide" data-thumb="{{ $c }}">
             <a href="{{ $c }}" title="{{ $product->getTitle() }}" data-lightbox="gallery-item">
              <img src="{{ $c }}" alt="{{ $product->getTitle() }}">
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    {{ $product->get_sale_off_lable() }}
  </div>
  <!-- Product Single - Gallery End -->
</div>
<div class="col_half col_last product-desc">
 <div class="product-title"><h4>{{ $product->getTitle() }}</h4></div>
 <!-- Product Single - Price -->
 <div class="product-price attr-price">
  @if($product->getPrice() > $product->getPriceSale() && $product->getPriceSale() != null)
  <del>{{ format_price($product->getPrice()) }} đ</del> 
  <ins>{{ format_price($product->getPriceSale()) }} đ</ins>
  @else
  <ins>{{ format_price($product->getPrice()) }} đ</ins>
  @endif
</div>
<div class="clear"></div>
<div class="line"></div>
<!-- Product Single - Quantity & Cart Button -->
<form class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data'>
  <div class="swatch-nomal swatch clearfix">
   <div class="header">{{ trans('frontend::frontend.material') }}:</div>
   <div class=" border-clazz  border-z  swatch-element nomals sizeClass">
    <input class="product_tag" type="radio" name="product_tag" checked="">
    <label for="swatch">{{ $product->product_tag }}</label>
  </div>
</div>

@if(count($childAttributeColor) > 0)
<div class="swatch-nomal swatch clearfix">
 <div class="header">{{ trans('frontend::frontend.color') }}:</div>
 @foreach($childAttributeColor as $k => $color)
 <div data-value="{{ $color->slug }}" data-id="{{ $color->id }}" class="@if($loop->first) border-clazz @else border-z @endif swatch-element nomals colorClass">
  <input class="swatch-color" id="swatch-{{ $color->slug }}" type="radio" name="color" data-value="{{ $color->slug }}" data-id="{{ $color->id }}" value="{{ $color->id }}" @if($k === 0) checked="" @endif>
  <label for="swatch" style="background: {{ $color->color }}">{{-- {{ $color->title }} --}}</label>
</div>
@endforeach
</div>
@endif
@if(count($childAttributeSize) > 0)
<div class="swatch-nomal swatch clearfix">
 <div class="header">{{ trans('frontend::frontend.size') }}:</div>
 @foreach($childAttributeSize as $k => $size)
 <div data-value="{{ $size->slug }}" data-id="{{ $size->id }}" class="@if($loop->first) border-clazz @else border-z @endif swatch-element nomals sizeClass">
  <input class="swatch-size" id="swatch-{{ $size->slug }}" type="radio" name="size" data-value="{{ $size->slug }}" data-id="{{ $size->id }}" value="{{ $size->id }}" @if($k === 0) checked="" @endif>
  <label for="swatch">{{ $size->title }}</label>
</div>
@endforeach
</div>
@endif
<div class="quantity clearfix">
 <input type="button" value="-" class="minus" onclick="down_price()">
 <input type="text" step="1" min="1"  name="quantity" value="1" title="Qty" class="qty" size="4" />
 <input type="button" value="+" class="plus" onclick="up_price()">
</div>
<button type="button" class="add-to-cart button nomargin" data-toggle="modal" data-target=".addtocart">{{ trans('frontend::frontend.addcart') }}</button>

</form>
<!-- Product Single - Quantity & Cart Button End -->
<div class="clear"></div>
<div class="line"></div>
<!-- Product Single - Short Description -->
{{-- <p>{{ $product->getDesciption() }}</p> --}}
<!-- Product Single - Meta -->
<div class="card product-meta">
  <div class="card-body">
   <span itemprop="productID" class="sku_wrapper">SKU: <span class="sku">{{ $product->sku }}</span></span>
   <span class="posted_in">{{ trans('frontend::frontend.category') }}: 
    <a href="{{ $product->category->getRoute() }}" rel="tag">
      {{ getCategoryLang($product->product_category_id) }}
    </a>.</span>
    @if($product->productTags()->count() > 0)
    <span class="tagged_as">{{ trans('frontend::frontend.keywords') }}Từ khóa: 
     @foreach($product->productTags as $tag)
     <a href="/{{ $tag->slug }}" rel="tag">{{ $tag->title }}</a>,
     @endforeach
   </span>
   @endif
 </div>
</div>
<!-- Product Single - Share -->
<div class="si-share noborder clearfix" style="margin-top: 15px;">
  <span>{{ trans('frontend::frontend.share') }}:</span>
  <div>
   @push('css')
   <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
   @endpush
   <span class='st_facebook_large' displayText='Facebook'></span>
   <span class='st_googleplus_large' displayText='Poogleplus'></span>
   <span class='st_twitter_large' displayText='Tweet'></span>
   <span class='st_linkedin_large' displayText='LinkedIn'></span>
   <span class='st_pinterest_large' displayText='Pinterest'></span>
   <span class='st_email_large' displayText='Email'></span>
 </div>
</div>
<!-- Product Single - Share End -->
</div>
<div class="col_full nobottommargin">
 <div class="tabs clearfix nobottommargin" id="tab-1">
  <ul class="tab-nav clearfix">
   <li><a href="#tabs-1"><i class="icon-align-justify2"></i><span class="d-none d-md-block"> {{ trans('frontend::frontend.description') }}</span></a></li>
 </ul>
 <div class="tab-container topmargin-sm">
   <div class="tab-content clearfix" id="tabs-1">
    {!! $product->getContent() !!}
  </div>
  <div class="tab-content clearfix" id="tabs-2">
    <table class="table table-striped table-bordered">
     <tbody>
      {{-- Thông số --}}
    </tbody>
  </table>
</div>
</div>
</div>
<div class="line"></div>
<div class="col_one_third nobottommargin">
  <a href="#" title="Brand Logo" class="d-none d-md-block"><img class="image_fade" src="{{ asset(web_config('logo')) }}" alt="{{ web_config('site_name') }}"></a>
</div>
<div class="col_two_third col_last nobottommargin">
  <div class="col_half">
   <div class="feature-box fbox-plain fbox-dark fbox-small">
    <div class="fbox-icon">
     <i class="icon-thumbs-up2"></i>
   </div>
   <h3>100% {{ trans('frontend::frontend.real') }}</h3>
   <p class="notopmargin">{{ trans('frontend::frontend.realcontent') }}Chúng tôi cam kết 100% chính hãng sản xuất bởi Viken.</p>
 </div>
</div>
<div class="col_half col_last">
 <div class="feature-box fbox-plain fbox-dark fbox-small">
  <div class="fbox-icon">
   <i class="icon-credit-cards"></i>
 </div>
 <h3>{{ trans('frontend::frontend.payment') }}</h3>
 <p class="notopmargin">{{ trans('frontend::frontend.paymentcontent') }}</p>
</div>
</div>
<div class="col_half nobottommargin">
 <div class="feature-box fbox-plain fbox-dark fbox-small">
  <div class="fbox-icon">
   <i class="icon-truck2"></i>
 </div>
 <h3>{{ trans('frontend::frontend.shipping') }}</h3>
 <p class="notopmargin">{{ trans('frontend::frontend.shippinglocal') }}</p>
</div>
</div>
<div class="col_half col_last nobottommargin">
 <div class="feature-box fbox-plain fbox-dark fbox-small">
  <div class="fbox-icon">
   <i class="icon-undo"></i>
 </div>
 <h3>{{ trans('frontend::frontend.quality') }}</h3>
 <p class="notopmargin">{{ trans('frontend::frontend.qualitycontent') }}</p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="clear"></div>
<div class="line"></div>
@if($productRelates)
<!-- Sản phẩm cùng chuyên mục -->
<div class="col_full nobottommargin">
 <h4>{{ trans('frontend::frontend.samecategory') }}</h4>
 <div id="oc-product" class="topmargin-sm owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-xl="4">
  @foreach($productRelates as $key => $relate)
  <div class="oc-item">
   <div class="product iproduct clearfix">
    <div class="product-image">
     <a href="{{ $relate->getRoute() }}"><img src="{{ $relate->getImage() }}" alt="{{ $relate->getTitle() }}"></a>
     {{ $relate->get_sale_off_lable() }}
   </div>
   <div class="product-desc center">
     <div class="product-title">
      <h3 style="font-size: 16px;"><a href="{{ $relate->getRoute() }}">{{ $relate->getTitle() }}</a></h3>
    </div>
    <div class="product-price">
      @if($relate->getPrice() > $relate->getPriceSale() && $relate->getPriceSale() != null)
      <del>{{ format_price($relate->getPrice()) }}đ</del> 
      <ins>{{ format_price($relate->getPriceSale()) }}đ</ins>
      @else
      <ins>{{ format_price($relate->getPrice()) }}đ</ins>
      @endif
    </div>
  </div>
</div>
</div>
@endforeach
</div>
</div>
@endif
<!-- End Sản phẩm cùng chuyên mục -->
@if($productNewLatest)
<!-- Sản Phẩm mới nhất -->
<div class="col_full nobottommargin">
 <h4>{{ trans('frontend::frontend.latestproduct') }}</h4>
 <div id="oc-product" class="topmargin-sm owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-xl="4">
  @foreach($productNewLatest as $key => $latest)
  <div class="oc-item">
   <div class="product iproduct clearfix">
    <div class="product-image">
     <a href="{{ $latest->getRoute() }}"><img src="{{ $latest->getImage() }}" alt="{{ $latest->getTitle() }}"></a>
     {{ $latest->get_sale_off_lable() }}
   </div>
   <div class="product-desc center">
     <div class="product-title">
      <h3 style="font-size: 16px;"><a href="{{ $latest->getRoute() }}">{{ $latest->getTitle() }}</a></h3>
    </div>
    <div class="product-price">
      @if($latest->getPrice() > $latest->getPriceSale() && $latest->getPriceSale() != null)
      <del>{{ format_price($latest->getPrice()) }}đ</del> 
      <ins>{{ format_price($latest->getPriceSale()) }}đ</ins>
      @else
      <ins>{{ format_price($latest->getPrice()) }}đ</ins>
      @endif
    </div>
  </div>
</div>
</div>
@endforeach
</div>
</div>
<!-- End Sản Phẩm mới nhất -->
@endif
</div>
<!-- .postcontent end -->
<!-- Sidebar -->
@include('frontend::san_pham.product_sidebar')
</div>
</div>

</section>
<!-- #content end -->
@endsection

@push('js')
<script type="text/javascript">
 jQuery(document).ready(function($) {
  function formatPrice(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
  }
  $("body").on('click','.swatch-size',function(){
    var size_id = $(this).val();
    var color_id = $('.swatch-color:checked').val();
    $.ajax({
      url: '{{ route('web.product.get.getPriceAttr') }}',
      type: 'POST',
      dataType: 'json',
      data: {
        size_id: size_id,
        color_id: color_id,
        _token : '{{ csrf_token() }}',
        product_id : '{{ $product->getId() }}',
      },
    })
    .done(function(data) {
      console.log(data);
      if (data.attribute_price > data.attribute_price_sale && data.attribute_price_sale !== null ) {
        $(".attr-price del").show().html(formatPrice(data.attribute_price)+' đ');
        $(".attr-price ins").html(formatPrice(data.attribute_price_sale)+' đ');
      } else {
        $(".attr-price ins").html(formatPrice(data.attribute_price)+' đ');
        $(".attr-price del").hide();
      }
    })
    .fail(function(data) {
      console.log(data);
    });

  });
});

 $(".sizeClass").click(function(){
  $(this).children('input').attr("checked", "checked");
  $(".sizeClass").removeClass('border-clazz');
  $(".sizeClass").addClass('border-z');

  $(this).removeClass('border-z');
  $(this).addClass('border-clazz');
});

 $(".colorClass").click(function(){
  $(this).children('input').attr("checked", "checked");
  $(".colorClass").removeClass('border-clazz');
  $(".colorClass").addClass('border-z');

  $(this).removeClass('border-z');
  $(this).addClass('border-clazz');
  $(this).children('input').attr("checked", "checked");
});

 $("body").on('click', '.add-to-cart', function() {
  var productId = {{ $product->getId() }};
  var quantity = $(".qty").val();
  var size = $('.swatch-size:checked').val();
  var color = $('.swatch-color:checked').val();
  var objects = {
    id: productId ,
    quantity : quantity ,
    _token : '{{ csrf_token() }}',
    color : color,
    size : size,
  };
  $.ajax({
    url: '{{ route('web.account.post.addToCart') }}',
    type: 'POST',
    dataType: 'json',
    data: objects,
  })
  .done(function(data) {

    $(".quantity-count").text(data.sl);
    $(".render-html").html(data.html);
    $(".addtocart").modal('show');
  })
  .fail(function(data) {
    console.log(data);
  });
});
 function up_price(){
  var qtypro = $(".qty").val();
  qtypro = parseInt(qtypro);
  if( !isNaN( qtypro )) {
    $(".qty").val(qtypro + 1);
  }
  return false;
}

function down_price(){
  var qtypro = $(".qty").val(); 
  qtypro = parseInt(qtypro);
  if( !isNaN( qtypro ) && qtypro > 1 ){
    $(".qty").val(qtypro - 1);
  }
  return false;
}
</script>
@endpush
