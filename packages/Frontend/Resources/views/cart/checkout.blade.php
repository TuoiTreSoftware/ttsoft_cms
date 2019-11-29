@extends('frontend::layouts.master')
@push('css')
<style type="text/css">
   .help-block{
      color: #a94442;
   }
</style>
@endpush
@section('content')
<div class="container col1-layout" id="content">
   <div class="before-main"></div>
   <div class="row">
      <div class="col-lg-12 col-main">
         <div class="checkout">
            <form id="co-billing-form" action="" method="post">
               {{ csrf_field() }}
               <ol class="opc" id="checkoutSteps">
                  <li class="col-lg-4 col-md-4  col-sm-4  col-xs-12">
                     <ul>
                        <li>
                           <div class="panel panel-info">
                              <div class="panel-heading"> <span class="label label-warning">1</span> Địa chỉ giao hàng</div>
                              <div id="checkout-step-billing" class="panel-body">
                                 <ul class="form-list">
                                    <li id="billing-new-address-form">
                                       <fieldset>
                                          <ul>
                                             <li class="fields">
                                                <label for="billing:telephone" class="required"><em>*</em>Điện thoại</label>
                                                <div class="input-box" style="position: relative;"> 
                                                   <input type="text" name="phone" title="Điện thoại" class="validate-phoneprefix input-sm form-control" id="billing-telephone" 
                                                   value=""> 
                                                   <span class="spinner" style="display:none;top:4px;right:10px;"></span>
                                                </div>
                                             </li>
                                             <li class="fields">
                                                <div class="customer-name row">
                                                   <div class="name-firstname col-sm-12">
                                                      <label class="required control-label" for="billing:firstname"><em>*</em>Họ tên</label>
                                                      <div class="input-box col-sm-10"> 
                                                         <input type="text" id="billing-firstname" name="order_name" title="Tên" maxlength="255" class="input-sm form-control" value="">
                                                      </div>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="fields">
                                                <div class="">
                                                   <label for="billing:email" class="required"><em>*</em>Địa chỉ e-mail</label>
                                                   <div class="input-box"> <input type="text" name="email" id="billing-email" title="Địa chỉ e-mail" class="input-sm form-control" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="fields">
                                                <label for="billing:street1" class="required"><em>*</em>Địa chỉ</label>
                                                <div class="input-box"> 
                                                   <input type="text" title="Địa chỉ" name="address" id="billing-street1" class="input-sm form-control" value="">
                                                </div>
                                             </li>
                                             <li>
                                                <div class="fields">
                                                   <label for="billing:region_id" class="required"><em>*</em>Tỉnh/Tp</label>
                                                   <div class="input-box">
                                                      <select id="billing:region_id" name="tinhthanh" title="Tỉnh/Tp" class="validate-select input-sm form-control required-entry">
                                                         <option value="">Mời bạn chọn Tỉnh/Tp</option>
                                                         @foreach(DB::table('province')->orderBy('sortBy','DESC')->get() as $p)
                                                         <option value="{{ $p->type }} {{ $p->name }}" title="{{ $p->type }} {{ $p->name }}">{{ $p->type }} {{ $p->name }}</option>
                                                         @endforeach
                                                      </select>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </fieldset>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </li>
                  <li class="col-lg-4 col-md-4  col-sm-4  col-xs-12">
                     <ul>
                        <li>
                           <div class="panel panel-info">
                              <div class="panel-heading"> <span class="label label-warning">2</span> Phương thức vận chuyển</div>
                              <div id="checkout-step-shipping_method" class="panel-body">
                                 <div id="checkout-shipping-method-load"> Xem chính sách vận chuyển <a href="{{ url('/phuong-thuc-giao-hang.html') }}" target="_blank">tại đây</a></div>
                                 <div id="onepage-checkout-shipping-method-additional-load"></div>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="panel panel-info">
                              <div class="panel-heading"> <span class="label label-warning">3</span> Phương thức thanh toán</div>
                              <div id="checkout-step-payment" class="panel-body">
                                 <div id="co-payment-main">
                                    <fieldset>
                                       <dl class="sp-methods" id="checkout-payment-method-load">
                                          <dt>
                                             <input id="p_method_checkmo" checked="" value="checkmo" type="radio" name="payment_method" title="Thanh toán tại cửa hàng" class="radio"> 
                                             @push('js')
                                             <script type="text/javascript">
                                                $("#p_method_checkmo").click(function(){
                                                   $("#thanh_toan_tai_cua_hang").toggle();
                                                   $("#chuyen_khoan").hide();
                                                   $("#thanh_toan_khi_nhan_hang").hide();
                                                });
                                             </script>
                                             @endpush
                                             <label for="p_method_checkmo"> Thanh toán tại cửa hàng </label>
                                          </dt>
                                          <dd>
                                             <ul class="form-list checkout-agreements" id="thanh_toan_tai_cua_hang">
                                                <li>
                                                   <a href="#" style="padding-left: 30px;">Xem địa chỉ cửa hàng</a>
                                                </li>
                                             </ul>
                                          </dd>
                                          {{-- 1 --}}
                                          <dt>
                                             <input id="p_method_banktransfer" value="banktransfer" type="radio" name="payment_method" title="Chuyển khoản" class="radio"> 
                                             @push('js')
                                             <script type="text/javascript">
                                                $("#p_method_banktransfer").click(function(){
                                                   $("#chuyen_khoan").toggle();
                                                   $("#thanh_toan_tai_cua_hang").hide();
                                                   $("#thanh_toan_khi_nhan_hang").hide();
                                                });
                                             </script>
                                             @endpush
                                             <label for="p_method_banktransfer"> Chuyển khoản </label>
                                          </dt>
                                          <dd>
                                             <ul class="form-list checkout-agreements" id="chuyen_khoan" style="display: none;">
                                                <li>
                                                   <div class="banktransfer-instructions-content agreement-content">
                                                      <div style="padding-left: 30px;">
                                                         <ul>
                                                            <li><b>1. </b>Qua Ngân Hàng Vietcombank <br> - 
                                                               Tên tài khoản :  CÔNG TY CỔ PHẦN SỮA HỘP VIỆT NAM.<br> - 
                                                               Tài khoản số : 002100019XXXX<br> - 
                                                               Mở tại Ngân hàng Vietcombank - Chi nhánh Hà Nội.<br>
                                                            </li>
                                                         </ul>
                                                         <br>
                                                      </div>
                                                   </div>
                                                </li>
                                             </ul>
                                          </dd>
                                          {{-- 2 --}}
                                          <dt> 
                                             <input id="p_method_cashondelivery" value="cashondelivery" type="radio" name="payment_method" title="Thanh toán khi nhận hàng" class="radio"> <label for="p_method_cashondelivery"> Thanh toán khi nhận hàng </label>
                                          </dt>
                                          @push('js')
                                          <script type="text/javascript">
                                             $("#p_method_cashondelivery").click(function(){
                                                $("#thanh_toan_khi_nhan_hang").toggle();
                                                $("#thanh_toan_tai_cua_hang").hide();
                                                $("#chuyen_khoan").hide();
                                             });
                                          </script>
                                          @endpush
                                          <dd>
                                             <ul class="form-list checkout-agreements" id="thanh_toan_khi_nhan_hang" style="display: none;">
                                                <li>
                                                   <a href="#" style="padding-left: 30px;">Xem chính sách giao hàng</a>
                                                </li>
                                             </ul>
                                          </dd>
                                       </dl>
                                    </fieldset>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </li>
                  <li class="col-lg-4 col-md-4  col-sm-4  col-xs-12">
                     <div class="panel panel-info">
                        <div class="panel-heading"> <span class="label label-warning">4</span> Xem đơn hàng</div>
                        <div id="checkout-step-review" class="panel-body">
                           <div class="order-review" id="checkout-review-load">
                              <div id="checkout-review-table-wrapper">
                                 <table class="table review-table table-striped table-condensed" id="checkout-review-table">
                                    <thead>
                                       <tr>
                                          <td style="" class="a-right" colspan="3"> Tổng : </td>
                                          <td style="" class="a-right"> <span class="price">{{ Cart::total() }}</span></td>
                                       </tr>
                                       <tr>
                                          <td style="" class="a-right" colspan="3"> Giảm giá : </td>
                                          <td style="" class="a-right"> 
                                             <span class="price-code">
                                                {{ session()->has('discountPrice') ? format(session()->get('discountPrice')): '0đ' }}</span>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td style="" class="a-right" colspan="3"> <strong>Tổng cộng : </strong></td>
                                          <td style="" class="a-right"> 
                                             <strong><span class="price-total">
                                                {{ session()->has('discountPrice') ? format(Cart::total() - session()->get('discountPrice')): Cart::total() }}</span>
                                             </strong>
                                          </td>
                                       </tr>
                                       <tr>
                                          <th rowspan="1"><strong>Tên sản phẩm</strong></th>
                                          <th colspan="1" class="a-center"><strong>Giá</strong></th>
                                          <th rowspan="1" class="a-center"><strong>S.Lượng</strong></th>
                                          <th colspan="1" class="a-center"><strong>Thành tiền</strong></th>
                                       </tr>
                                    </thead>
                                    @if(count(Cart::count()) > 0)
                                    <tbody class="review-items">
                                       @foreach(Cart::content() as $c)
                                       <tr>
                                          <td>
                                             <p class="product-name">{{ $c->name }}</p>
                                          </td>
                                          <td class="a-right"> <span class="cart-price"> <span class="price">{{ format($c->price) }}</span> </span></td>
                                          <td class="a-center">{{ $c->qty }}</td>
                                          <td class="a-right"> <span class="cart-price"> <span class="price">{{ format($c->price * $c->qty) }}</span> </span></td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                    @endif
                                 </table>
                              </div>
                              <div class="buttons-set">
                                 <ul class="form-list">
                                    <li>
                                       <fieldset>
                                          <ul>
                                             <li class="wide">
                                                <div class="input-box"> 
                                                   <textarea id="ordercomment-comment" class="input-text validation-passed" name="ghichu" title="Nhận xét đơn hàng" rows="5" cols="10" placeholder="Ghi chú đơn hàng"></textarea>
                                                </div>
                                             </li>
                                          </ul>
                                       </fieldset>
                                    </li>
                                 </ul>
                              </div>
                              <div id="checkout-review-submit">
                                 <div class="discount">
                                    <span>Nhập mã khuyến mại (nếu có).</span>
                                    <div class="input-group" style="margin-top: 5px;">
                                       <input autocomplete="off" class="input-sm form-control required-entry" id="coupon_code" name="coupon_code" value="">
                                       <div class="input-group-btn"> 
                                          <button type="button" title="Áp dụng mã giảm" class="btn btn-kid" id="coupon-submit" value="Áp dụng mã giảm"> Áp dụng </button> 
                                          <span id="coupon-loading" class="hidden">
                                          <img src="{{ asset('uploads/process_spinner.gif') }}">
                                          </span>
                                       </div>
                                    </div>
                                    <p class="msg-code"></p>
                                    @push('js')
                                    <script type="text/javascript">
                                       function format_price(nStr){
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
                                       $("body").on('click',"#coupon-submit",function(){
                                          var code = $("#coupon_code").val();
                                          var _token = '{{ csrf_token() }}';
                                          $.ajax({
                                             url: '#',
                                             type: 'POST',
                                             dataType: 'json',
                                             data: {code: code , _token : _token},
                                             beforeSend : function(){
                                                $("#coupon-loading").removeClass('hidden');
                                             },
                                          })
                                          .done(function(data) {
                                             $(".msg-code").text('');
                                             $("#coupon_code").val('');
                                             $("#coupon-loading").addClass('hidden');
                                             if (data.status == 'incorrect') {
                                                $(".msg-code").css({"color" : "red"}).text(data.message);
                                             }
                                             else{
                                                var TOTAL = '{{ Cart::total() }}';
                                                    TOTAL = parseInt(TOTAL);
                                                var PRICE_CODE = data.data.value;
                                                var SUP_TOTAL = TOTAL - PRICE_CODE;
                                                $(".price-code").html(format_price(PRICE_CODE) + 'đ');
                                                $(".price-total").html(format_price(SUP_TOTAL) + 'đ');
                                                $(".msg-code").css({"color" : "blue"}).text(data.message);
                                             }
                                          })
                                          .fail(function(data) {
                                             console.log(data);
                                          });
                                          
                                       });
                                    </script>
                                    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>
                                    {{-- {!! JsValidator::formRequest('App\Http\Requests\Front\CheckoutRequest','#co-billing-form') !!} --}}
                                    @endpush
                                 </div>
                                 <div class="buttons-set" id="review-buttons-container">
                                    <div class="clearfix"> 
                                       <button type="submit" title="Đặt hàng" class="btn btn-kid btn-checkout pull-right"> <i class="glyphicon glyphicon-shopping-cart"></i> Đặt hàng </button>
                                    </div>
                                    <span class="please-wait text-center" id="review-please-wait" style="display:none;"> 
                                    <img src="//kidsplaza-1.cdn.vccloud.vn/skin/frontend/kidsplaza/2015/images/opc-ajax-loader.gif" alt="Đang xử lý thông tin..." title="Đang xử lý thông tin..." class="v-middle"> Đang xử lý thông tin... </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
               </ol>
            </form>
         </div>
         <style type="text/css"> #nprogress .bar {background: #FF0000;} </style>
         <div class="after-content"></div>
      </div>
   </div>
</div>
@endsection