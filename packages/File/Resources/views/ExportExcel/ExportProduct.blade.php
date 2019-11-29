<table>
    <thead>
        <tr>
            <th>Ngày tạo</th>
            <th>Tên sản phẩm</th>
            <th>SKU</th>
            <th>Giá</th>
            <th>Danh mục</th>
            <th>Tình trạng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $key => $val)
        <tr>
            <td>{{ $val->created_at }}</td>
            <td>{{ $val->title }}</td>
            <td>{{ $val->sku }}</td>
            <td>{{ $val->price_sale }}</td>
            <td>{{ getCategoryLang($val->category->id) }}</td>
            @if($val->status == 1)
            <td>Enabled</td>
            @else
            <td>Disabled</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>