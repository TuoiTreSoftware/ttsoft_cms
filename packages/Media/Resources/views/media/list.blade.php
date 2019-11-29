@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">{{ trans('Thêm nội dung') }}</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href={{ route('admin.media.get.add') }} class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> {{ trans('Tạo mới') }}</a>
				<div class="btn-group m-l-15">
                    <button type="button" class="btn btn-secondary">{{ trans('product::product.btn_language') }}</button>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(69px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                    	@foreach(config('base.language') as $key => $lang)
                        	<a class="dropdown-item" href="?ref_lang={{ $key }}">
                        		<img src="{{ asset('uploads/languages') }}/{{ $key }}.png" title="{{ $lang }}" alt="{{ $lang }}"> {{ $lang }}
                        	</a>
                        @endforeach
                    </div>
                </div>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			@include('base::partials.flash-notifitions')
			@if(isset($category))
			<div class="card">
				<div class="card-body">
					<form action="{{ route('admin.media.post.postHomeUpdate',$category) }}?ref_lang={{ $ref_lang }}" method="POST" id="validation">
						{{ csrf_field() }}
						<input type="hidden" name="category" value="{{ $category ?? '' }}">
						<div class="form-group">
							<div class="row form-group">
								<div class="col-md-2">
									<label for="title">{{ trans('Tiêu đề') }}</label>
								</div>
								<div class="col-md-10">
									<input type="text" name="title" id="title" class="form-control" value="{{ $home->title ?? '' }}" required="">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-2">
									<label for="slogan">{{ trans('Slogan') }}</label>
								</div>
								<div class="col-md-10">
									<textarea type="text" name="slogan" id="slogan" class="form-control">{{ $home->slogan ?? '' }}</textarea>
								</div>
							</div>
							@if($home->slug == 'SECTION_1' || $home->slug == 'SECTION_2' || $home->slug == 'SECTION_3' || $home->slug == 'SECTION_4')
							<div class="row form-group">
								<div class="col-md-2">
									<label for="category">{{ trans('category') }}</label>
								</div>
								<div class="col-md-3">
									<select class="form-control" name="category">
										@if($home->slug == 'SECTION_1' || $home->slug == 'SECTION_3' || $home->slug == 'SECTION_4' )
										<option value="">Chọn danh mục sản phẩm</option>
										@foreach(get_id_category_product() as $key => $val)
											@if(json_decode($home->content)->category == $val->id)
												<option value="{{ $val->id }}" selected="">{{ $val->title }}</option>
											@endif
												<option value="{{ $val->id }}">{{ $val->title }}</option>
										@endforeach
										@else
										<option value="">Chọn sản phẩm</option>
										@foreach(getProduct() as $key => $val)
											@if(json_decode($home->content)->category == $val->id)
												<option value="{{ $val->id }}" selected="">{{ $val->title }}</option>
											@endif
											<option value="{{ $val->id }}">{{ $val->title }}</option>
										@endforeach
										@endif
									</select>
								</div>
								@php
									$limit = $home->content;
									$limit = json_decode($limit);
								@endphp
								<label for="limit">{{ trans('Giới hạn') }}</label>
								<div class="col-md-3">
									<input type="number" name="limit" value="{{ $limit->limit ?? 1 }}" id="limit" class="form-control">
								</div>
							</div>
							@endif
							<div class="col-md-10 offset-md-2">
								<button type="submit" class="btn btn-info btn-sm">{{ trans('Cập nhật') }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			@endif
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview">
							<thead>
								<tr>
									<th>
										<input type="checkbox" class="check" id="minimal-checkbox-1">
									</th>
									<th>{{ trans('Tiêu đề') }}</th>
									<th>{{ trans('Mục') }}</th>
									<th>{{ trans('Hình ảnh') }}</th>
									<th>{{ trans('Ngày') }}</th>
									<th>{{ trans('Tình trạng') }}</th>
									<th>{{ trans(' ') }}</th>
								</tr>
							</thead>
							<tbody>
								@if($medias)
								@foreach($medias as $key => $data)
								<tr>
									<td><input type="checkbox" class="check" id="minimal-checkbox-1" value="{{ $data->getId() }}"></td>
									<td><a href="#">{{ $data->getTitle() }}</a></td>
									<td><a href="#">{{ $data->getCategory() }}</a></td>
									<td><img src="{{ $data->getImage() }}" width="50"></td>
									<td>{{ $data->getCreatedAt() }}</td>
									<td>
										@if($data->getStatus())
										<span class="label label-success font-weight-100">Show</span>
										@else
										<span class="label label-danger font-weight-100">Hide</span>
										@endif
									</td>
									<td>
										<a href="{{ route('admin.media.get.edit',$data->getId()) }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
											<i class="ti-marker-alt"></i>
										</a> 
										<a href="{{ route('admin.media.get.delete',$data->getId()) }}" class="text-dark" title="Delete" data-toggle="tooltip">
											<i class="ti-trash"></i>
										</a>
									</td>
								</tr>
								@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row  pull-right" style="margin-top: 15px;">
				<div class="col-md-12">
					{!! $medias->links('vendor.pagination.bootstrap-4') !!}
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
@push('jQuery')
<script type="text/javascript">
	{!! JsValidator::formRequest('TTSoft\Media\Http\Requests\Admin\UpdateHomeRequest') !!}
</script>
@endpush