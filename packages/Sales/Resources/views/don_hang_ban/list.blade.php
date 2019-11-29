@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Danh Sách Đơn Hàng</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				{{-- <a href={{ route('sales.don_hang_ban.get.getCreateOrder') }} class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Tạo Đơn Hàng Mới</a> --}}
				<a href="{{ route('export.sales') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-file-excel-o"></i> {{ trans('product::product.btn_export_excel') }}</a>
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
									<th>Ngày mua</th>
									<th>Mã đơn hàng</th>
									<th class="text-center">Tổng cộng</th>
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
												@php $payment = $billing->getPaymentInfo() @endphp

										<tr>
											<td><input type="checkbox" class="check" id="minimal-checkbox-1"></td>
											<td>{{ $billing->getCreatedAt() }}</td>
											<td><a href="{{ route('sales.don_hang_ban.get.getEditOrder',$billing->id) }}">{{ $billing->doc_code }}</a></td>
											<td class="text-right">
												@if($billing->discount_code == null)
												{{ format_price($billing->sumOrder()) }}đ
												@else
												{{ format_price($billing->discount_price) }}đ
												@endif
											</td>
											<td>{{ $billing->date_delivery }}</td>
											<td>{{ $billing->customer->full_name ?? '' }}</td>
											<td>
												{{-- <span class="label label-{{ \TTSoft\Sales\Entities\BillingOrder::PYPE_CLASS[$billing->getPaymentClass()] }} font-weight-100">
													{{ \TTSoft\Sales\Entities\BillingOrder::PYPE_PAYMENT[$billing->getPaymentClass()]}}
												</span>  --}}
											</td>
											<td>
												{{ \TTSoft\Sales\Entities\BillingOrder::PAYMENT_METHOD[$billing->payment_method] }}<br>
												@if($payment)
												Mã GD: {{ $payment->transactionCode }}<br>
												Đã TT: {{ format_price($payment->amount) }} đ<br>
												Phí TT: {{ format_price($payment->merchantFee) }} đ<br>
												@endif
											</td>
											<td>
												<a href="{{ route('sales.don_hang_ban.get.getEditOrder',$billing->id) }}" class="text-dark p-r-10" data-toggle="tooltip" title="View Detail"><i class="ti-marker-alt"></i></a> 
												{{-- <a href="javascript:void(0)" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a> --}}
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
