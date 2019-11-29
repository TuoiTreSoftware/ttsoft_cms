@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles" style="margin-bottom: 0;">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">{{ trans('product::product.create_new_product_title') }}</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('products.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-arrow-left"></i> Quay lại danh sách</a>
			</div>
		</div>
	</div>
	<section id="product" >
		<div class="row">
			<div class="col-sm-12">
				@include('base::partials.flash-notifitions')
				<form class="m-t-20" method="post" action="" id="validation">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-8">
							<div class="card">
								<div class="card-header bg-default">
			                        <h4 class="m-b-0 text-black">{{ trans('Thông tin chung sản phẩm') }}</h4>
			                    </div>
								<div class="card-body">
									<div class="form-group">
										<label  for="sku">Mã vật tư</label>
										<input type="text" id="sku" name="sku" class="form-control" value="{{ $product->sku or old('sku') }}" readonly="">
									</div>
									<div class="form-group">
										<label  for="example-text-tt">Tên vật tư</label>
										<input type="text" id="example-text-tt" name="title" class="form-control" value="{{ $content->title or old('title') }}">
									</div>
									<div class="form-group">
										<label  for="example-text-slug">URL Key</label>
										<input type="text" id="example-text-slug" name="slug" class="form-control" value="{{ $product->slug or old('slug') }}">
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label for="example-text-price">Giá niêm yết</label>
												<div class="input-group">
													<input type="number" id="example-text-price" name="price" class="form-control" value="{{ $product->price or old('price') }}">
													<div class="input-group-append">
														<span class="input-group-text">đ</span>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<label  for="example-text-ps">Giá khuyến mãi</label>
												<div class="input-group">
													<input type="number" id="example-text-ps" name="price_sale" class="form-control" value="{{ $product->price_sale or old('price_sale') }}">
													<div class="input-group-append">
														<span class="input-group-text">đ</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							{{-- Thuộc tính sản phẩm --}}
							@include('product::product.attribute.attr-edit')
							{{-- content --}}
							<div class="card">
								<div class="card-header bg-default">
			                        <h4 class="m-b-0 text-black">{{ trans('Quản lý nội dung') }}</h4>
			                    </div>
								<div class="card-body">
									{!! ckeditorContent($nameFile = 'content',$old = !empty($content) ? $content->content : null, $folder = 'products', $idContent = 'content' ,$title = trans('Nội dung'),$height = 400) !!}
								</div>
							</div>

							{{-- Google Seo Engine --}}
							<div class="card">
								<div class="card-header bg-default">
			                        <h4 class="m-b-0 text-black" style="float: left;">{{ trans('Google Seo Engine') }}</h4>
			                        <a href="javascript:void(0)" style="float: right; margin-top: 2px;" class="show-meta-seo"><strong>Edit Seo Engine</strong></a>
			                    </div>
			                    <div class="card-body">
			                    	<div class="form-group">
										<label for="example-text">Meta Title</label>
										<input type="text" id="example-text" name="meta_title" class="form-control" autocomplete="off" value="{{ $product->meta_title or old('meta_title') }}">
									</div>
									<div class="meta-seo" style="display: block;">
										<div class="form-group">
											<label for="example-text">Keywords (ngăn cách bởi dấu ",")</label>
											<input class="form-control" name="meta_keywords" autocomplete="off" value="{{ $product->meta_keywords or old('meta_keywords') }}">
										</div>
										<div class="form-group">
											<label for="example-text">Mô tả ngắn</label>
											<textarea class="form-control" name="meta_description" autocomplete="off" rows="5">{{ $product->meta_description or old('meta_description') }}</textarea>
										</div>
									</div>
									<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">{{ trans('Cập nhật sản phẩm') }}</button>
									<button type="reset" class="btn btn-dark waves-effect waves-light">{{ trans('Hủy bỏ') }}</button>
			                    </div>
							</div>
							
						</div>
						<div class="col-sm-4">
							{{-- Thuoc tinh --}}
							<div class="card">
								<div class="card-header bg-default">
			                        <h4 class="m-b-0 text-black">{{ trans('Cấu hình sản phẩm') }}</h4>
			                    </div>
			                    <div class="card-body">
			                    	{{-- nhom vat tu/dmsp --}}
									<div class="form-group">
										<label for="category_id">Nhóm vật tư, hàng hóa</label>
										<select class="form-control" id="product_category_id" name="product_category_id">
											<option value="">Chọn Nhóm vật tư</option>
											{{ get_product_category($ref_lang,"",0,$product->product_category_id) }}
										</select>
									</div>
									<input type="hidden" class="form-control" id="type_id" name="type_id" value="{{ TTSoft\Categories\Entities\Category::HANGHOA }}">
									<div class="form-group">
										<label  for="example-text-unit">Đơn vị tính</label>
										<input type="text" id="example-text-unit" name="unit" class="form-control" autocomplete="off" value="{{ $product->unit or old('unit') }}">
									</div>
									<div class="form-group">
										<label  for="example-text-gut">Bảo hành (Tháng)</label>
										<input type="number" id="example-text-gut" name="guarantee" class="form-control" autocomplete="off" value="{{ $product->guarantee or old('guarantee') }}">
									</div>
									<div class="form-group">
										<label  for="example-text-tax">Thuế VAT</label>
										<div class="input-group">
											<input type="number" id="example-text-tax" name="product_tax" class="form-control" autocomplete="off" value="{{ $product->product_tax or old('product_tax') }}">
											<div class="input-group-append">
												<span class="input-group-text">%</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="tagsinput">Chất liệ<u></u></label>
										<div class="input-group">
											<input type="text" value="{{ $product->product_tag or old('product_tag') }}" data-role="tagsinput" placeholder="Từ khóa liên quan" name="product_tag">
										</div>
									</div>
									<div class="form-group">
										<label for="example-text-stt">Trạng thái</label> &nbsp
										<select class="form-control select2" name="status">
											<option value="1" @if($product->status == 1) selected="" @endif>Enabled</option>
											<option value="0" @if($product->status == 0) selected="" @endif>Disabled</option>
										</select>
									</div>
			                    </div>
							</div>
							{{-- media --}}
							<div class="card">
								<div class="card-header bg-default">
			                        <h4 class="m-b-0 text-black">{{ trans('Quản lý hình ảnh') }}</h4>
			                    </div>
								<div class="card-body">
									{{-- hinh anh --}}
									{!! fileUploadSingle($nameFile = 'image' , $folder = 'medias' , $old = $product->image) !!}
								</div>
							</div>

							{{-- gallery --}}
							{{-- media --}}
							<div class="card">
								<div class="card-header bg-default">
			                        <h4 class="m-b-0 text-black">{{ trans('Galleries') }}</h4>
			                    </div>
								<div class="card-body">
									{{-- hinh anh chi tiet --}}
									{!! fileUploadMultip($action = 'edit' , $nameFile = 'multipleImage[]', $folder = 'medias') !!}
									@if(!empty($product->productImages))
									<div class="row">
										@foreach($product->productImages as $k => $img)
										<div class="col-md-4" style="margin-bottom: 5px; position: relative;" id="dproduct{{ $img->getId() }}">
											<img src="{{ $img->getImage() }}" width="100%">
											<a href="javascript:void(0)" class="remove-image" data-id="{{ $img->getId() }}" style="position: absolute; top: 0; right: 15px; font-size: 18px; color: #d30404">
												<i class="fa fa-remove"></i>
											</a>
										</div>
										@endforeach
									</div>
									@endif
									@push('jQuery')
									<script type="text/javascript">
										$(document).ready(function(){
											$(".remove-image").on("click",function(){
												var yes = confirm('Bạn có thực sự muốn xóa ảnh này');
												if(!yes)
													return yes;
												else
													var _token = '{{ csrf_token() }}';
												var idHinh = $(this).attr("data-id");
												var img = $(this).attr("src");
												$.ajax({
													url: BASE_URL_ADMIN + '/product/image/delete/'+idHinh,
													type: 'GET',
													cacha: false,
													dataType : 'json',
													data:{
														"_token":_token,
														"idHinh":idHinh
													},
													success: function(data){
														console.log(data);
														$("#dproduct"+idHinh).fadeOut("fast",function(){ 
															$(this).remove();
														});
													}
												});
											});
										});
									</script>
									@endpush
								</div>
							</div>
							{{-- content --}}
							<div class="card">
								<div class="card-header bg-default">
			                        <h4 class="m-b-0 text-black">{{ trans('Ngôn ngữ') }}</h4>
			                    </div>
								<div class="card-body">
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
				                                    		@if(get_language_product($key,$product->id) > 0)
				                                    			<i class="fa fa-edit"></i>
				                                    		@else
				                                    			<i class="fa fa-plus"></i>
				                                    		@endif
				                                    	</a>
										    		</p>
			                                    @endforeach
										    </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
@endsection
@push('jQuery')
{!! JsValidator::formRequest('TTSoft\Products\Http\Requests\ValidationProductRequest') !!}
<script type="text/javascript">
	$(".show-meta-seo").click(function(){
		$(".meta-seo").toggle(200);
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("body").on('change', '#sku', function() {
			var sku = $('#sku').val();
			$('#product_barcode').val(sku);
		});
	})
</script>
@endpush