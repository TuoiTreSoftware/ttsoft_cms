@extends('frontend::layouts.master')
@section('content')
<div class="container col2-left-layout" id="content">
   <div class="before-main"></div>
   <div class="row">
      <div style="float: right;" class="col-main col-lg-9 col-md-9 col-sm-9 col-push-9 col-xs-12">
         <div class="before-content"></div>
         <div class="my-account">
            <div class="dashboard">
               <div class="page-title">
                  <h1>Trang chính</h1>
               </div>
               <div class="welcome-msg">
                  <p class="hello"><strong>Xin chào, Nguyen!</strong></p>
               </div>
               <div class="box-account box-info">
                  <div class="box-head">
                     <h2>Thông tin tài khoản</h2>
                  </div>
                  <div class="col2-set">
                     <div class="col-1">
                        <div class="box">
                           <div class="box-title">
                              <h3>Liên hệ</h3>
                              <a href="https://www.kidsplaza.vn/tai-khoan/thay-doi-thong-tin-tai-khoan">Sửa</a>
                           </div>
                           <div class="box-content">
                              <p> Nguyen Dat<br> datnguyen94.phuongnhi@gmail.com<br> <a href="https://www.kidsplaza.vn/customer/account/edit/changepass/1/">Đổi mật khẩu</a></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-2">
                        <div class="box">
                           <div class="box-title">
                              <h3>Đăng ký nhận bản tin</h3>
                              <a href="https://www.kidsplaza.vn/tai-khoan/danh-sach-nhan-tin">Sửa</a>
                           </div>
                           <div class="box-content">
                              <p> Bạn chưa đăng ký dịch vụ thông báo bản tin của chúng tôi.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col2-set">
                     <div class="col-1">
                        <div class="box">
                           <div class="box-title">
                              <h3>Địa chỉ thanh toán mặc định</h3>
                           </div>
                           <div class="box-content">
                              <address> Bạn chưa cài đặt địa chỉ thanh toán.<br> <a href="https://www.kidsplaza.vn/tai-khoan/sua-dia-chi">Sửa địa chỉ</a> </address>
                           </div>
                        </div>
                     </div>
                     <div class="col-2">
                        <div class="box">
                           <div class="box-title">
                              <h3>Địa chỉ nhận hàng mặc định</h3>
                           </div>
                           <div class="box-content">
                              <address> Bạn chưa cài đặt địa chỉ nhận hàng.<br> <a href="https://www.kidsplaza.vn/tai-khoan/sua-dia-chi">Sửa địa chỉ</a> </address>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="after-content"></div>
      </div>
      @include('theme::account.slidebar')
   </div>
   @include('theme::partials.product_viewed')
   <div class="after-main"></div>
</div>
@endsection
@push('css')
<style type="text/css">
   .nav-tabs>li {
    margin-bottom: 0;
}
.tabs-left>.nav-tabs>li>a {
    border:none;
    margin: 0;
    -webkit-border-radius:0;
    -moz-border-radius:0;
    border-radius:0;
    white-space: nowrap;
    position: relative;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 60px;
    line-height: 1.5;
}
.nav-tabs li a i {
    font-size: 18px;
    height: 30px;
    text-align: center;
    width: 40px;
    position: absolute;
    top: 0;
    left: 7px;
    bottom: 0;
    margin: auto;
    line-height: 30px;
    color: #999;
}
.tabs-left>.nav-tabs>li>a:hover, .tabs-left>.nav-tabs>li>a:focus {
    background-color: rgba(9, 30, 66, 0.04);
    border: none;
    color: rgb(66, 82, 110);
    fill: rgba(9, 30, 66, 0.04);
    text-decoration: none;
}
.block-account .block-content strong, .block-account .block-content .active a, .block-account .block-content a:hover {}
.tabs-left>.nav-tabs .active>a, .tabs-left>.nav-tabs .active>a:hover, .tabs-left>.nav-tabs .active>a:focus {
    background-color: rgba(9, 30, 66, 0.04);
    border: none;
    color: rgb(66, 82, 110);
    fill: rgba(9, 30, 66, 0.04);
    text-decoration: none;
    font-weight: 500;
}
.page-title {
    border-bottom: solid 1px #1a83c4;
    margin: 0 0 10px;
}
.page-title h1 {
    color: #0974b8;
    font-weight: 400;
    line-height: 42px;
    margin: 0;
    text-transform: uppercase;
}
.box-account {
    border: none;
    padding: 0;
}
.fieldset {
    border: none;
    float: none;
    padding: 0;
}
.fieldset .legend {
    display: none;
}
.box-account .box .box-title h3 {
    font-weight: 500;
}
.title-buttons {text-align: right;padding-bottom: 5px}
.title-buttons:after {display:block; content:"."; clear:both; font-size:0; line-height:0; height:0; overflow:hidden}
.title-buttons h1, .title-buttons h2, .title-buttons h3, .title-buttons h4, .title-buttons h5, .title-buttons h6 {
    float: left;
}
.my-account .btn-kid {
    background-color: #01a1ed;
    border: none;
    color: #fff;
    outline: none;
    padding: 3px;
}
.my-account .btn-kid > span {
    display: inline-block;
    border: 1px dashed #1a83c4;
    padding: 4px 12px
}

</style>
@endpush
