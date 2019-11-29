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

            <div class="col-md-8">
               <form method="POST">
                  {{ csrf_field() }}
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label for="heso-dientich">Diện tích lắp đặt không bị phủ bóng</label>
                        <input type="number" class="form-control" id="heso-dientich" name="dientich" required="">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="heso-gioihan">Giới hạn đầu tư</label>
                        <input type="number" class="form-control" id="heso-gioihan" name="gioihan">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="heso-hoadondien">Hóa đơn tiền điện bình quân</label>
                        <input type="number" class="form-control" id="heso-hoadondien" name="hoadondien">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="heso-mainha">Loại mái nhà</label>
                        <select class="form-control" id="heso-mainha" name="mainha">
                           @foreach(getThamSoDuToan(2) as $key => $val)
                           <option value="{{ $val->getId() }}">{{ $val->getTitle() }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="heso-mattiennha">Hướng mặt tiền nhà</label>
                        <select class="form-control" id="heso-mattiennha" name="mattiennha">
                           @foreach(getThamSoDuToan(3) as $key => $val)
                           <option value="{{ $val->getId() }}">{{ $val->getTitle() }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="heso-gocnghieng">Góc nghiêng mái nhà</label>
                        <select class="form-control" id="heso-gocnghieng" name="gocnghieng">
                           @foreach(getThamSoDuToan(4) as $key => $val)
                           <option value="{{ $val->getId() }}">{{ $val->getTitle() }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Tính dự toán!</button>
               </form>
            </div><!-- End col -->

            <div class="col-md-4">
               <!-- Step 1 -->
               <div class="card">
                  <div class="card-body">
                     @if(isset($congSuatHeThong) && isset($dienTichTinhToan) && isset($giaTriDauTu))
                     <h4 class="card-title">Thông tin dự toán như sau:</h4>
                     <p>1. Công suất hệ thống: <span>{{ format_price($congSuatHeThong) }}</span> kWp</p>
                     <p>2. Diện tích lắp đặt: <span>{{ format_price($dienTichTinhToan) }}</span> m2</p>
                     <p>3. Chi phí đầu tư: <span>{{ format_price($giaTriDauTu) }}</span> đồng</p>
                     <p>4. Điện năng thu được hằng năm: <span>{{ format_price($congSuatHeThong*4*365) }}</span> kWh</p>
                     
                     @else
                     <h4 class="card-title">Vui lòng chọn Thông tin dự toán!</h4>
                     
                     @endif
                  </div>
               </div>

            </div><!-- End col -->

         </div>
      </div>
   </div>
</section><!-- #content end -->

@endsection