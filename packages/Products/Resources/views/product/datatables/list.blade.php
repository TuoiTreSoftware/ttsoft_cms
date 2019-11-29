<tbody>
	@foreach($products as $key => $val)
	<tr>
		<td class="text-center"><input type="checkbox" class="check" id="minimal-checkbox-1" value="{{$val->id}}"></td>
		<td>{{ $val->getCreatedAt() }}</td>
		<td><a href="{{ $val->getRoute() }}" target="_blank">{{ $val->getTitle() }}</a></td>
		<td><a href="{{ route('products.get.detail',$val->id) }}">{{ $val->sku }}</a></td>
		<td><img src="{{ $val->getImage(50,50) }}" width="50" height="50"></td>
		<td>
			@if($val->price > $val->price_sale && $val->price_sale > 0)
				{{ format_price($val->price_sale) }}đ <br>
				<span style="color: red; text-decoration: line-through;">{{ format_price($val->price) }}đ</span>
			@else
				{{ format_price($val->price) }}đ
			@endif
		</td>
		<td><a href="#">{{ $val->category->title ?? '' }}</a></td>
		<td>
			@foreach(config('base.language') as $lang => $name)
				@if($lang != $ref_lang)
					<a href="{{ route('products.get.edit',$val->id) }}?ref_lang={{ $lang }}" class="tip" data-original-title="Edit related language for this record">
						@if(get_language_product($lang,$val->id) > 0)
                			<i class="fa fa-edit"></i>
                		@else
                			<i class="fa fa-plus"></i>
                		@endif
					</a>
				@else
					<a href="{{ route('products.get.edit',$val->id) }}?ref_lang={{ $lang }}" class="tip" data-original-title="Current record's language">
						<i class="fa fa-check text-success"></i>
					</a>
				@endif
			@endforeach
		</td>
		<td><a href="#">{{ $val->status ? 'Enabled' : 'Disabled' }}</a></td>
		<td>
			<a href="{{ route('products.get.edit',$val->id) }}?ref_lang={{ $ref_lang }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a>
			<a href="{{ route('products.get.delete',$val->id) }}" class="text-dark" title="Delete" data-toggle="tooltip" onclick="return onDelete();"><i class="ti-trash"></i></a></td>
	</tr>
	@endforeach
</tbody>