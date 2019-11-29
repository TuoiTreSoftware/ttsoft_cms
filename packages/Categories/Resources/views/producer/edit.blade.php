@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Edit Tình Trạng</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form method="POST" action="{{ route('categories.post.edit',$data->id) }}" id="my-form">
						{{ csrf_field() }}
						 {{-- @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>
                                                {!! $error !!}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif --}}
                                <div class="row">
                                	<div class="form-group col-md-8">
                                		<label for="inputEmail3" class=" control-label col-form-label">Tên danh mục</label>
                                		<input  class="form-control" name="name" placeholder="Tên danh mục" value="{{ $data->name or old('name') }}">
                                	</div>
                                	<div class="form-group col-md-2">
                                		<label for="inputEmail3" class="control-label col-form-label">Danh mục cha</label>
                                		<select class="form-control" name="parent_id">
                                			<option value="0">Chọn danh mục cha</option>
                                			{{ get_category_by_prefix($data->prefix,'','',$data->parent_id) }}
                                		</select>
                                	</div>
                                	<div class="form-group col-md-2">
                                		<label for="inputEmail3" class=" control-label col-form-label">Mã danh mục</label>
                                		<input type="text" readonly="" class="form-control" name="prefix" value="{{ $data->prefix or old('prefix') }}">
                                	</div>
                                	<div class="form-group col-md-12">
                                		<label>Mô tả</label>
                                		<textarea class="form-control" name="description" rows="6" placeholder="Thêm mô tả ...">{{ $data->description or old('description') }}</textarea>
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