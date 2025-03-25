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
                        @foreach ($pending_orders as $pending_order)
                            <tr>
                                <td>{{ $pending_order['id'] }}</td>
                                <td>{{ $pending_order['payment_method'] }}</td>
                                <td>{{ $pending_order['total_price'] }}</td>
                                <td>{{ $pending_order['created_at'] }}</td>
                                <td>xem chi tiết</td>
                                <td><button wire:click="pending_conform({{ $pending_order['id'] }})">duyệt</button></td>

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
