@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">{{ trans('about::about.module_name') }}</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
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
			
			<div class="card">
				<div class="card-body">
					<form action="{{ route('admin.about.get.update') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<div class="row form-group">
								<div class="col-md-2">
									<label for="title">{{ trans('Tiêu đề') }}</label>
								</div>
								<div class="col-md-10">
									<input type="text" name="title" id="title" class="form-control" value="{{ $about->title ?? '' }}">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-2">
									<label for="slogan">{{ trans('Mô tả') }}</label>
								</div>
								<div class="col-md-10">

									{!! ckeditorContent($nameFile = 'slogan',$old = isset($about) ? $about->slogan : '' , $folder = 'pages', $idContent = 'slogan' ,$title = '') !!}
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-2">
									<label for="video">{{ trans('Link Youtube') }}</label>
								</div>
								<div class="col-md-10">
									<input type="text" name="video" id="video" class="form-control" value="{{ $about->video ?? '' }}"></div>
								</div>
							</div>
							<h3 class="box-title" style="font-family: 'Open Sans', sans-serif;">Tầm nhìn - Sứ mệnh</h3>
							<hr class="m-t-0 m-b-40">
							<div class="row">
								@if(!empty ($about->multi_image))
								<?php $i = 1; ?>
									@foreach($about->multi_image as $key => $c)
										<div class="form-group col-md-4">
											<label for="title1">{{ trans('Tiêu đề '.$i) }}</label>
											<input type="text" name="title{{ $i }}" id="title{{ $i }}" class="form-control" value="{{ $c->title }}">

											<label for="conten1">{{ trans('Nội dung '.$i) }}</label>
											<textarea type="text" name="conten{{ $i }}" id="conten{{ $i }}" class="form-control" rows="6">{{ $c->content }}</textarea>

											<label for="icon1">{{ trans('Icon '.$i.' Kích thước tối đa 100px') }}</label>
											<input type="file" name="icon{{ $i }}" id="icon{{ $i }}" class="form-control">
											<img src="{{ substr($c->icon,1) }}" width="50">
										</div>
									<?php $i++; ?>
									@endforeach
								@else
								<div class="form-group col-md-4">
									<label for="title1">{{ trans('Tiêu đề 1') }}</label>
									<input type="text" name="title1" id="title1" class="form-control">

									<label for="conten1">{{ trans('Nội dung 1') }}</label>
									<textarea type="text" name="conten1" id="conten1" class="form-control"></textarea>

									<label for="icon1">{{ trans('Icon 1') }}</label>
									<input type="file" name="icon1" id="icon1" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label for="title1">{{ trans('Tiêu đề 2') }}</label>
									<input type="text" name="title2" id="title2" class="form-control">

									<label for="conten1">{{ trans('Nội dung 2') }}</label>
									<textarea type="text" name="conten2" id="conten2" class="form-control"></textarea>

									<label for="icon1">{{ trans('Icon 2') }}</label>
									<input type="file" name="icon2" id="icon2" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label for="title1">{{ trans('Tiêu đề 3') }}</label>
									<input type="text" name="title3" id="title3" class="form-control">

									<label for="conten1">{{ trans('Nội dung 3') }}</label>
									<textarea type="text" name="conten3" id="conten3" class="form-control"></textarea>

									<label for="icon1">{{ trans('Icon 3') }}</label>
									<input type="file" name="icon3" id="icon3" class="form-control">
								</div>
								@endif
							</div>
							<div class="col-md-12">
								<input type="hidden" name="lang" value="{{ $ref_lang }}">
								<button class="btn btn-info btn-sm" type="submit">{{ trans('Cập nhật') }}</button>
							</div>
						</div>
					</form>

				</div>
			</div>
			
		</div>

	</div>
</div>
@endsection