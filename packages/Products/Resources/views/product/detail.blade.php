@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Thêm mới Vật Tư - Hàng Hóa</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('products.get.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Quay lại danh sách</a>
			</div>
		</div>
	</div>
	<section id="product" >
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					
					<div class="card-body">
						<h4 class="card-title">Thông tin quản lý sản phẩm</h4>
				 		
						<form class="floating-labels m-t-20" method="post" action="{{ route('products.post.edit',$product->id) }}" >
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-3">
									<img src="{{ $product->image }}" style="height: 200px">
								</div>

								<div class="col-md-3"></div>
								<div class="col-md-3"></div>
								<div class="col-md-3">
								<a href="{{ route('products.get.edit',$product->id) }}" style="width: 100%" class="btn btn-warning waves-effect waves-light">Chỉnh sửa</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label  for="example-text-tt">Tên vật tư</label>
									<input type="text" id="example-text-tt" readonly name="title" class="form-control " value="{{ $product->title }}">
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-slug">Slug</label>
									<span class="bar"></span>
									<input type="text" id="example-text-slug" readonly name="slug" class="form-control " value="{{ $product->slug }}">

								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-sku">Mã vật tư</label>
									<input type="text" id="example-text-sku" readonly name="sku" class="form-control " value="{{ $product->sku }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-3 form-group">
									<label for="example-text-bcode">Barcode vật tư</label>
									<input type="text" id="example-text-bcode" readonly name="product_barcode" class="form-control " value="{{ $product->product_barcode }}">
									<span class="bar"></span>

								</div>

								
								<div class="col-md-3 form-group">
									<label for="example-text-stt">Trạng thái</label>
									<input type="number" id="example-text-stt" readonly name="status" class="form-control " value="{{ $product->status }}">
									<span class="bar"></span>

								</div>
								
								<div class="col-md-3 form-group">
									<label  for="example-text-p">Giá niêm yết</label>
									<input type="number" id="example-text-p" readonly name="price" class="form-control " value="{{ $product->price }}" >
									<span class="bar"></span>

								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-ps">Giá khuyến mãi</label>
									<input type="number" id="example-text-ps" readonly name="price_sale" class="form-control " value="{{ $product->price_sale }}" >
									<span class="bar"></span>

								</div>
							</div>
							<h4 class="card-title">Quản lý tồn kho</h4>
							<div class="row m-t-20">
								<div class="col-md-3 form-group">
									{{ getTitleCate($product->type_id) }}
									<span class="bar"></span>
									<label for="example-text-ti">Kiểu vật tư</label>
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-unit">Đơn vị tính</label>
									<input type="text" id="example-text-unit" readonly name="unit" class="form-control " value="{{ $product->unit }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-ue">Đơn vị quy đổi</label>
									<input type="text" id="example-text-ue" readonly name="unit_exchange" class="form-control " value="{{ $product->unit_exchange }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-uev">Giá trị quy đổi</label>
									<input type="number" id="example-text-uev" readonly name="unit_exchange_value" class="form-control " value="{{ $product->unit_exchange_value }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-mns">Tồn kho tối thiểu</label>
									<input type="number" id="example-text-mns" readonly name="product_min_stock" class="form-control " value="{{ $product->product_min_stock }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-mxs">Tồn kho tối đa</label>
									<input type="number" id="example-text-mxs" readonly name="product_max_stock" class="form-control " value="{{ $product->product_max_stock }}" >
									<span class="bar"></span>

								</div>
								
								<div class="col-md-3 form-group">
									<label  for="example-text">Bảo hành</label>
									<input type="number" id="example-text" readonly name="guarantee" class="form-control " value="{{ $product->guarantee }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-tax">Thuế VAT</label>
									<input type="number" id="example-text-tax" readonly name="product_tax" class="form-control " value="{{ $product->product_tax }}">
									<span class="bar"></span>

								</div>
							</div>



							<h4 class="card-title">Mô tả chi tiết sản phẩm</h4>
							<div class="row">
								<div class="col-md-8">
									{!! ckeditorContent($nameFile = 'product_detail',$old = $product->product_detail, $folder = 'products', $idContent = 'content' ,$title = '',$height = 400) !!}
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" id="product_category_id" readonly name="product_category_id">
											{{ 	getEditOptCate($product->product_category_id) }}
										</select>
										<span class="bar"></span>
										<label for="product_category_id">Nhóm vật tư, hàng hóa</label>

									</div>
									<div class="form-group">
										<select class="form-control" id="" readonly name="product_producer_id">
											{{ 	getEditOptProducer($product->product_producer_id) }}
										</select>
										<span class="bar"></span>
										<label for="product_category_id">Nhà sản xuất</label>

									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4 form-group">
									<label for="example-text-mtt">Meta-title</label>
									<input type="text" id="example-text-mtt" readonly name="meta_title" class="form-control " value="{{ $product->meta_title }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-4 form-group">
									<label for="example-text-mk">Meta-keywords</label>
									<input type="text" id="example-text-mk" readonly name="meta_keywords" class="form-control " value="{{ $product->meta_keywords }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-4 form-group">
									<label for="example-text-mdes">Meta-description</label>
									<input type="text" id="example-text-mdes" readonly name="meta_description" class="form-control " value="{{ $product->meta_description }}">
									<span class="bar"></span>

								</div>
							</div>


							<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Thêm</button>
							<button type="reset" class="btn btn-dark waves-effect waves-light">Cancel</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection