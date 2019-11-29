@extends('base::layouts.master')
@push('css')
<style type="text/css" media="screen">
	.asColorPicker-wrap{
		width: 90%;
	}
	.asColorPicker-dropdown{
		max-width: 257px;
	}
</style>
@endpush
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Tạo Mới Thuộc Tính</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<form method="POST" action="{{ route('admin.attribute.post.create') }}" id="my-form">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-sm-8">
								<div class="form-group row">
									<label for="title" class=" control-label col-form-label">Tên thuộc tính</label>
									<input type="text" id="name" class="form-control title" name="title" placeholder="Tên danh mục">
								</div>
								<div class="form-group row">
									<label  for="example-text-slug" class=" control-label col-form-label">URL Key</label>
									<input type="text" id="example-text-slug" name="slug" class="form-control slug" value="{{ old('slug') }}">
								</div>
								
								<div class="form-group row">
									<label for="parent_id" class="control-label col-form-label">Danh mục thuộc tính</label>
									<select id="parent_id" class="form-control" name="parent_id">
										<option value="0">Chọn danh mục thuộc tính cha</option>
										{{ get_attribute_category($ref_lang) }}
									</select>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<p  for="status" class=" control-label col-form-label">Mã màu</p>
										<input type="text" class="form-control complex-colorpicker" name="color">
									</div>
									<div class="col-md-6">
										<label  for="status" class=" control-label col-form-label">Trạng thái</label>
										<select class="form-control" name="status" id='status'>
											<option value="0">Ẩn</option>
											<option value="1" selected="">Hiển thị</option>}
										</select>
									</div>
								</div>
								
							</div>
							
							<div class="col-sm-4">
								<div class="form-group">
									<label for="example-text-stt">{{ trans('Languages') }}</label>
									<select class="form-control select2" name="language">
										@foreach(config('base.language') as $lang => $name)
										<option value="{{ $lang }}">{{ $name }}</option>
										@endforeach
									</select>
									<div style="margin-top: 5px;">
										<label for="example-text-stt">{{ trans('Translations') }}</label>
										<div id="list-others-language">
											@php 
											$languages = config('base.language');
											unset($languages[$ref_lang]);
											@endphp
											@foreach($languages as $key => $lang)
											<p>
												<img src="{{ asset('uploads/languages') }}/{{ $key }}.png" title="{{ $lang }}" alt="{{ $lang }}">
												<a href="?ref_lang={{ $key }}"> {{ $lang }}
													<i class="fa fa-plus"></i>
												</a>
											</p>
											@endforeach
										</div>
									</div>
								</div>
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
{!! JsValidator::formRequest('TTSoft\Products\Http\Requests\ValidationAttributeRequest', '#my-form'); !!}

<script>
	$(".colorpicker").asColorPicker();
	$(".complex-colorpicker").asColorPicker({
		mode: 'complex'
	});
	$(".gradient-colorpicker").asColorPicker({
		mode: 'gradient'
	});
</script>
@endpush