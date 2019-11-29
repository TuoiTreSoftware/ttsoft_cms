@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Tạo Mới Danh Mục</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<form method="POST" action="{{ route('producer.post.create') }}" id="my-form">
						{{ csrf_field() }}
						<div class="row">
							<div class="form-group col-md-8">
								<label for="inputEmail3" class=" control-label col-form-label">Tên danh mục</label>
								<input  class="form-control title" name="title" placeholder="Tên danh mục">
							</div>
							<div class="form-group col-md-2">
									<label for="inputEmail3" class="control-label col-form-label">Danh mục cha</label>
									<select class="form-control" name="parent_id">
										<option value="0">Chọn danh mục cha</option>
										
									</select>
								</div>
							<div class="form-group col-md-12">
								<label>Mô tả</label>
								<textarea class="form-control" name="description" rows="6" placeholder="Thêm mô tả ..."></textarea>
							</div>
						</div>
						<div class="row">
							<div class="form-group m-b-0">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Lưu </button> 
									<a href="#" class="btn btn-primary waves-effect waves-light m-t-10">Hủy bỏ</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Model lấy thông tin từ đơn hàng bán -->
@endsection
@push('jQuery')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
{!! JsValidator::formRequest('TTSoft\Categories\Http\Requests\Admin\CategoryRequest', '#my-form'); !!}
@endpush