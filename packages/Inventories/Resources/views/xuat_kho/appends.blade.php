<tr class="remove{{ $product->getId() }}">
	<td data-id="{{ $product->getId() }}" class="product-fine-id text-center" >
		{{ $product->getSku() }}
		<input type="" name="doc_details[{{ $product->getId() }}][product_id]" value="{{ $product->getId() }}" readonly class="d-none">
	</td>
	<td style="width: 300px;">{{ $product->getTitle() }}</td>
	<td class="text-center">
		<input type="number" name="doc_details[{{ $product->getId() }}][quanlity]" value="1" class="form-control quanlity" data-id="{{ $product->getId() }}" style="width: 70px;" minlength=1 id="quanlity{{ $product->getId() }}">
	</td>
	<td align="center"><button type="button" class="btn btn-xs btn-danger btn-delete" data-id="{{ $product->getId() }}">Xóa</button></td>
</tr>