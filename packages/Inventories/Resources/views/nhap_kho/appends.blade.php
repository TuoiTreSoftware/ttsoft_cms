<tr class="remove{{ $product->getId() }}" style="text-align: center;">
	<td data-id="{{ $product->getId() }}" class="product-fine-id text-center" >
		{{ $product->getSku() }}
		<input type="" name="doc_details[{{ $product->getId() }}][product_id]" value="{{ $product->getId() }}" readonly class="d-none">
	</td>
	<td style="width: 300px;">{{ $product->getTitle() }}</td>
	<td data-price="{{ $product->getPriceCurrently() }}" class="price-product text-center" id="price{{ $product->getId() }}" data-id="{{ $product->getId() }}">

		{{ format_price($product->getPriceCurrently()) }}đ

		<input type="number" name="doc_details[{{ $product->getId() }}][price]" value="{{ $product->price }}" readonly class="d-none" id="price{{ $product->getId() }}">

	</td>
	<td class="text-center">

		<input type="number" name="doc_details[{{ $product->getId() }}][quantity]" value="1" class="form-control quanlity" data-id="{{ $product->getId() }}" style="width: 70px;" minlength=1 id="quanlity{{ $product->getId() }}">

	</td>
	<td class="text-center">
		<input type="number" name="doc_details[{{ $product->getId() }}][vat]" readonly="" value="{{ $product->getVat() }}" class="form-control vat" data-id="{{ $product->getId() }}" style="width: 70px;" minlength=1 id="vat{{ $product->getId() }}">
	</td>
	<td class="sumProduct{{ $product->getId() }} text-center">

		<input value="{{ format_price($product->getPriceCurrently() * 1 * ($product->getVat() / 100 + 1)) }}đ" name="gia_tri_vat_1" class="gia-tri-vat{{ $product->getId() }}" id="gia-tri-vat-1-{{ $product->getId() }}" readonly="" style="text-align: center; border: none;">

		<input value="{{ $product->getPriceCurrently() * 1 * ($product->getVat() / 100 + 1) }}" name="doc_details[{{ $product->getId() }}][gia_tri_vat]" class=" d-none gia-tri-vat{{ $product->getId() }}" id="gia-tri-vat{{ $product->getId() }}" readonly="" style="text-align: center; border: none;">

		<input type="" value="{{ $product->getPriceCurrently() * 1  }}" name="doc_details[{{ $product->getId() }}][gia_tri]" class="d-none gia-tri{{ $product->getId() }}">

		
	</td>
	<td align="center"><button type="button" class="btn btn-xs btn-danger btn-delete" data-id="{{ $product->getId() }}">Xóa</button></td>
</tr>