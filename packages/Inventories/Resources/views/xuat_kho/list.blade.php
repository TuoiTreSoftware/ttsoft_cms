@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Danh Sách Phiếu Nhập Kho</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('inventories.xuat_kho.get.add') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Tạo phiếu xuất kho</a>
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
									<th>Đối tác</th>
									<th>Nhân Viên Nhập</th>
									<th class="text-center">Giá Trị</th>
									<th>Ghi Chú</th>
									<th>Tình Trạng</th>
									<th></th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($data as $key => $val)

								<tr>
									<td><input type="checkbox" class="check" id="minimal-checkbox-1"></td>
									<td>{{ $val->created_at }}</td>
									<td><a href="#">{{ $val->doc_code }}</a></td>
									<td>{{ $val->customer ? $val->customer->full_name : null }}</td>
									<td>{{ $val->user ? $val->user->full_name : null }}</td>
									<td class="text-right"><a href="#">{{ getTotalDocHeadersById($val->getId()) }}</a></td>
									<td>{{ $val->description }}</td>
									<td>{{ get_category_name_by_id($val->status_id) }}</td>
									<td><a href="{{ route('inventories.xuat_kho.get.edit',$val->getId()) }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="{{ route('inventories.xuat_kho.get.delete',$val->getId()) }}" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
								</tr>
								
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 15px;">
						<div class="col-md-4">
							<button class="btn btn-danger d-none d-lg-block" type="button"><i class="ti-trash"></i> Xóa mục đã chọn</button>
						</div>
						<div class="col-md-8">
							{!! $data->links('vendor.pagination.bootstrap-4') !!}
						</div>
					</div>
				</div>
			</div>
			
		</div>

	</div>
</div>

@endsection
