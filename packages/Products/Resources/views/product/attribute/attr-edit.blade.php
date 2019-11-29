<div class="card">
	<div class="card-header bg-default">
        <h4 class="m-b-0 text-black" style="float: left;">{{ trans('Thuộc tính sản phẩm') }}</h4>
        <a href="javascript:void(0)" style="float: right; margin-top: 2px;" class="add-attribute"><strong>Thêm thuộc tính</strong></a>
    </div>
    <div class="card-body">
    	<div class="ui-type-container">
            <p>Thêm mới thuộc tính giúp sản phẩm có nhiều lựa chọn, như kích cỡ hay màu sắc.</p>
        </div>
        <button type="button" class="btn btn-info btn-addAttr">Tạo mới thuộc tính</button>
    </div>
    {{-- Phiên bản --}}
    <div class="col-md-12">
    	<table class="table table-bordered table-striped table-hover product-overview show-datatables" id="show-datatables">
			<thead>
				<tr>
					<th class="text-left" style="width: 25%">{{ trans('Phiên bản') }}</th>
					<th class="text-left" style="width: 25%">{{ trans('Giá') }}</th>
					<th class="text-left" style="width: 25%">{{ trans('Giá khuyến mãi') }}</th>
					<th class="text-left" style="width: 20%">{{ trans('SKU') }}</th>
					<th class="text-left" style="width: 5%">{{ trans('#') }}</th>
				</tr>
			</thead>
			<tbody class="edit-attribute">
				@if($attrs)
					@foreach($attrs as $k => $at)
						<tr>
							<td class="text-left" style="width: 25%">
								@foreach(attrs($attributes) as $k1 => $v1)
									@if(!$loop->last)
										<style type="text/css">
											.select2{
												margin-bottom: 5px;
											}
										</style>
									@endif
									{{ $v1['parent']['title'] }} 
									<select name="variants[{{ $k }}][attrs][]">
										@foreach($v1['attrs'] as $k2 => $v2)
											<option @if(($v2['id'] == $at->color_id) || ($v2['id'] == $at->size_id)) selected="" @endif value="{{ $v2['id'] }}">{{ $v2['title'] }}</option>
										@endforeach
									</select>
								@endforeach
							</td>
							<th class="text-left">
					      		<input type="text" name="variants[{{ $k }}][price]" class="form-control" placeholder="Giá..." 
					      		value="{{ $at->attribute_price }}">
					      	</th>
					      	<th class="text-left">
					      		<input type="text" name="variants[{{ $k }}][price_sale]" class="form-control" placeholder="Giảm giá" value="{{ $at->attribute_price_sale }}">
					      	</th>
					      	<th class="text-left">
					      		<input type="text" name="variants[{{ $k }}][sku]" class="form-control" placeholder="SKU" value="{{ $at->attribute_sku }}">
					      	</th>
					      	<th class="text-left">
					      		<a href="javascript:void(0)" class="btn-remove">Remove</a>
					      	</th>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
    </div>
</div>
@push('jQuery')
<script type="text/javascript">
	$(document).ready(function(){
		var x = {{ count($attrs) }};
		$('.btn-addAttr').on("click",function(){
			var html = '';
			$.get('{{ route('admin.product.get.getAllAttrs')}}',function(obj){
				html += '<tr>';
					html += '<td class="text-left">';
					for (var i = 0 ; i < obj.length; i++) {
						html += obj[i].parent.title;
						html += '<select name="variants['+x+'][attrs][]" class="select2attr">';
						for (var j = 0 ; j < obj[i].attrs.length; j++) {
							html += '<option value="'+obj[i].attrs[j].id+'">'+obj[i].attrs[j].title+'</option>';
						}
						html += '</select>';
					}
			      	html += '</td>';
					html += '<td class="text-left">';
			      		html += '<input type="text" name="variants['+x+'][price]" class="form-control" placeholder="Giá..." value="">';
			      	html += '</td>';
			      	html += '<td class="text-left">';
			      		html += '<input type="text" name="variants['+x+'][price_sale]" class="form-control" placeholder="Giảm giá" value="">';
			      	html += '</td>';
			      	html += '<td class="text-left">';
			      		html += '<input type="text" name="variants['+x+'][sku]" class="form-control" placeholder="SKU" value="">';
			      	html += '</td>';
			      	html += '<td class="text-left">';
			      		html += '<a href="javascript:void(0)" class="btn-remove">Remove</a>';
			      	html += '</td>';
		      	html += '</tr>';
		      	console.log(html);
		      	$('.edit-attribute:last').append(html);
		      	$(".select2attr").select2();
			});
			x++;
		});

		$("body").on('click','.btn-remove',function(){
			$(this).parent().parent().remove();
		});
	});
</script>
@endpush