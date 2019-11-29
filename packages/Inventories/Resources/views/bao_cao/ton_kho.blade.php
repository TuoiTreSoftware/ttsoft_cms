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
				<a href="#" class="btn btn-success d-none d-lg-block m-l-15 waves-effect waves-light"><i class="fa fa-plus-circle"></i> Xuất Excel</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form action="">
						<div class="table-responsive">
							<table class="table table-bordered table-hover product-overview">
								<thead>
									<tr>
										<th></th>
										<th class="text-center">Mã Vật Tư</th>
										<th>Vật Tư</th>
										<th class="text-center">Tồn đầu kỳ</th>
										<th class="text-center">Nhập trong kỳ</th>
										<th class="text-center">Xuất trong kỳ</th>
										<th class="text-center">Tồn cuối kỳ</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key => $val)
									<tr>
										<td>ma kho</td>
										@foreach(get_name_product($val->id) as $key => $v)
										<td>{{ $v->product_id }}</td>
										@endforeach
										<td>Tong kho</td>
									</tr>
									{{-- <tr>
										<td></td>
										<td>ma kho</td>
										<td>--Kho con</td>
									</tr> --}}
									<tr>
										<td class="text-center"></td>
										<td class="text-center"></td>
										<td> VT-01</a></td>
										<td class="text-right">100</a></td>
										<td class="text-right">100</a></td>
										<td class="text-right">100</a></td>
										<td class="text-right">100</a></td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<td colspan="3">Tổng cộng</td>
										<td class="text-right">1.000</td>
										<td class="text-right">1.000</td>
										<td class="text-right">1.000</td>
										<td class="text-right">1.000</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</form>
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
