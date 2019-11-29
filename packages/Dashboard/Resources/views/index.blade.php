@extends('base::layouts.master')

@push('css')
<link href="/assets/v2tms/css/pages/footable-page.css" rel="stylesheet">
<link href="/assets/node_modules/footable/css/footable.core.css" rel="stylesheet">
<link href="/assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">{{ web_config('site_name') }} Management Dashboard</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-lg-12">
            @include('base::partials.flash-notifitions')
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover product-overview">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="check" id="minimal-checkbox-1">
                                    </th>
                                    <th>Ngày tạo</th>
                                    <th>Chứng Từ</th>
                                    <th class="text-center">Giá Trị</th>
                                    <th>Ngày Giao Hàng</th>
                                    <th>Khách Hàng</th>
                                    <th>Tình Trạng</th>
                                    <th>Kiểu thanh toán</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($billings)
                                @foreach($billings as $key => $billing)
                                <tr>
                                    <td><input type="checkbox" class="check" id="minimal-checkbox-1"></td>
                                    <td>{{ $billing->getCreatedAt() }}</td>
                                    <td><a href="#">Đơn hàng {{ $billing->doc_code }}</a></td>
                                    <td class="text-right">{{ format_price($billing->sumOrder()) }}đ</td>
                                    <td>{{ $billing->date_delivery }}</td>
                                    <td>{{ $billing->customer->full_name ?? '' }}</td>
                                    <td>
                                        {{-- <span class="label label-success font-weight-100">
                                            {{ getTinhTrang( $billing->id) }}
                                        </span> --}} 
                                    </td>
                                    @if($billing->payment_method == 'chuyen_khoan_ngan_hang')
                                    <td>Chuyển khoan</td>
                                    @else
                                    <td>Online</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('sales.don_hang_ban.get.getEditOrder',$billing->id) }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> 
                                        <a href="javascript:void(0)" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-12">
                            {!! $billings->links('vendor.pagination.bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('jQuery')
<!-- Chart JS -->
<script src="/assets/v2tms/js/dashboard1.js"></script>
<script src="/assets/node_modules/footable/js/footable.all.min.js"></script>
<!--FooTable init-->
<script src="/assets/v2tms/js/pages/footable-init.js"></script>
@endpush