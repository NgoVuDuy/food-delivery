@extends('livewire.staff.order-management')

@section('slot')
    <div class="container-fluid {{ empty($this->shipper_arrays['orders']) ? '' : 'd-none' }}">
        <div class="row">
            <div class="col-12">
                <div class="shipper-order-empty-order shadow">
                    <span class="d-block text-center">Hiện bạn không có đơn hàng nào cần giao</span>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid {{ empty($this->shipper_arrays['orders']) ? 'd-none' : '' }}">
        <div class="row">
            <div class="col-12">
                <div class="table-wrap shadow">

                    <div class="shipper-order-bottom">
                        <div class="title">Thông báo</div>
                        <div class="content">Bạn có đơn hàng cần giao. Vui lòng kiểm tra tình trạng đơn hàng và ấn vào
                            <span>Bắt Đầu Giao</span> để nhận chỉ dẫn đường.
                        </div>

                    </div>
                    <table>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Hình thức thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Thời gian đặt</th>
                            <th>Chi tiết</th>
                            <th>Xác nhận</th>

                        </tr>
                        {{-- <div class="" wire:poll.30s="refreshData"> --}}

                        @foreach ($shipper_orders as $shipper_order)
                            <tr>
                                <td>{{ $shipper_order['id'] }}</td>
                                <td>{{ $shipper_order['payment_method'] }}</td>
                                <td>{{ $shipper_order['total_price'] }}</td>
                                <td>{{ $shipper_order['created_at'] }}</td>

                                <td><span class="details-btn" data-bs-toggle="modal"
                                        data-bs-target="#details{{ $shipper_order['id'] }}">Xem chi
                                        tiết</span></td>

                                <td class="checked-wrap">
                                    <div class="conform-btn-wrap {{ $user['shipper']['status'] == 1 ? '' : 'd-none' }}">

                                        <button class="conform-success-btn"
                                            wire:click="success_order({{ $shipper_order['id'] }})">Thành công</button>
                                        <button class="conform-error-btn"
                                            wire:click="fail_order({{ $shipper_order['id'] }})">Thất bại</button>
                                    </div>
                                    <div class="{{ $user['shipper']['status'] == 1 ? 'd-none' : '' }}">

                                        <button class="conform-start-btn"
                                            wire:click="start_delivery({{ $shipper_order['id'] }})">Bắt Đầu Giao</button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade order-details" id="details{{ $shipper_order['id'] }}" tabindex="-1"
                                aria-labelledby="details{{ $shipper_order['id'] }}" aria-hidden="true" wire:ignore.self>
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

                                                                        <span>{{ $shipper_order['place_name'] }}</span>

                                                                    </div>

                                                                </div>

                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex">
                                                                        <span class="title">Từ: </span>

                                                                        <span>{{ $shipper_order['store_location']['name'] }}</span>

                                                                    </div>

                                                                </div>

                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex">
                                                                        <span class="title">Tên người nhận: </span>

                                                                        <span>{{ $shipper_order['name'] }}</span>

                                                                    </div>

                                                                </div>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex">
                                                                        <span class="title">Số điện thoại: </span>

                                                                        <span>{{ $shipper_order['phone'] }}</span>
                                                                    </div>

                                                                </div>


                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="col-8">
                                                        <div class="card-order-information rounded shadow p-3">

                                                            <p class="card-title">Thông tin đơn hàng</p>

                                                            <div class="d-flex row-gap-2 flex-column">

                                                                @foreach ($shipper_order['order_items'] as $index => $order_item)
                                                                    <div
                                                                        class="cart-item-wrap d-flex justify-content-between align-items-center">

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
                                                                        {{ $shipper_order['total_price'] }}đ
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

    <div id="container-direction">

    </div>

    <div class="container-fluid shadow mt-5 p-5 container-direction d-none">
        <div class="row">
            <div class="col-8">
                <div id="direction-map" class="shadow"></div>

            </div>

            <div class="col-4">
                <div class="direction-details shadow p-3">
                    <div class="title">
                        <h4>Dẫn đường</h4>
                    </div>

                    @for ($i = 1; $i <= 3; $i++)
                        <div class="desc">

                            <ul>
                                <li>
                                    Bắt đầu đi từ Trần Hoàng Na <span>- Ước tính: (3m - 34 giây)</span>
                                </li>
                                <li>
                                    Quay đầu để vào Trần Hoàng Na <span>- Ước tính: (3m - 34 giây)</span>
                                </li>
                                <li>
                                    Rẽ phải để vào Nguyễn Văn Cừ <span>- Ước tính: (3m - 34 giây)</span>
                                </li>
                            </ul>

                        </div>
                    @endfor
                </div>
            </div>
        </div>

    </div>
@endsection

@script
    <script>
        $(document).ready(function() {

            let user = $wire.$get('user')

            if (user['shipper']['status'] == 1) {

                $('.container-direction').removeClass('d-none')

                goongjs.accessToken = 'w9SBOdwcQ8M5CWKDP6F5r45arXbKLMflJeCJZmXT';

                var map = new goongjs.Map({

                    container: 'direction-map',
                    style: 'https://tiles.goong.io/assets/goong_map_web.json',
                    center: [105.75005, 10.03202],
                    zoom: 15
                });

                const points = $wire.$get('points')
                const location = $wire.$get('location')

                let geoJSONCoordinates = points["points"].map(coord => [coord[1], coord[0]]);

                new goongjs.Marker({
                        color: "#00abed"
                    })
                    .setLngLat([location['location']['lng'], location['location']['lat']])
                    .addTo(map);

                map.on('load', function() {

                    map.addSource('route', {
                        'type': 'geojson',
                        'data': {
                            'type': 'Feature',
                            'properties': {},
                            'geometry': {
                                'type': 'LineString',
                                'coordinates': geoJSONCoordinates
                            }
                        }
                    });

                    map.addLayer({
                        'id': 'route',
                        'type': 'line',
                        'source': 'route',
                        'layout': {
                            'line-join': 'round',
                            'line-cap': 'round'
                        },
                        'paint': {
                            'line-color': '#00abed',
                            'line-width': 8
                        }
                    });
                })

                map.flyTo({
                    center: [location['location']['lng'], location['location']['lat']],
                    zoom: 15,

                });

                window.location.hash = "#container-direction"

            }

            // $('.conform-start-btn').click(function() {

            //     // $('.conform-btn-wrap').removeClass('d-none')

            //     $('.container-direction').removeClass('d-none')

            //     $(this).addClass('d-none')

            //     goongjs.accessToken = 'w9SBOdwcQ8M5CWKDP6F5r45arXbKLMflJeCJZmXT';

            //     var map = new goongjs.Map({

            //         container: 'direction-map',
            //         style: 'https://tiles.goong.io/assets/goong_map_web.json',
            //         center: [105.75005, 10.03202],
            //         zoom: 15
            //     });

            //     points = $wire.$get('points')
            //     let geoJSONCoordinates = points["points"].map(coord => [coord[1], coord[0]]);

            //     console.log(geoJSONCoordinates)

            //     map.on('load', function() {

            //         map.addSource('route', {
            //             'type': 'geojson',
            //             'data': {
            //                 'type': 'Feature',
            //                 'properties': {},
            //                 'geometry': {
            //                     'type': 'LineString',
            //                     'coordinates': geoJSONCoordinates
            //                 }
            //             }
            //         });

            //         map.addLayer({
            //             'id': 'route',
            //             'type': 'line',
            //             'source': 'route',
            //             'layout': {
            //                 'line-join': 'round',
            //                 'line-cap': 'round'
            //             },
            //             'paint': {
            //                 'line-color': '#00abed',
            //                 'line-width': 8
            //             }
            //         });
            //     })

            //     window.location.hash = "#container-direction"
            // })



        })
    </script>
@endscript
