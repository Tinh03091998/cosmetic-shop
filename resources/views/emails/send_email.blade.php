<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill Information</title>
</head>
<body>
<div style="border: 1px dotted forestgreen;">
    <h3 align="center">Customer's Information</h3>
    Họ tên:{{$hoten}} <br>
{{--    Sđt:{{ $data['phone'] }} <br>--}}
{{--    email: {{ $data['email'] }} <br>--}}
{{--    địa chỉ : {{ $data['address'] }}--}}
</div>
<table style="width: 100%;" >
    <thead style="background-color: cornflowerblue;">
    <tr>
        <th>Mã Sản phẩm</th>
        <th>Tên Sản Phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>
    </thead>
    <tbody>
{{--    @foreach ($data['show-order']->order as $row)--}}
{{--        <tr>--}}
{{--            <td>{{ $row->id }}</td>--}}
{{--            <td>{{ $row->name }}:--}}
{{--                @foreach ($row->attr as $value)--}}
{{--                    {{ $value->name }}:{{ $value->value }}--}}
{{--                @endforeach--}}
{{--            </td>--}}
{{--            <td>{{ $row->quantity }}</td>--}}
{{--            <td>{{ number_format($row->price,0,'','.') }} đ</td>--}}
{{--            <td>{{ number_format($row->quantity*$row->price,0,'','.') }} đ</td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
    <tr style="font-size: 30px; font-weight: bold; color: red;">
        <td >Tổng tiền</td>
{{--        <td  colspan="4" align="right">{{ $data['total'] }} VNĐ</td>--}}
    </tr>
    </tbody>
</table>
<p align="center" style="font-weight: bold;">Cảm ơn bạn đã mua hàng của chúng tôi</p>
</body>
</html>
