@push('css')
<style type="text/css">
   .swatch-element{
   float: left;
   margin: 0 10px 10px 0;
   }
   input[type="checkbox"], input[type="radio"] {
   display: inline;
   margin: 0;
   padding: 0;
   width: 100%;
   height: 40px;
   position: absolute;
   background: transparent;
   outline: none;
   opacity: 0;
   }
   .swatch label {
   float: left;
   min-width: 30px !important;
   height: 30px !important;
   margin: 0;
   background-color: #fff;
   font-size: 14px;
   font-family: 'Roboto', sans-serif;
   text-align: center;
   line-height: 35px;
   white-space: nowrap;
   text-transform: uppercase;
   padding-left: 5px;
   padding-right: 5px;
   }
   .border-clazz{
   border : solid 1px #1D3571;
   }
   .border-z{
   border: #d7d7d7 1px solid;
   }                          
</style>
<style>
   .white-section {
   padding: 25px 10px 0px 0px;
   /* -webkit-box-shadow: 0px 1px 1px 0px #dfdfdf;
   box-shadow: 0px 1px 1px 0px #dfdfdf;
   border-radius: 3px;*/
   margin-bottom: 10px;
   }
   .white-section label { margin-bottom: 30px; }
   .dark .white-section {
   background-color: #1d3571;
   -webkit-box-shadow: 0px 1px 1px 0px #444;
   box-shadow: 0px 1px 1px 0px #444;
   }
   .color{
   border: 1px solid #1d3571;
   color: #fff;
   }
</style>
<link rel="stylesheet" href="{{ asset('frontend/css/ion.rangeslider.css')}}" type="text/css" />
@endpush
<div class="sidebar nobottommargin clearfix">
   <div class="white-section">
      <h4>Giá</h4>
      <input class="range_03" />
      <input name="price_from" class="price_from" type="hidden" value="" />
      <input name="price_to" class="price_to" type="hidden" value="" />
   </div>
   <div class="swatch-nomal swatch clearfix">
      @foreach(getGroupAttribut() as $key => $val)
      @php 
      $childAttr = \TTSoft\Products\Entities\Attribute::where(['parent_id' => $val->id, 'status' => 1])
      ->orderBy('title','ASC')
      ->get();
      @endphp
      <h4 @if($val->parent_id > 0) class="d-none" @endif" data-key="{{ $key }}">{{ $val->title }} </h4>
      @foreach($childAttr as $key => $v)
      <div class="swatch-element nomals sizeClass border-z filterAttr" style="background: {{ $v->color }}">
         <input id="checkbox-{{ $v->id }}" class="checkbox-style " name="checkbox-{{ $key }}" type="checkbox" value="{{ $v->id }}">
         @if($v->parent_id == 1)
         <label for="checkbox-{{ $v->id }}" class="checkbox-style-3-label" style="background: {{ $v->color  }}"></label>
         @else
         <label for="checkbox-{{ $v->id }}" class="checkbox-style-3-label" >{{ $v->title }}</label>
         @endif
      </div>
      @endforeach
      <div @if($val->parent_id > 0) class="d-none" @endif class="w-100 line" style="margin-top: 16px; margin-bottom: 16px">
   </div>
   @endforeach
   {{-- 
   <div>
      <input id="checkbox-11" class="checkbox-style" name="checkbox-11" type="checkbox">
      <label for="checkbox-11" class="checkbox-style-3-label">Second Choice</label>
   </div>
   <div>
      <input id="checkbox-12" class="checkbox-style" name="checkbox-12" type="checkbox">
      <label for="checkbox-12" class="checkbox-style-3-label">Third Choice</label>
   </div>
   --}}
</div>
<!-- Tin nổi bật -->
<div class="row">
   @if(getProductnoibat(10))
   <div class="col-md-12">
      <div class="kh-inf-2">
         <div class="info-title">
            <h4>{{ trans('frontend::frontend.featuredproducts') }}</h4>
         </div>
         <div class="inf-kh">
            @foreach(getProductnoibat(10) as $key => $relate)
            <div class="spost clearfix" style="margin-top: 0 !important;">
               <div class="entry-image">
                  <a href="{{ $relate->getRoute() }}"><img src="{{ $relate->getImage() }}" alt="Image" style="height: auto;"></a>
               </div>
               <div class="entry-c">
                  <div class="entry-title">
                     <h4><a href="{{ $relate->getRoute() }}">{{ $relate->getTitle() }}</a></h4>
                     <p >
                        @if($relate->getPrice() > $relate->getPriceSale() && $relate->getPriceSale() != null)
                        <del>{{ format_price($relate->getPrice()) }} đ</del> 
                        <ins>{{ format_price($relate->getPriceSale()) }} đ</ins>
                        @else
                        <ins>{{ format_price($relate->getPrice()) }} đ</ins>
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
<script>
   function attr_value(){
    var attrs = [];
    $(".sizeClass .checkbox-style:checked").each(function(e,v){
      attrs.push(v.value);
    });
    return attrs;
   }
   $(".sizeClass").click(function(){
    console.log(attr_value());
    filter();
   });
   
   
   var priceRangefrom = 0,
   priceRangeto = 0,
   $container = null;
   
   jQuery(window).on( 'load', function(){
   
      $container = $('#shop');
   
      $container.isotope({ transitionDuration: '0.65s' });
   
      $('#portfolio-filter a').click(function(){
         $('#portfolio-filter li').removeClass('activeFilter');
         $(this).parent('li').addClass('activeFilter');
         var selector = $(this).attr('data-filter');
         $container.isotope({ filter: selector });
         return false;
      });
   
      $(window).resize(function() {
         $container.isotope('layout');
      });
   
   });
   
  $(".range_03").ionRangeSlider({
     type: "double",
     min: 0,
     max: {{ getPrice()->price ?? 0 }},
     postfix: " đ",
     from: 0,
     to: {{ getPrice()->price ?? 0 }},
     grid: false,
     onStart: function (data) {
        priceRangefrom = data.from;
        priceRangeto = data.to;
        $(".price_from").val(data.from);
        $(".price_to").val(data.to);
     },
     onFinish: function (data) {
        priceRangefrom = data.from;
        priceRangeto = data.to;
        $(".price_from").val(data.from);
        $(".price_to").val(data.to);
        filter();
     }
  });


  function filter(){
    $.ajax({
      url: '{{ route('web.product.get.filter') }}',
      type: 'GET',
      dataType: 'json',
      data: {
        priceFrom : $(".price_from").val(),
        priceTo : $(".price_to").val(),
        array : attr_value()
      },
    })
    .done(function(data) {
      // console.log(1);
      // console.log(data);
      if (data.status == 'TRUE') {
        $("#shop1").fadeIn(500).html(data.html);
        $(".filter").fadeIn(500).html(data.filtercurrent);
      }else{
        $("#shop1").fadeIn(500).html('Không tìm thấy sản phẩm phù hợp');
        $(".filter").fadeIn(500).html('');
      }
    })
    .fail(function() {
      console.log("error");
    });
    
  }
   
   
</script>
@endpush