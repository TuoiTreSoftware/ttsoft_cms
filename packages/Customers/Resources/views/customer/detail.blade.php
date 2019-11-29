@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Thông Tin Chi Tiết Khách hàng</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('customer.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Quay lại danh sách</a>
			</div>
		</div>
	</div>
	<section id="customer" >
		<div class="row">
			<div class="col-sm-3">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Thông tin chi tiết</h4>
						<small class="text-muted">Họ Tên</small>
						<h6>{{ $customer->getFullNameAttribute() }}</h6>

						<small class="text-muted">Ngày sinh</small>
						<h6>{{ $customer->birth_date }}</h6>

						<small class="text-muted">Số điện thoại</small>
						<h6>{{ $customer->phone_number }}</h6>

						<small class="text-muted">Email</small>
						<h6>{{ $customer->email }}</h6>

						<small class="text-muted">CMND/CCCD</small>
						<h6>{{ $customer->tax_code }}</h6>

						<small class="text-muted">Địa chỉ</small>
						<h6>{{ $customer->address }}</h6>
						<h6>{{ $customer->getProvinceName() }}</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>STT</th>
										<th>Dịch vụ/ Sản phẩm</th>
										<th>Ngày Giao Dịch</th>
										<th>Đơn Hàng</th>
										<th>Số Tiền</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>STT</th>
										<th>Dịch vụ/ Sản phẩm</th>
										<th>Ngày Giao Dịch</th>
										<th>Đơn Hàng</th>
										<th>Số Tiền</th>
									</tr>
								</tfoot>
								<tbody>
									@for($i = 1; $i < 100; $i ++)
									<tr>
										<td>{{ $i }}</td>
										<td>Dịch vụ spa {{ $i }}</td>
										<td>2011/04/25</td>
										<td>SO000{{ $i }}</td>
										<td>320,800 đ</td>
									</tr>
									@endfor
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection

@push('jQuery')
<!-- This is data table -->
<script src="/assets/node_modules/datatables/jquery.dataTables.min.js"></script>

<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->

<script type="text/javascript">
	$('#example1').DataTable({
		dom: 'Bfrtip',
		buttons: [
		'excel', 'pdf', 'print'
		]
	});
</script>
@endpush