@extends('livewire.staff.order-management')

@section('slot')
    <div class="container-fluid table-mt">
        <div class="row">
            <div class="col-12">
                <div class="table-wrap shadow">

                    <table>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Hình thức thanh toán</th>
                            <th class="d-none d-lg-table-cell d-md-table-cell">Tổng tiền</th>
                            <th>Thời gian đặt</th>
                            <th>Người nhận đơn</th>
                            <th>Chi tiết</th>

                        </tr>
                        {{-- <div class="" wire:poll.30s="refreshData"> --}}

                        @foreach ($ready_orders as $ready_order)
                            <tr>
                                <td>{{ $ready_order['id'] }}</td>
                                <td>{{ $ready_order['payment_method'] }}</td>
                                <td class="d-none d-lg-table-cell d-md-table-cell">{{ $ready_order['total_price'] }}</td>
                                <td>{{ $ready_order['created_at'] }}</td>
                                <td class="text-center">{{ $ready_order['shipper']['user']['name'] }}</td>

                                <td><span class="details-btn" data-bs-toggle="modal"
                                        data-bs-target="#details{{ $ready_order['id'] }}">Xem chi
                                        tiết</span></td>


                            </tr>

                            <!-- Modal -->
                            <div class="modal fade order-details" id="details{{ $ready_order['id'] }}" tabindex="-1"
                                aria-labelledby="details{{ $ready_order['id'] }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Chi Tiết Đơn Hàng</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-wrap">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="card-user-information rounded shadow p-3">

                                                            <div class="card-delivery-title">
                                                                <p class="card-title">Thông tin người nhận</p>
                                                            </div>

                                                            <div class="d-flex flex-column row-gap-3 wrap">

                                                                <div class="card-delivery-address d-flex">
                                                                    <span class="title">Giao đến: </span>

                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center column-gap-1">

                                                                        <span>{{ $ready_order['place_name'] }}</span>

                                                                    </div>

                                                                </div>

                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex">
                                                                        <span class="title">Từ: </span>

                                                                        <span>{{ $ready_order['store_location']['name'] }}</span>

                                                                    </div>

                                                                </div>

                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex">
                                                                        <span class="title">Tên người nhận: </span>

                                                                        <span>{{ $ready_order['name'] }}</span>

                                                                    </div>

                                                                </div>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex">
                                                                        <span class="title">Số điện thoại: </span>

                                                                        <span>{{ $ready_order['phone'] }}</span>
                                                                    </div>

                                                                </div>


                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-12">
                                                        <div class="card-order-information rounded shadow p-3">

                                                            <p class="card-title">Thông tin đơn hàng</p>

                                                            <div class="d-flex row-gap-2 flex-column">

                                                                @foreach ($ready_order['order_items'] as $index => $order_item)

                                                                    <div class="col-12 d-lg-none d-md-none d-block">
                                                                        <div class="cart-item-wrap d-flex align-items-end">
                                                                            <div class="cart-item-left"
                                                                                style="width: max-content">

                                                                                <div class="">

                                                                                    <div class="cart-item-img">
                                                                                        <img src="{{ asset($order_item['product']['image']) }}"
                                                                                            alt="">
                                                                                    </div>


                                                                                </div>
                                                                                {{-- @if ($cart_items['has_options'] == 1)
                                                                                <div class="options" style="width: 40%">
                                                                                    <ul>
                                                                                        <li>- {{ $cart_items['size_option']['name'] }}</li>
                                                                                        <li>- {{ $cart_items['base_option']['name'] }}</li>
                                                                                        <li>- {{ $cart_items['border_option']['name'] }}</li>
                                                                                    </ul>
                                                                                </div>
                                                                            @else
                                                                                <div class=""></div>
                                                                            @endif --}}


                                                                            </div>
                                                                            <div class="cart-right-wrap d-flex flex-column row-gap-4">

                                                                                <div
                                                                                    class="cart-item-info d-flex flex-column">

                                                                                    <div class="cart-item-name">
                                                                                        {{ $order_item['product']['name'] }}
                                                                                    </div>

                                                                                    <div class="cart-item-price">
                                                                                        {{ $order_item['total_price'] }}đ
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="cart-item-right d-flex align-items-center justify-content-end">

                                                                                    <div class="quantity">
                                                                                        <span>x{{ $order_item['quantity'] }}</span>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="d-lg-flex d-md-flex d-none cart-item-wrap d-flex justify-content-between align-items-center">

                                                                        <div
                                                                            class="cart-item-left d-flex align-items-center">

                                                                            <div class="checkout-cart-item-img">
                                                                                <img src="{{ asset($order_item['product']['image']) }}"
                                                                                    alt="" width="60px">
                                                                            </div>

                                                                            <div class="cart-item-info d-flex flex-column">

                                                                                <div class="cart-item-name">
                                                                                    {{ $order_item['product']['name'] }}
                                                                                </div>

                                                                                <div class="cart-item-price">
                                                                                    {{ $order_item['total_price'] }}đ</div>
                                                                            </div>

                                                                            @if ($order_item['has_options'] == 1)
                                                                                <div class="options" style="width: 40%">
                                                                                    <ul>
                                                                                        <li>-
                                                                                            {{ $order_item['size_option']['name'] }}
                                                                                        </li>
                                                                                        <li>-
                                                                                            {{ $order_item['base_option']['name'] }}
                                                                                        </li>
                                                                                        <li>-
                                                                                            {{ $order_item['border_option']['name'] }}
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            @else
                                                                                <div class=""></div>
                                                                            @endif

                                                                        </div>

                                                                        <div
                                                                            class="cart-item-right d-flex align-items-center">
                                                                            <div class="quantity">
                                                                                <span>x{{ $order_item['quantity'] }}</span>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="item-separation"></div>
                                                                @endforeach

                                                                <div class="d-flex justify-content-end column-gap-5 pt-3">
                                                                    <div class="sum-title">
                                                                        Tổng cộng:
                                                                    </div>
                                                                    <div class="sum-monney">
                                                                        {{ $ready_order['total_price'] }}
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="cold-button" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- </div> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
