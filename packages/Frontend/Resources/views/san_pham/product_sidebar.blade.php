@push('css')
@endpush
<div class="sidebar nobottommargin col_last clearfix">
   <!-- Tin nổi bật -->
   <div class="sidebar-widgets-wrap">
      <div class="widget widget_links clearfix">
         @if(getProductnoibat(10))
         <div class="col-md-12">
            <div class="kh-inf-2">
               <div class="info-title"><h4>Sản phẩm Nổi bật</h4></div>
               <div class="inf-kh">
                  @foreach(getProductnoibat(10) as $key => $relate)
                  <div class="spost clearfix" style="margin-top: 0 !important;">
                     <div class="entry-image">
                        <a href="{{ $relate->getRoute() }}"><img src="{{ $relate->getImage() }}" alt="Image" style="height: auto;"></a>
                     </div>
                     <div class="entry-c">
                        <div class="entry-title">
                           <h4><a href="{{ $relate->getRoute() }}">{{ $relate->getTitle() }}</a></h4>
                           <p class="product-price">
                              @if($relate->getPrice() > $relate->getPriceSale() && $relate->getPriceSale() != null)
                              <del>{{ format_price($relate->getPrice()) }}đ</del> 
                              <ins>{{ format_price($relate->getPriceSale()) }}đ</ins>
                              @else
                              <ins>{{ format_price($relate->getPrice()) }}đ</ins>
                              @endif
                           </p>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>                  
            </div>
         </div>
         @endif
      </div>
   </div>
</div><!-- .sidebar end -->
@push('js')
@endpush