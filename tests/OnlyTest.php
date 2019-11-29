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
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<form class="form-material m-t-40" method="post" action="{{ route('products.post.create') }}" >
						{{ csrf_field() }}
						<div class="form-group">
							<h3>Khóa ngoại?</h3>
							<div class="row">
								<div class="col-md-6">
									<label for="example-text">Danh mục</label>
									<input type="number" id="example-text" name="product_category_id" class="form-control input-create" placeholder="Danh mục vật tư">
								</div>
								<div class="col-md-6">
									<label for="example-text">Nhà sản xuất</label>
									<input type="number" id="example-text" name="product_producer_id" class="form-control input-create" placeholder="int-notnull">
								</div>
							</div>
							<h3>Thuộc tính</h3>
							<div class="row">
								<div class="col-md-6">
									<label class="col-md-12" for="example-text">Tên vật tư</label>
									<div class="col-md-12">
										<input type="text" id="example-text" name="title" class="form-control input-create" placeholder="varchar-notnull">
									</div>
									<label class="col-md-12" for="example-text">Mã vật tư</label>
									<div class="col-md-12">
										<input type="text" id="example-text" name="product_code" class="form-control input-create" placeholder="varchar-notnull" >
									</div>
									<label class="col-md-12" for="example-text">Barcode vật tư</label>
									<div class="col-md-12">
										<input type="text" id="example-text" name="product_barcode" class="form-control input-create" placeholder="varchar-notnull" >
									</div>
									<label class="col-md-12" for="example-text">Slug là gì?</label>
									<div class="col-md-12">
										<input type="text" id="example-text" name="slug" class="form-control input-create" placeholder="varchar-notnull">
									</div>

									<label class="col-md-12" for="example-text">Hình ảnh</label>
									<div class="col-md-12">
										<input type="text" id="example-text" name="image" class="form-control input-create" placeholder="varchar-null">
									</div>
									<label class="col-md-12" for="example-text">Giá mua</label>
									<div class="col-md-12">
										<input type="number" id="example-text" name="price" class="form-control input-create" placeholder="int-null">
									</div>
									<label class="col-md-12" for="example-text">Giá bán</label>
									<div class="col-md-12">
										<input type="number" id="example-text" name="price_sale" class="form-control input-create" placeholder="int-null" >
									</div>
									<label class="col-md-12" for="example-text">Sku là gì?</label>
									<div class="col-md-12">
										<input type="number" id="example-text" name="sku" class="form-control input-create" placeholder="int-null">
									</div>
									<label class="col-md-12" for="example-text">Bảo hành</label>
									<div class="col-md-12">
										<input type="number" id="example-text" name="guarantee" class="form-control input-create" placeholder="int-null">
									</div>
									<label class="col-md-12" for="example-text">Số lượng</label>
									<div class="col-md-12">
										<input type="number" id="example-text" name="quantity" class="form-control input-create" placeholder="int-notnull">
									</div>
									<label class="col-md-12" for="example-text">Giới thiệu</label>
									<div class="col-md-12">
										<input type="text" id="example-text" name="intro" class="form-control input-create" placeholder="text-null">
									</div>
									<label class="col-md-12" for="example-text">Nội dung</label>
									<div class="col-md-12">
										<textarea id="example-text" name="content" class="form-control input-create" placeholder="longtext-null"></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<label class="col-md-12" for="example-text">View là gì?</label>
									<div class="col-md-12">
										<input type="number" id="example-text" name="view" class="form-control input-create" placeholder="int-notnull">
									</div>
									<label class="col-md-12" for="example-text">Nhãn</label>
									<div class="col-md-12">
										<input type="text" id="example-text" name="product_tag" class="form-control input-create" placeholder="text-null">
									</div>
									<label class="col-md-12" for="example-text">Kiểu vật tư</label>
									<div class="col-md-12">
										<input type="number" id="example-text" name="type" class="form-control input-create" placeholder="int-null">
									</div>
									<label class="col-md-12" for="example-text">Trạng thái</label>
									<div class="col-md-12">
										<input type="number" id="example-text" name="status" class="form-control input-create" placeholder="int-notnull">
									</div>
									<label class="col-md-12" for="example-text">Meta-title</label>
									<div class="col-md-12">
										<input type="text" id="example-text" name="meta_title" class="form-control input-create" placeholder="varchar-null">
									</div>
									<label class="col-md-12" for="example-text">Meta-keywords</label>
									<div class="col-md-12">
										<input type="text" id="example-text" name="meta_keywords" class="form-control input-create" placeholder="text-null">
									</div>
									<label class="col-md-12" for="example-text">Meta-description</label>
									<div class="col-md-12">
										<input type="text" id="example-text" name="meta_description" class="form-control input-create" placeholder="text-null">
									</div>
									<label class="col-md-12" for="example-text">product-tax</label>
									<div class="col-md-12">
										<input type="number" id="example-text" name="product_tax" class="form-control input-create" placeholder="int-notnull" >
									</div>
									<label class="col-md-12" for="example-text">min-stock</label>
									<div class="col-md-12">
										<input type="number" id="example-text" name="product_min_stock" class="form-control input-create" placeholder="int-notnull" >
									</div>
									<label class="col-md-12" for="example-text">max-stock</label>
									<div class="col-md-12">
										<input type="number" id="example-text" name="product_max_stock" class="form-control input-create" placeholder="int-notnull" >
									</div>
									<label class="col-md-12" for="example-text">Chi tiết</label>
									<div class="col-md-12">
										<input type="text" id="example-text" name="product_detail" class="form-control input-create" placeholder="longtext-null">
									</div>
									<label class="col-md-12" for="example-text">Thông số kỹ thuật</label>
									<div class="col-md-12">
										<textarea id="example-text" name="specifications" class="form-control input-create" placeholder="longtext-null"></textarea>
									</div>
								</div>
							</div> 
						</div>
						<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Thêm</button>
						<button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection