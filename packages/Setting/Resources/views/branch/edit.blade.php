<div class="card">
	<div class="card-body">
		<h4 class="card-title">{{ trans('post::category.creat_cate') }}</h4>
		<form class="pro-add-form" method="POST" action="">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="input1">{{ trans('Name') }}</label>
				<input type="text" class="form-control" id="name" name="name" value="{{ $cate->name or old('name') }}">
			</div>
			<div class="form-group">
				<label for="input3">{{ trans('Address') }}</label>
				<input type="text" class="form-control" name="address" value="{{  $cate->address or old('address') }}">
			</div>
			<div class="form-group">
				<label for="input3">{{ trans('Provinces') }}</label>
				<select type="text" name="provinces_id"  class="form-control select2" >
					@foreach(get_provinces() as $key => $v)
					@if($v->id == $cate->provinces_id)
					<option value="{{ $v->id }}" selected="">{{ $v->name }}</option>
					@else
					<option value="{{ $v->id }}">{{ $v->name }}</option>
					@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info waves-effect waves-light m-r-10"><i class="fa fa-plus"></i> {{ trans('post::category.update') }}</button>
			</div>
		</form>
	</div>
</div>
@push('jQuery')
	<script type="text/javascript">
		$(function(){
			$('.select2').select2();
		})
	</script>
@endpush