@extends('base::layouts.master')
@push ('css')
<!-- Giỏ hàng CSS -->
<link href="/sales/css/ecommerce.css" rel="stylesheet">
<!-- Custom CSS -->
@endpush
@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Giỏ hàng</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <a href={{ route('sales.get.san_pham.list') }} class="btn btn-info d-none d-lg-block m-l-15 waves-effect waves-light"><i class="fa fa-plus-circle"></i> Thêm sản phẩm vào giỏ</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-9 col-lg-9">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="m-b-0 text-white">Các mặt hàng đã chọn (4 sản phẩm)</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table product-overview">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th style="text-align:center">Total</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td width="150"><img src="/assets/images/gallery/chair2.jpg" alt="iMac" width="80"></td>
                                    <td>1.000.000 đ</td>
                                    <td width="70">
                                        <input type="text" class="form-control" value="1">
                                        <span class="help-block"><small>Tồn kho: 10</small></span>
                                    </td>
                                    <td width="150" align="center" class="font-500">1.000.000 đ</td>
                                    <td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                        <hr>
                        <a href={{ route('sales.get.don_hang_ban.add') }} class="btn btn-success waves-effect waves-light pull-right">Tạo đơn hàng</a>
                        <a href={{ route('sales.get.san_pham.list') }} class="btn btn-dark btn-outline"><i class="fa fa-arrow-left"></i> Thêm sản phẩm vào giỏ</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-3 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">THÔNG TIN THANH TOÁN</h5>
                    <hr>
                    <small>Tổng giá trị</small>
                    <h2>5.000.000 đ</h2>
                    <hr>
                    <a href={{ route('sales.get.don_hang_ban.add') }} class="btn btn-success waves-effect waves-light">Tạo đơn hàng</a>
                    <button class="btn btn-secondary btn-outline">Hủy</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">For Any Support</h5>
                    <hr>
                    <h4><i class="ti-mobile"></i> 9998979695 (Toll Free)</h4> <small>Please contact with us if you have any questions. We are avalible 24h.</small>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection

@push ('jQuery')
<!--Giỏ hàng-->

@endpush