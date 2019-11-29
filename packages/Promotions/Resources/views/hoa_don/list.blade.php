@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Danh Sách Hóa Đơn</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href={{ route('sales.get.hoa_don.add') }} class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Tạo Hóa Đơn Mới</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview">
							<thead>
								<tr>
									<th>
										<input type="checkbox" class="check" id="minimal-checkbox-1">
									</th>
									<th>Ngày</th>
									<th>Chứng Từ</th>
									<th class="text-center">Giá Trị</th>
									<th>Loại hóa đơn</th>
									<th>Khách Hàng</th>
									<th>Tình Trạng</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@for($i = 1; $i <= 10; $i++)
								<tr>
									<td><input type="checkbox" class="check" id="minimal-checkbox-1"></td>
									<td>10-7-2017</td>
									<td><a href="#">Hóa đơn SO00{{ $i }}</a></td>
									<td class="text-right"><a href="#">1.000.000 đ</a></td>
									<td>Hóa đơn bán lẻ</td>
									<td>Nguyễn Văn A</td>
									<td><span class="label label-success font-weight-100">Đã Duyệt</span> </td>
									<td><a href="javascript:void(0)" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
								</tr>
								@endfor
							</tbody>
						</table>
					</div>
					<div class="btn-toolbar pull-right">
						<div class="btn-group mr-2" role="group" aria-label="First group">
							<button type="button" class="btn btn-secondary disabled btn-info">1</button>
							<button type="button" class="btn btn-secondary">2</button>
							<button type="button" class="btn btn-secondary">3</button>
							<button type="button" class="btn btn-secondary">4</button>
						</div>
						<div class="btn-group mr-2" role="group" aria-label="Second group">
							<button type="button" class="btn btn-secondary">5</button>
							<button type="button" class="btn btn-secondary">6</button>
							<button type="button" class="btn btn-secondary">7</button>
						</div>
						<div class="btn-group" role="group" aria-label="Third group">
							<button type="button" class="btn btn-secondary">8</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>

	</div>
</div>

@endsection
