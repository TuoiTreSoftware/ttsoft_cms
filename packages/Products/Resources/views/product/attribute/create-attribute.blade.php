{{-- Thuộc tính sản phẩm --}}
{{-- @foreach($attributes as $key => $value)
	@php 
		$childAttr = \TTSoft\Products\Entities\Attribute::selectRaw('title')->where(['parent_id' => $value->id, 'status' => 1])->pluck('title')->toArray();
		dd($childAttr);
	@endphp
@endforeach --}}
<div class="card">
	<div class="card-header bg-default">
        <h4 class="m-b-0 text-black" style="float: left;">{{ trans('Thuộc tính sản phẩm') }}</h4>
        <a href="javascript:void(0)" style="float: right; margin-top: 2px;" class="add-attribute"><strong>Thêm thuộc tính</strong></a>
    </div>
    <div class="card-body">
    	<div class="ui-type-container">
            <p>Thêm mới thuộc tính giúp sản phẩm có nhiều lựa chọn, như kích cỡ hay màu sắc.</p>
        </div>
        <div class="table-responsive table-show-attr" style="display: none;">
			<table class="table table-bordered table-striped table-hover product-overview" id="product-datatables">
				<thead>
					<tr>
						<th class="text-left" style="width: 30%">{{ trans('Tên giá trị') }}</th>
						<th class="text-left" style="width: 60%">{{ trans('Thuộc tính') }}</th>
						<th class="text-left" style="width: 10%">{{ trans('#') }}</th>
					</tr>
				</thead>
				<tbody class="atributes">
					@foreach($attributes as $key => $value)
					@php 
						$childAttr = \TTSoft\Products\Entities\Attribute::selectRaw('title')->where(['parent_id' => $value->id, 'status' => 1])->pluck('title')->toArray();
					@endphp
					{{-- @push('jQuery')
					<script type="text/javascript">
						$('.{{$value->slug}}Attribute').tagsinput({
						  typeahead: {
						    source: [@foreach($childAttr as $a) '{{ $a }}', @endforeach]
						  },
						  freeInput: true
						});
					</script>
					@endpush --}}
						<tr @if($key  > 0) style="display: none;" @endif data-key="{{ $key }}" class="size-show" id="show{{ $key }}">
							<th class="text-left">
								<input type="text" name="" class="form-control" value="{{ $value->title }}" readonly="" >
							</th>
							<th class="text-left" colspan="2">
								<select class="form-control select2 event-add-attributes {{$value->slug}}Attribute" multiple="" id="{{$value->slug}}Attribute">
									@foreach($childAttr as $a)
										<option value="{{ $a }}">{{ $a }}</option>
									@endforeach
								</select>
							</th>
							{{-- <th class="text-left">
								<a href="javascript:void(0)" class="btn btn-danger btn-remove-attr" data-calss="{{$value->slug}}Attribute"><i class="fa fa-trash"></i></a>
							</th> --}}
						</tr>
					@endforeach
					<tr class="js-add-option">
                        <td colspan="3">
                            <button type="button" class="btn btn-info btn-addAttr">Thêm thuộc tính khác</button>
                        </td>
                    </tr>
                    @push('jQuery')
                    <script type="text/javascript">
                    	jQuery(document).ready(function() {
                    		var x = 0;
                    		$("body").on("click",".btn-addAttr",function(){
                    			x++;
                    			$("#show"+x).show();
                    			if (x == {{ count($attributes) - 1 }}) {
	                    			$(this).remove();
	                    		}
                    		});
                    		$("body").on("click",".add-attribute",function(){
                    			$(".table-show-attr").toggle();
                    		});

                    		$("body").on("click",".btn-remove-attr",function(){
                    			x--;
                    			$(this).parent().parent().hide();
                    			var clazz = $(this).attr('data-calss');
                    			$("#"+clazz).val('');
                    		});
                    	});
                    </script>
                    @endpush
				</tbody>
			</table>
		</div>
		<div class="ui-type-container show-datatables" style="display: none;">
            <p>Chỉnh sửa các phiên bản dưới đây để tạo:</p>
        </div>

        {{-- Phiên bản --}}
        <table class="table table-bordered table-striped table-hover product-overview show-datatables" id="show-datatables" style="display: none;">
			<thead>
				<tr>
					<th class="text-left" style="width: 5%">{{ trans('#') }}</th>
					<th class="text-left" style="width: 31%">{{ trans('Phiên bản') }}</th>
					<th class="text-left" style="width: 31%">{{ trans('Giá') }}</th>
					<th class="text-left" style="width: 21%">{{ trans('SKU') }}</th>
					{{-- <th class="text-left" style="width: 20%">{{ trans('Barcode') }}</th> --}}
				</tr>
			</thead>
			<tbody class="edit-attribute"></tbody>
		</table>
    </div>
</div>
@push('jQuery')
<script type="text/javascript">
	$(".event-add-attributes").change(function(event) {
		var colorAttribute = $(".colorAttribute").val();
		var sizeAttribute = $(".sizeAttribute").val();
		console.log(sizeAttribute);
		var appendsAttribute = '';
		if (colorAttribute.length == 0 && sizeAttribute.length == 0) {
			$(".show-datatables").hide();
		}
		else{
			$(".show-datatables").show();
		}
		var x = 0;
		if (colorAttribute.length > 0 && sizeAttribute.length > 0) 
		{
			for (var i = 0; i < colorAttribute.length; i++) {
				for (var j = 0; j < sizeAttribute.length; j++) {
					x++;
					var valueAttr = '<input type="hidden" name="variants['+x+'][size]" class="form-control" value="'+sizeAttribute[j]+'">';
						valueAttr += '<input type="hidden" name="variants['+x+'][color]" class="form-control" value="'+colorAttribute[i]+'">';
					appendsAttribute+='<tr>';
						appendsAttribute+='<th class="text-left">';
							appendsAttribute+=x;
						appendsAttribute+='</th>';
						appendsAttribute+='<th class="text-left">';
							appendsAttribute+=valueAttr+'<span class="tag label label-info">'+colorAttribute[i]+'</span> <span> • </span><span class="tag label label-info">'+sizeAttribute[j]+'</span></th>';
						appendsAttribute+='<th class="text-left">';
							appendsAttribute+='<input type="text" name="variants['+x+'][price]" class="form-control" placeholder="Giá...">';
						appendsAttribute+='</th>';
						appendsAttribute+='<th class="text-left">';
							appendsAttribute+='<input type="text" name="variants['+x+'][sku]" class="form-control" placeholder="Mã sản phẩm">';
						appendsAttribute+='</th>';
						// appendsAttribute+='<th class="text-left">';
						// 	appendsAttribute+='<input type="text" name="variants['+x+'][qty]" class="form-control" placeholder="Barcode">';
						// appendsAttribute+='</th>';
					appendsAttribute+='</tr>';
				}
			}
		}
		else if(colorAttribute.length > 0 && sizeAttribute.length == 0)
		{
			for (var i = 0; i < colorAttribute.length; i++) {
				x++;
				var valueAttr = '<input type="hidden" name="variants['+x+'][color]" class="form-control" value="'+colorAttribute[i]+'">';
				appendsAttribute+='<tr>';
					appendsAttribute+='<th class="text-left">';
						appendsAttribute+=x;
					appendsAttribute+='</th>';
					appendsAttribute+=valueAttr+'<th class="text-left"><span class="tag label label-info">'+colorAttribute[i]+'</span></th>';
					appendsAttribute+='<th class="text-left">';
						appendsAttribute+='<input type="text" name="variants['+x+'][price]" class="form-control" placeholder="Giá...">';
					appendsAttribute+='</th>';
					appendsAttribute+='<th class="text-left">';
						appendsAttribute+='<input type="text" name="variants['+x+'][sku]" class="form-control" placeholder="Mã sản phẩm">';
					appendsAttribute+='</th>';
					// appendsAttribute+='<th class="text-left">';
					// 	appendsAttribute+='<input type="text" name="variants['+x+'][qty]" class="form-control" placeholder="Barcode">';
					// appendsAttribute+='</th>';
				appendsAttribute+='</tr>';
			}
		}
		else if(colorAttribute.length == 0 && sizeAttribute.length > 0)
		{
			for (var j = 0; j < sizeAttribute.length; j++) {
				x++;
				var valueAttr = '<input type="hidden" name="variants['+x+'][size]" class="form-control" value="'+sizeAttribute[j]+'">';
				appendsAttribute+='<tr>';
					appendsAttribute+='<th class="text-left">';
						appendsAttribute+=x;
					appendsAttribute+='</th>';
					appendsAttribute+=valueAttr+'<th class="text-left"><span class="tag label label-info">'+sizeAttribute[j]+'</span></th>';
					appendsAttribute+='<th class="text-left">';
						appendsAttribute+='<input type="text" name="variants['+x+'][price]" class="form-control" placeholder="Giá...">';
					appendsAttribute+='</th>';
					appendsAttribute+='<th class="text-left">';
						appendsAttribute+='<input type="text" name="variants['+x+'][sku]" class="form-control" placeholder="Mã sản phẩm">';
					appendsAttribute+='</th>';
					// appendsAttribute+='<th class="text-left">';
					// 	appendsAttribute+='<input type="text" name="variants['+x+'][barcode]" class="form-control" placeholder="Barcode">';
					// appendsAttribute+='</th>';
				appendsAttribute+='</tr>';
			}
		}
		
		$("tbody.edit-attribute").html(appendsAttribute);
	});
</script>
@endpush