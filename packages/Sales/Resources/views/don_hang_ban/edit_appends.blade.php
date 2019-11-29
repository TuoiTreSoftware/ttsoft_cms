<tr class="remove{{ $product->getId() }}">
	<td data-id="{{ $product->getId() }}" class="product-fine-id text-center" >{{ $product->getSku() }}</td>
	<td style="width: 300px;">{{ $product->getTitle() }}<br>Màu: {{ $v->get_color->getTitle() }} - Size: {{ $v->get_size->getTitle() }}</td>
	<td data-price="{{ $v->price }}" class="price-product text-center" id="price{{ $product->getId() }}" data-id="{{ $product->getId() }}">{{ format_price($v->price) }}đ</td>
	<td class="text-center">
		<input type="number" name="product[{{ $product->getId() }}][quanlity]" value="{{ $v->quantity }}" class="form-control quanlity" data-id="{{ $product->getId() }}" style="width: 70px;" minlength=1 id="quanlity{{ $product->getId() }}">
	</td>
	{{-- <td class="text-center">
		<input type="number" name="product[{{ $product->getId() }}][vat]" value="{{ $v->vat }}" class="form-control vat" data-id="{{ $product->getId() }}" style="width: 70px;" minlength=1 id="vat{{ $product->getId() }}">
	</td> --}}
	<td class="sumProduct{{ $product->getId() }} text-center">
		{{ format_price($v->quantity * $v->gia_tri) }}đ
	</td>
	
	<td align="center"><button type="button" class="btn btn-xs btn-danger btn-delete" data-id="{{ $product->getId() }}">Xóa</button></td>
</tr>