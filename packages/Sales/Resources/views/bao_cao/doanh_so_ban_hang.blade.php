@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Báo Cáo Doanh Số Hàng</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="#" class="btn btn-info d-none d-lg-block m-l-15 waves-effect waves-light"><i class="fa fa-plus-circle"></i> Bộ Lọc</a>
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
									<th></th>
									<th>Chỉ Tiêu</th>
									<th class="text-center">Doanh Số</th>
									<th class="text-center">Thu tiền</th>
									<th class="text-center">Kế Hoạch</th>
									<th class="text-center">Tình Trạng</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@php
									$sum=0;
								@endphp

								@for($i = 1; $i <= 10; $i++)
									@php
										$sum=$sum+$i;
									@endphp
								<tr>
									<td class="text-center">{{ $i }}</td>
									<td>Nhân viên NV-00{{ $i }}</a></td>
									<td class="text-right">{{ $i }}.000.000 đ</a></td>
									<td class="text-right">{{ $i/10*6000000 }} đ</a></td>
									<td class="text-right">{{ $i }}.000.000 đ</td>
									<td class="text-center"><span class="label label-success font-weight-100">Đạt</span> </td>
									<td><a href="javascript:void(0)" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
								</tr>
								@endfor
								<tr>
									<td></td>
									<td>Tổng</td>
									<td class="text-right">{{ $sum }}.000.000 đ</td>
									<td class="text-right">{{ $sum/10*6000000 }} đ</td>
									<td class="text-right">{{ $sum }}.000.000 đ</td>
									<td></td>
									<td></td>
								</tr>
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
