<tr class="remove{{ $product->getId() }}">
	<td data-id="{{ $product->getId() }}" class="product-fine-id text-center" >{{ $product->getSku() }}</td>
	<td style="width: 300px;">{{ $product->getTitle() }}</td>
	<td data-price="{{ $product->getPriceCurrently() }}" class="price-product text-center" id="price{{ $product->getId() }}" data-id="{{ $product->getId() }}">{{ format_price($product->getPriceCurrently()) }}đ</td>
	<td class="text-center">
		<input type="number" name="product[{{ $product->getId() }}][quanlity]" value="1" class="form-control quanlity" data-id="{{ $product->getId() }}" style="width: 70px;" minlength=1 id="quanlity{{ $product->getId() }}">
	</td>
	<td class="text-center">
		<input type="number" name="product[{{ $product->getId() }}][vat]" value="{{ $product->getVat() }}" class="form-control vat" data-id="{{ $product->getId() }}" style="width: 70px;" minlength=1 id="vat{{ $product->getId() }}">
	</td>
	<td class="sumProduct{{ $product->getId() }} text-center">
		{{ format_price($product->getPriceVAT()) }}đ
	</td>
	
	<td align="center"><button type="button" class="btn btn-xs btn-danger btn-delete" data-id="{{ $product->getId() }}">Xóa</button></td>
</tr>