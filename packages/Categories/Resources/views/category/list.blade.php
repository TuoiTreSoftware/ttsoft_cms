@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Danh mục</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('categories.get.create',$category) }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Tạo danh mục mới</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header bg-info">
				    <h4 class="m-b-0 text-white">{{ trans('Danh sách') }}</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview">
							<thead>
								<tr>
									<th class="text-left" style="width: 15px;">
										<input type="checkbox" class="check" id="minimal-checkbox-1">
									</th>
									<th class="text-left">Tên danh mục</th>
									<th class="text-left">Mô tả</th>
									<th class="text-left">Hành động</th>
								</tr>
							</thead>
							<tbody>
								{{get_list_category($category, '', 0)}}
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 15px;">
						<div class="col-md-4">
							<button class="btn btn-danger d-none d-lg-block" type="button"><i class="ti-trash"></i> Xóa mục đã chọn</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>

	</div>
</div>

@endsection
