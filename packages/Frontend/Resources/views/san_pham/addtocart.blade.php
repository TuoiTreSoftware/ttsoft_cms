<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Cảm ơn bạn đã chọn mua sản phẩm này</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-sm-12" style="overflow-x:auto;">
			<table class="table cart topmargin-sm table-bordered">
				<thead>
					<tr>
						<th class="cart-product-name">Sản phẩm/ Dịch vụ</th>
						<th class="cart-product-subtotal text-right" style="min-width: 120px">Đơn giá</th>
						<th class="cart-product-quantity" style="min-width: 120px">Số lượng</th>
						<!-- <th class="cart-product-quantity" style="min-width: 120px">VAT</th> -->
						<th class="cart-product-subtotal text-right" style="min-width: 120px">Thành tiền</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@php $sum = 0; @endphp

					@foreach(Cart::content() as $key => $item)
					@php
					$value_vat = ($item->price * $item->options->vat) / 100;
					@endphp
					<!-- Cart item -->
					<tr class="cart_item" id="product-{{ $item->rowId }}">
						<td class="cart-product-name">
							<a href="{{ $item->options->url }}">
								{{ $item->name }}
							</a>
							<p>
								Size : {{ \TTSoft\Products\Entities\Attribute::find($item->options->size) ? \TTSoft\Products\Entities\Attribute::find($item->options->size)->title : 'Chưa chọn' }} - 
								Màu : {{ \TTSoft\Products\Entities\Attribute::find($item->options->color) ? \TTSoft\Products\Entities\Attribute::find($item->options->color)->title : 'Chưa chọn' }}
							</p>
						</td>
						<td class="cart-product-subtotal text-right">
							<span class="amount">{{ format_price($item->price) }}đ</span>
						</td>
						<td class="cart-product-quantity" style="width: 200px">
							<div class="quantity clearfix ">
								<p>{{ $item->qty }}</p>
								<!-- <input type="button" value="-" class="plus" >
								<input type="number" name="quantity" value="{{ $item->qty }}" class="qty number cart-update soluong" data-rowId="{{ $item->rowId }}">
								<input type="button" value="+" class="plus" > -->
							</div>
						</td>
						{{-- <td class="cart-product-quantity">
							<div class="quantity clearfix">
								<input type="number" name="vat" value="{{ $item->options->vat }}" class="qty vat" readonly="">
							</div>
						</td> --}}
						<td class="cart-product-subtotal text-right">
							<span class="amount" id="change-{{ $item->rowId }}">{{ format_price(($item->price) * $item->qty) }}đ</span>
						</td>
						<td><a href="javascript:void(0)" class="clear-item btn-remove" data-rowId="{{ $item->rowId }}"><i class="fa fa-times"></i></a></td>
					</tr>
					@php 
					$sum+= ($item->price) * $item->qty;
					@endphp
					@endforeach

					@push('js')
					<script type="text/javascript">

						$("body").on("change",".cart-update",function(event){
							var rowId = $(this).attr('data-rowId');
							var qty = $(this).val();
							$.ajax({
								url: '{{ route('web.account.post.updateCart') }}',
								type: 'POST',
								dataType: 'json',
								data: {rowId: rowId ,_token : '{{ csrf_token() }}',qty : qty },
							})
							.done(function(data) {
								$(".quantity-count").text(data.sl);
								$("#change-"+rowId).html(data.price_new  + 'đ');
								$(".sup-total-order , .total-order").html(data.total  + 'đ');
							})
							.fail(function(data) {
								console.log(data);
							});
						});


						$("body").on("click",".btn-remove",function(event){
							var confirmRemove = confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?');
							if (!confirmRemove) {
								return confirmRemove;
							}
							var rowId = $(this).attr('data-rowId');
							$.ajax({
								url: '{{ route('web.cart.post.removeItem') }}',
								type: 'POST',
								dataType: 'json',
								data: {rowId: rowId ,_token : '{{ csrf_token() }}' },
							})
							.done(function(data) {
								var htmlClear = '<div class="col-lg-12"><p>Chưa có sản phẩm trông giỏ hàng <a href="{{ url('san-pham-khuyen-mai.html') }}">Click</a> ở đây để mua hàng.</p></div>';
								if (data.sl == 0) {
									$(".cart-content").html(htmlClear);
								}
								$(".quantity-count").text(data.sl);
								$(".sup-total-order , .total-order").html(data.total + 'đ');
								$("#product-" + rowId).fadeOut(function(){
									$(this).remove();
								});
							})
							.fail(function(data) {
								console.log(data);
							});
						});

					</script>


					@endpush

					<!-- Cart total -->
					{{-- <tr>
						<td colspan="4">Sub-Total</td>
						<td class="text-right" colspan="2"><span style="font-weight: bold;" class="sup-total-order">{{ format_price($sum) }}đ</span></td>
					</tr> --}}
					<!-- <tr>
						<td colspan="4">Discount: 30</td>
						<td class="text-right" colspan="2"><span style="font-weight: bold;">0đ</span></td>
					</tr> -->
					<tr>
						<td colspan="3">Tổng cộng</td>
						<td class="text-right" colspan="2"><span style="font-weight: bold;" class="total-order">{{ format_price($sum) }}đ</span></td>
					</tr>
				</tbody>

			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 text-right">
			<a href="{{ route('web.product.get.getProductList') }}" class="btn btn-rounded btn-default"> Tiếp tục mua hàng</a>
			<a href="{{ url('checkout/cart') }}" class="btn btn-rounded btn-info"> Xem giỏ hàng</a>
		</div>
	</div>
</div>