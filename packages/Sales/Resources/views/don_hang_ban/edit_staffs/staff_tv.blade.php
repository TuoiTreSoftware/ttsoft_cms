<tr style="background-color: #fff" data-id="{{ $staff->getId() }}" class="staff-tv{{$product->getId()}}" id="staff-tv{{$product->getId()}}{{ $staff->getId() }}">
	<td class="text-center">{{ $staff->getId() }}</td>
	<td>{{ $staff->full_name }}</td>
	<td><input type="number" class="form-control" name="product[{{$product->getId()}}][ty_le_tu_van][{{ $staff->getId() }}]" value="{{ $dstv->tyle_hoahong }}" id="tu_van_{{ $staff->getId() }}"></td>
	<td><a href="javascript:void(0)" class="btn btn-sm btn-danger remove_tu_van{{$product->getId()}}" data-id="{{ $staff->getId() }}">Xóa</a></td>
</tr>