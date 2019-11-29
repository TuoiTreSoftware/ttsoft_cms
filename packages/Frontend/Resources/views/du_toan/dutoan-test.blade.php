@extends('frontend::layouts.master')
@section('content')
<section id="page-title">
   <div class="container clearfix">
      <h1>Dự Toán Mức Đầu Tư Cho Ngôi Nhà Bạn</h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
         <li class="breadcrumb-item active" aria-current="page"><a href={{ route('frontend.tintuc.get') }}>Sản phẩm</a></li>
      </ol>
   </div>
</section><!-- #page-title end -->

<section id="content">
   <div class="content-wrap">
      <div class="container clearfix">
         <div class="row">
            <div class="col-md-6">
               <!-- Step 1 -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Xin chào!<br> Trước khi bắt đầu hãy cho chúng tôi biết tên của bạn!</h4>
                     <div class="form-group">
                        <input type="text" name="name" class="form-control" id="heso-dientich">
                     </div>
                     <button type="submit" class="btn btn-primary mb-2">Bắt đầu ngay</button>
                  </div>
               </div>

               <!-- Step 2 -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title text-center">Anh có giới hạn ngân sách không</h4>
                     <div class="form-group form-inline">
                        <div class="form-check col-md-6">
                           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked="">
                           <label class="form-check-label" for="exampleRadios1">
                              Có
                           </label>
                        </div>
                        <div class="form-check col-md-6">
                           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked="">
                           <label class="form-check-label" for="exampleRadios1">
                              Không
                           </label>
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Giới hạn ngân sách là</label>
                        <input type="number" name="ngansach" class="form-control" id="heso-dientich">
                     </div>
                     <div class="form-group">
                        <label>Diện tích lắp đặt mong muốn</label>
                        <input type="text" name="dientich" class="form-control" id="heso-dientich">
                     </div>
                     <button type="submit" class="btn btn-primary mb-2">Tiếp tục</button>

                  </div>
               </div>

               <!-- Step 3 -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Xin chào anh Phúc!</h4>
                     <div class="form-group">
                        <label>Giới hạn ngân sách đầu tư là</label>
                        <input type="number" name="name" class="form-control" id="heso-dientich">
                     </div>
                     <div class="form-group">
                        <label>Giới hạn ngân sách đầu tư là</label>
                        <input type="text" name="name" class="form-control" id="heso-dientich">
                     </div>
                     <button type="submit" class="btn btn-primary mb-2">Bắt đầu ngay</button>
                  </div>
               </div>

            </div><!-- End col -->
            <div class="col-md-6">
               <div class="row">
                  <div class="form-group col-md-6">
                     <label for="heso-mainha">Loại mái nhà</label>
                     <select class="form-control" id="heso-mainha">
                        <option>Mái Tôn</option>
                        <option>Mái Tôn</option>
                        <option>Mái Tôn</option>
                        <option>Mái Tôn</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="heso-mattiennha">Hướng mặt tiền nhà</label>
                     <select class="form-control" id="heso-mattiennha">
                        <option>Nam</option>
                        <option>Nam</option>
                        <option>Nam</option>
                        <option>Nam</option>
                        <option>Nam</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="heso-gocnghieng_mainha">Góc nghiêng mái nhà</label>
                     <select class="form-control" id="heso-gocnghieng_mainha">
                        <option>Dưới 15</option>
                        <option>Trên 15</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="heso-dientich">Diện tích lắp đặt</label>
                     <select class="form-control" id="heso-dientich">
                        <option>100 m2</option>
                        <option>100 m2</option>
                        <option>100 m2</option>
                        <option>100 m2</option>
                        <option>100 m2</option>
                        <option>100 m2</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="heso-dientich">Giới hạn đầu tư</label>
                     <input type="number" class="form-control" id="heso-dientich">
                  </div>
               </div>
            </div><!-- End col -->

         </div>
      </div>
   </div>
</section><!-- #content end -->

@endsection