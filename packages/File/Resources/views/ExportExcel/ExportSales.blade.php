<table>
    <thead>
        <tr>
            <th>Ngày tạo</th>
            <th>Chứng Từ</th>
            <th>Giá Trị</th>
            <th>Khách Hàng</th>
            <th>Kiểu thanh toán</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $key => $val)
        <tr>
            <td>{{ $val->getCreatedAt() }}</td>
            <td>{{ $val->doc_code }}</td>
            <td>{{ format_price($val->sumOrder()) }}đ</td>
            <td>{{ $val->customer->full_name ?? '' }}</td>
            @if($val->payment_method == 'chuyen_khoan_ngan_hang')
            <td>Chuyển khoan</td>
            @else
            <td>Online</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>