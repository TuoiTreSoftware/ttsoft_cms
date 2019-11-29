@extends('frontend::layouts.master')
@section('content')
<div class="container col1-layout" id="content">
   <div class="before-main"></div>
   <div class="row">
      <div class="col-lg-12 col-main">
         <div class="before-content"></div>
         <div class="cart">
            <div class="row cart-content">
               @if(count($cart) > 0)
               <div class="col-lg-9">
                  <div class="page-title title-buttons">
                     <h2>Giỏ hàng</h2>
                  </div>
                  <form action="#" method="post">
                     <table id="shopping-cart-table" class="table cart-table table-striped table-bordered">
                        <thead></thead>
                           <tbody>
                              @foreach($cart as $c)
                                 <tr id="product-{{ $c->rowId }}">
                                    <td class="a-center">
                                       <a href="{{ $c->options->url }}" title="{{ $c->name }}" class="product-image">
                                          <img src="{{ $c->options->image }}" width="75" height="75" alt="{{ $c->name }}"></a>
                                    </td>
                                    <td class="text">
                                       <p class="product-name"> 
                                          <a href="{{ $c->options->url }}">{{ $c->name }}</a>
                                       </p>
                                    </td>
                                    <td class="a-right"> <span class="cart-price"> <span class="price">{{ ($c->price) }}</span> </span></td>
                                    <td class="a-center ">
                                       <input class="cart-update" data-rowId="{{ $c->rowId }}" type="number" name="qty" min="1" max="10" value="{{ $c->qty }}" style="width: 60px; text-align: center; padding: 3px;">
                                    </td>
                                    <td class="a-right"> <span class="cart-price"> <span class="price price-change-update" id="change-{{ $c->rowId }}">{{ ($c->price * $c->qty) }}</span> </span></td>
                                    <td class="a-center right"> 
                                       <a href="javascript:void(0)" title="Xóa sản phẩm" class="btn-remove" data-rowId="{{ $c->rowId }}"> <i class="glyphicon glyphicon-remove"></i> </a>
                                    </td>
                                 </tr>
                              @endforeach
                              @push('js')
                              <script type="text/javascript">

                                 $("body").on("change",".cart-update",function(event){
                                    var rowId = $(this).attr('data-rowId');
                                    var qty = $(this).val();
                                    $.ajax({
                                       url: '{{ route('web.account.post.updateCart') }}',
                                       type: 'POST',
                                       dataType: 'json',
                                       data: {rowId: rowId ,_token : '{{ csrf_token() }}',qty : qty },
                                    })
                                    .done(function(data) {
                                       $(".quantity-count").text(data.sl);
                                       $("#change-"+rowId).html(data.price_new);
                                       $(".priceCart").html(data.total);
                                    })
                                    .fail(function(data) {
                                     console.log(data);
                                    });
                                 });


                                 $("body").on("click",".btn-remove",function(event){
                                    var confirmRemove = confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?');
                                    if (!confirmRemove) {
                                       return confirmRemove;
                                    }
                                    var rowId = $(this).attr('data-rowId');
                                    $.ajax({
                                       url: '{{ route('web.cart.post.removeItem') }}',
                                       type: 'POST',
                                       dataType: 'json',
                                       data: {rowId: rowId ,_token : '{{ csrf_token() }}' },
                                    })
                                    .done(function(data) {
                                       var htmlClear = '<div class="col-lg-12"><p>Chưa có sản phẩm trông giỏ hàng <a href="{{ url('san-pham-khuyen-mai.html') }}">Click</a> ở đây để mua hàng.</p></div>';
                                       if (data.sl == 0) {
                                          $(".cart-content").html(htmlClear);
                                       }
                                       $(".quantity-count").html(data.sl);
                                       $(".priceCart").html(data.total);
                                       $("#product-" + rowId).fadeOut(function(){
                                          $(this).remove();
                                       });
                                    })
                                    .fail(function(data) {
                                     console.log(data);
                                    });
                                 });
                              </script>
                              @endpush
                        </tbody>
                     </table>
                  </form>
               </div>
               <div class="col-lg-3">
                  <table id="shopping-cart-totals-table" class="table">
                     <colgroup>
                        <col>
                        <col width="1">
                     </colgroup>
                     <tfoot>
                        <tr>
                           <td style="" class="a-right" colspan="1"> <strong>Tổng cộng</strong></td>
                           <td style="" class="a-right"> <strong><span class="price priceCart">{{ (Cart::total()) }}</span></strong></td>
                        </tr>
                     </tfoot>
                     <tbody>
                        <tr>
                           <td style="" class="a-right" colspan="1"> Tổng</td>
                           <td style="" class="a-right"> <span class="price priceCart">{{ (Cart::total()) }}</span></td>
                        </tr>
                     </tbody>
                  </table>
                  <ul class="checkout-types a-right">
                     <li> <button type="button" title="Tiến hành đặt hàng" class="btn btn-kid btn-proceed-checkout btn-checkout" onclick="window.location='{{ route('web.account.get.getCheckout') }}';"> <span><span>Tiến hành đặt hàng</span></span> </button></li>
                  </ul>
               </div>
               @else
               <div class="col-lg-12">
                  <p>Chưa có sản phẩm trông giỏ hàng <a href="{{ url('san-pham.html') }}">Click</a> ở đây để mua hàng.</p>
               </div>
               @endif
            </div>
         </div>
         <div class="after-content"></div>
      </div>
   </div>
   <div class="after-main"></div>
</div>
@endsection
