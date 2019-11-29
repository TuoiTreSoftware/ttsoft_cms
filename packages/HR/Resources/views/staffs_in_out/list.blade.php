@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-7 align-self-center">
			<h4 class="text-themecolor">Danh Sách chấm công trong ngày ({{ today()->format('d-m-Y') }})</h4>
		</div>
		<div class="col-md-5 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('staffs.get.create') }}"" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Thêm Nhân Viên Mới</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form class="row" method="POST" action="">
						{{ csrf_field() }}
						<div class="form-group col-md-2">
							<select class="select2 form-control" name="staffs_id">
								{{ getStaffsInfo() }}
							</select>
						</div>
						<div class="col-md-3">
							<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Chấm công vào/ ra</button>
						</div>
					</form>
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview">
							<thead>
								<tr>
									<th>
										<input type="checkbox" class="check" id="minimal-checkbox-1">
									</th>
									<th>Mã nhân viên</th>
									<th>Họ tên</th>
									<th>Giờ vào</th>
									<th>Giờ ra</th>
								</tr>
							</thead>
							<tbody>
								@foreach($staff as $key => $val)
								<tr>
									<td><input type="checkbox" class="check" id="minimal-checkbox-1"></td>
									<td>{{ $val->id }}</td>
									<td>
										<a href="{{ route('staffs.get.detail',$val->id) }}">
											{{ $val->getTitle() }}
										</a>
									</td>
									<td>
										 {{ getStaffsIn($val->id) }}
									</td>
									<td>
										 {{ getStaffsOut($val->id) }}
										
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="row  pull-right" style="margin-top: 15px;">
			          <div class="col-md-12">
			            {{-- {!! $customers->links('vendor.pagination.bootstrap-4') !!} --}}
			          </div>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
