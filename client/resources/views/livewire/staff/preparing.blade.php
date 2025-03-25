@extends('livewire.staff.order-management')

@section('slot')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-wrap">

                    <table>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Hình thức thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Thời gian đặt</th>
                            <th>Chi tiết</th>
                            <th>Duyệt</th>

                        </tr>
                        @foreach ($preparing_orders as $preparing_orders)
                            <tr>
                                <td>{{ $preparing_orders['id'] }}</td>
                                <td>{{ $preparing_orders['payment_method'] }}</td>
                                <td>{{ $preparing_orders['total_price'] }}</td>
                                <td>{{ $preparing_orders['created_at'] }}</td>
                                <td>xem chi tiết</td>
                                <td><button wire:click="preparing_conform({{ $preparing_orders['id'] }})">duyệt</button></td>

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
