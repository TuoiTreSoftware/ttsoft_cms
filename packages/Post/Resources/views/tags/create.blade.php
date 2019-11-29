<div class="card">
	<div class="card-body">
		<h4 class="card-title">{{ trans('post::tag.creat_tag') }}</h4>
		<form class="pro-add-form" method="POST" action="{{ route('admin.post-tags.post.add') }}" id="validation">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="input1">{{ trans('post::tag.tag_name') }}</label>
				<input type="text" class="form-control" id="input1" name="name" value="{{ old('name') }}">
			</div>
			<div class="form-group">
				<label for="input3">{{ trans('post::tag.tag_slug') }}</label>
				<input type="text" class="form-control" id="input3" name="slug" value="{{ old('slug') }}">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info waves-effect waves-light m-r-10"><i class="fa fa-plus"></i> {{ trans('post::post.add_new') }}</button>
			</div>
		</form>
	</div>
</div>
@push('jQuery')
{!! JsValidator::formRequest('TTSoft\Post\Http\Requests\Admin\Tag\TagCreateReuest') !!}
@endpush