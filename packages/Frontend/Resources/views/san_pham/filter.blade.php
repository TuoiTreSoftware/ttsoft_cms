@if(!empty($products))
  @foreach($products as $key => $product)
    <div class="product col-md-4">
      <div class="iportfolio clearfix">
        <div class="portfolio-image clearfix">
          <a href="{{ $product->getRoute() }}" data-lightbox="gallery-item"><img src="{{ $product->image }}" alt="{{ $product->getTitle() }}" ></a>
          {{-- <div class="product-cart"><a href="#"><i class="icon-shopping-cart"></i></a></div> --}}
          <div class="product-quickview"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Sizes: @foreach($product->getSizeAttribute() as $key => $val) {{$val->title}} @endforeach"><i class="icon-info"></i></a></div>
        </div>
        <div class="portfolio-desc nobottompadding">
          <h3>
            <a href="{{ $product->getRoute() }}">{{ $product->getTitle() }}</a>
          </h3>
          <div class="item-price product-price">
            <span>
              <del class="">{{ $product->getPrice() }} đ</del> 
              <ins  class="price d-none">{{ $product->price_sale }} đ</ins>
            </span>
          </div>
          <div class="item-price " style="float: right;">
            <span>
              <ins>{{ $product->getPriceSale() }} đ</ins>
            </span>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endif