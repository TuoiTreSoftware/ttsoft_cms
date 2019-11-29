<div class="card">
	<div class="card-body">
		<form class="pro-add-form" method="POST" id="validation" action="{{ route('admin.promotions.post.add') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="input1">{{ trans('Tên chương trình') }}</label>
				<input type="text" class="form-control" id="name" name="name" autocomplete="off" />
			</div>
			<div class="form-group">
				<label for="input1">{{ trans('Mã giảm') }}</label>
				<div class="input-group">
	                <input type="text" class="form-control" id="code" name="code" autocomplete="off" >
	                <div class="input-group-append">
	                    <button class="btn btn-info btn-genegate" type="button">Tạo mã</button>
	                </div>
	            </div>
			</div>
			<div class="form-group">
				<label for="input3">{{ trans('Type') }}</label>
				<select name="type" class="form-control select2 p-0">
					<option value="1">Khuyến mãi theo giá</option>
					<option value="2">Khuyến mãi theo phần trăm</option>
				</select>
			</div>
			<div class="form-group">
				<label for="input3">{{ trans('Giá trị') }}</label>
				<input type="text" class="form-control" id="value" name="value" autocomplete="off" />
			</div>

			<div class="form-group">
				<lable class="box-title">{{ trans('Ngày bắt đầu') }}</lable>
				<input class="form-control datepicker" type="text" name="start_date" autocomplete="off" />
			</div>
			<div class="form-group">
				<lable class="box-title">{{ trans('Ngày kết thúc') }}</lable>
				<input class="form-control datepicker" type="text" name="end_date" autocomplete="off" />
			</div>
			<div class="form-group row">
				<div class="col-6"><lable class="box-title">{{ trans('Online Only') }}</lable></div>
				<div class="col-6"><input class="form-control" type="radio" name="online" autocomplete="off" value="1" /></div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">
					<i class="fa fa-plus"></i> {{ trans('post::post.add_new') }}
				</button>
			</div>
		</form>
	</div>
</div>
@push('jQuery')
{!! JsValidator::formRequest('TTSoft\Promotions\Http\Requests\Admin\CreateDiscountRequest') !!}
<script type="text/javascript">
	$(function(){
		$('.select2').select2();
		$('body').on('click', '.btn-genegate', function() {
			$.ajax({
				url: '{{ route('admin.promotions.generate.add') }}',
				type: 'GET',
				dataType: 'html'
			})
			.done(function(data) {
				$('input[name=code]').val(data);
			});
		});
		$('.datepicker').datepicker({
			format : 'dd-mm-yyyy',
	        autoclose: true,
	        todayHighlight: true
	    });
	})
</script>
@endpush