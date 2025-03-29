@extends('livewire.staff.order-management')

@section('slot')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="table-wrap shadow">

                    <table>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Hình thức thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Thời gian đặt</th>
                            <th>Chi tiết</th>
                            <th>Duyệt đơn</th>

                        </tr>
                        {{-- <div class="" wire:poll.30s="refreshData"> --}}

                            @foreach ($pending_orders as $pending_order)
                                <tr>
                                    <td>{{ $pending_order['id'] }}</td>
                                    <td>{{ $pending_order['payment_method'] }}</td>
                                    <td>{{ $pending_order['total_price'] }}</td>
                                    <td>{{ $pending_order['created_at'] }}</td>
                                    <td><span class="details-btn" data-bs-toggle="modal" data-bs-target="#details{{ $pending_order['id'] }}">Xem chi
                                            tiết</span></td>
                                    <td class="checked-wrap"><button class="checked-btn"
                                            wire:click="pending_conform({{ $pending_order['id'] }})">Xác nhận</button></td>
    
                                </tr>
    
                                <!-- Modal -->
                                <div class="modal fade order-details" id="details{{ $pending_order['id'] }}" tabindex="-1"
                                    aria-labelledby="details{{ $pending_order['id'] }}" aria-hidden="true" wire:ignore.self>
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
                                                        <div class="col-4">
                                                            <div class="card-user-information rounded shadow p-3">
            
                                                                <div class="card-delivery-title">
                                                                    <p class="card-title">Thông tin người nhận</p>
                                                                </div>
            
                                                                <div class="d-flex flex-column row-gap-3 wrap">
            
                                                                    <div class="card-delivery-address d-flex">
                                                                        <span class="title">Giao đến: </span>
            
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center column-gap-1">
            
                                                                            <span>{{ $pending_order['place_name'] }}</span>
            
                                                                        </div>
            
                                                                    </div>
            
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex">
                                                                            <span class="title">Từ: </span>
            
                                                                            <span>{{ $pending_order['store_location']['name'] }}</span>
            
                                                                        </div>
            
                                                                    </div>
            
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex">
                                                                            <span class="title">Tên người nhận: </span>
            
                                                                            <span>{{ $pending_order['name'] }}</span>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex">
                                                                            <span class="title">Số điện thoại: </span>
            
                                                                            <span>{{ $pending_order['phone'] }}</span>
                                                                        </div>
            
                                                                    </div>
            
            
                                                                </div>
            
                                                            </div>

                                                        </div>
                                                        <div class="col-8">
                                                            <div class="card-order-information rounded shadow p-3">
            
                                                                <p class="card-title">Thông tin đơn hàng</p>
            
                                                                <div class="d-flex row-gap-2 flex-column">
            
                                                                    @foreach ($pending_order['order_items'] as $index => $order_item)
                                                                        <div
                                                                            class="cart-item-wrap d-flex justify-content-between align-items-center">
            
                                                                            <div class="cart-item-left d-flex align-items-center">
            
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
            
                                                                            <div class="cart-item-right d-flex align-items-center">
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
                                                                            {{ $pending_order["total_price"] }}đ
                                                                        </div>
                                                                    </div>
            
                                                                </div>
            
                                                            </div>

                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="cold-button"
                                                    data-bs-dismiss="modal">Đóng</button>
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
