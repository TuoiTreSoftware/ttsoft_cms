<div class="card">
	<div class="card-header bg-info">
	    <h4 class="m-b-0 text-white">{{ trans('post::category.creat_cate') }}</h4>
	</div>
	<div class="card-body">
		<form class="pro-add-form" method="POST" action="{{ route('admin.post-categories.post.add') }}" id="validation">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="input1">{{ trans('post::category.cate_name') }}</label>
				<input type="text" class="form-control" id="name" name="name" value="{{  old('name') }}">
			</div>
			<div class="form-group" style="display: none;">
				<label for="input3">{{ trans('post::category.cate_slug') }}</label>
				<input type="text" class="form-control" name="slug" value="{{  old('slug') }}">
			</div>
			<div class="form-group">
				<label for="input6">{{ trans('post::category.cate_parent') }}</label>
				<select class="form-control p-0 select2" id="parent_id" name="parent_id">
					<option value="0">Parent Categories</option>
					@foreach($cateParents as $cate)
						<option @if(old('parent_id') == $cate->getId()) @endif value="{{ $cate->getId() }}">
							{{ $cate->getTitle() }}
						</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="input7">{{ trans('post::category.cate_desrciption') }}</label>
				<textarea class="form-control" rows="4" id="description" name="meta_description"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info waves-effect waves-light m-r-10"><i class="fa fa-plus"></i> {{ trans('post::post.add_new') }}</button>
			</div>
		</form>
	</div>
</div>
@push('jQuery')
	{!! JsValidator::formRequest('TTSoft\Post\Http\Requests\Admin\Category\CateCreateRequest') !!}
	<script type="text/javascript">
		$(function(){
			$('.select2').select2();
		})
	</script>
@endpush