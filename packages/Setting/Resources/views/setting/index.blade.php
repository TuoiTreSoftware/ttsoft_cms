@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Setting</h4>
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
		<div class="col-md-12">
			@include('base::partials.flash-notifitions')
			<div class="card">
				<div class="card-body">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs customtab" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">{{ trans('Thông tin website')}}</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">{{ trans('Thông tin công ty')}}</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages2" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">{{ trans('Mạng xã hội')}}</span></a> </li>
					</ul>
					<!-- Tab panes -->
					<form class="pro-add-form" method="POST" action="{{ route('admin.setting.get.getEdit') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="tab-content">
							<div class="tab-pane active" id="home2" role="tabpanel">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="site_name">Site Name</label>
											<input type="text" class="form-control" id="site_name" placeholder="Enter Name" autocomplete="off" name="site_name" value="{{ get_config('site_name') }}"> 
										</div>
										<div class="form-group">
											<label for="meta_title">Meta Title</label>
											<input type="text" class="form-control" id="meta_title" placeholder="Enter URL Key" name="meta_title" autocomplete="off" value="{{ get_config('meta_title') }}"> 
										</div>
										<div class="form-group">
											<label for="meta_keywords">Meta Keywords</label>
											<input type="text" class="form-control" id="meta_keywords" placeholder="Enter URL Key" name="meta_keywords" autocomplete="off" value="{{ get_config('meta_keywords') }}"> 
										</div>
										<div class="form-group">
											<label for="meta_description">Meta Description</label>
											<textarea class="form-control summernote" id="meta_description" placeholder="Enter your content here" autocomplete="off" name="meta_description">{{ get_config('meta_description') }}</textarea>
										</div>
										<!-- <div class="form-group">
											<label for="banner">Banner</label>
											<input type="file" class="form-control" id="banner" name="banner" autocomplete="off" name="banner"> 
											@if(get_config('banner'))
											<img src="{{ asset(get_config('banner')) }}" width="100">
											@endif
										</div> -->
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="logo">Header Logo</label>
											<input type="file" class="form-control" id="logo" name="logo" autocomplete="off"> 
											@if(get_config('logo'))
											<img src="{{ asset(get_config('logo')) }}" width="100">
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="fav">Favicon</label>
											<input type="file" class="form-control" id="fav" name="fav" autocomplete="off"> 
											@if(get_config('fav'))
											<img src="{{ asset(get_config('fav')) }}" width="100">
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="profile2" role="tabpanel">
								<div class="col-md-8">
									<div class="form-group">
										<label>Support Online</label>
										<textarea rows="5" class="form-control" name="text" autocomplete="off">{{ old('text') }}</textarea>
									</div>
									<div class="form-group">
										<label class="">Tên công ty</label>
										<input type="text" name="cty" class="form-control" value="{{ get_config('cty') }}" autocomplete="off" />
									</div>
									<div class="form-group">
										<label class="">Điện thoại</label>
										<input type="text" name="phone" class="form-control" value="{{ get_config('phone') }}" autocomplete="off"/>
									</div>
									<div class="form-group">
										<label class="">Fax</label>
										<input type="text" name="fax" class="form-control" value="{{ get_config('fax') }}" autocomplete="off"/>
									</div>
									<div class="form-group">
										<label class="">Địa chỉ</label>
										<textarea rows="5" class="form-control" name="address" autocomplete="off">{{ get_config('address') }}</textarea>
									</div>
									<div class="form-group">
										<label class="">Email</label>
										<input type="text" name="email" class="form-control" value="{{ get_config('email') }}" autocomplete="off"/>
									</div>
									<div class="form-group">
										<label class="">Bản đồ</label>
										<textarea rows="5" class="form-control" name="maps" autocomplete="off">{{ get_config('maps') }}</textarea>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="messages2" role="tabpanel">
								<div class="col-md-8">
									<div class="form-group">
										<label class="">Facebook</label>
										<input type="text" name="facebook" class="form-control" value="{{ get_config('facebook') }}" autocomplete="off"/>
									</div>
									<div class="form-group">
										<label class="">Google</label>
										<input type="text" name="google_plus" class="form-control" value="{{ get_config('google_plus') }}" autocomplete="off"/>
									</div>
									<div class="form-group">
										<label class="">Twitter</label>
										<input type="text" name="twitter" class="form-control" value="{{ get_config('twitter') }}" autocomplete="off"/>
									</div>
									<div class="form-group">
										<label class="">Youtube</label>
										<input type="text" name="youtube" class="form-control" value="{{ get_config('youtube') }}" autocomplete="off" />
									</div>
								</div>
							</div>
							<input type="hidden" name="lang" value="{{ $ref_lang }}">
							<div class="col-md-8 m-r-20">
								<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Setting</button>
								<button type="reset" class="btn btn-dark waves-effect waves-light">Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection