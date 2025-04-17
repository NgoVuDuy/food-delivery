@extends('livewire.staff.order-management')

@section('slot')
    <div class="container-fluid table-mt {{ empty($this->shipper_arrays['orders']) ? '' : 'd-none' }}">
        <div class="row">
            <div class="col-12">
                <div class="shipper-order-empty-order shadow">
                    <span class="d-block text-center">Hiện bạn không có đơn hàng nào cần giao</span>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid table-mt {{ empty($this->shipper_arrays['orders']) ? 'd-none' : '' }}">
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
                            <th class="d-none d-lg-table-cell d-md-table-cell">Tổng tiền</th>
                            <th>Thời gian đặt</th>
                            <th>Chi tiết</th>
                            <th>Xác nhận</th>

                        </tr>
                        {{-- <div class="" wire:poll.30s="refreshData"> --}}

                        @foreach ($shipper_orders as $shipper_order)
                            <tr>
                                <td>{{ $shipper_order['id'] }}</td>
                                <td>{{ $shipper_order['payment_method'] }}</td>
                                <td class="d-none d-lg-table-cell d-md-table-cell">{{ $shipper_order['total_price'] }}</td>
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
                                                    <div class="col-lg-8 col-md-8 col-12">
                                                        <div class="card-order-information rounded shadow p-3">

                                                            <p class="card-title">Thông tin đơn hàng</p>

                                                            <div class="d-flex row-gap-2 flex-column">

                                                                @foreach ($shipper_order['order_items'] as $index => $order_item)
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
                                                                            <div
                                                                                class="d-flex flex-column row-gap-4 cart-right-wrap">

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

    <button class="demo">Demo</button>
    <button class="reality">Thực tế</button>


    <div id="container-direction"></div>

    <div class="container-fluid shadow mt-5 container-direction ">
        <div class="row">
            <div class="col-12">
                <div id="direction-map" class="shadow" wire:ignore></div>

            </div>

        </div>

    </div>
@endsection

@script
    <script>
        $(document).ready(function() {

            let user = $wire.$get('user')

            let shipper_lat = null
            let shipper_lng = null
            let shipperMarker = null
            let shipperPopup = null

            let watchID


            var markerHeight = 40,
                markerRadius = 10,
                linearOffset = 25;

            var popupOffsets = {
                'top': [0, 0],
                'top-left': [0, 0],
                'top-right': [0, 0],
                'bottom': [0, -markerHeight],
                'bottom-left': [linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
                'bottom-right': [-linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
                'left': [markerRadius, (markerHeight - markerRadius) * -1],
                'right': [-markerRadius, (markerHeight - markerRadius) * -1]
            };

            // Nếu đang giao hàng
            if (user['shipper']['status'] == 1) {

                // Hiện bản đồ
                $('.container-direction').removeClass('d-none')

                goongjs.accessToken = 'w9SBOdwcQ8M5CWKDP6F5r45arXbKLMflJeCJZmXT';

                var map = new goongjs.Map({
                    container: 'direction-map',
                    style: 'https://tiles.goong.io/assets/goong_map_web.json',
                    center: [105.75005, 10.03202], // Vị trí của shipper
                    zoom: 15
                });

                const location = $wire.$get('location')

                // Tạo marker khách hàng
                new goongjs.Marker({
                        color: "red"
                    })
                    .setLngLat([location['location']['lng'], location['location']['lat']])
                    .addTo(map);

                new goongjs.Popup({
                        offset: popupOffsets,
                        className: 'my-location',
                        closeButton: false,
                        closeOnClick: false
                    })
                    .setLngLat([location['location']['lng'], location['location']['lat']])
                    .setHTML("<span>Khách hàng</span>")
                    .addTo(map);

                $('.demo').on('click', function() {

                    points = $wire.$get('points')
                    let index = 0;

                    // ngưng theo dõi vị trí
                    navigator.geolocation.clearWatch(watchID)

                    let intervalId = setInterval(() => {
                        if (index >= points["points"].length) {
                            clearInterval(intervalId);
                            return;
                        }

                        let point = points["points"][index];
                        let shipper_lat = point[0];
                        let shipper_lng = point[1];

                        $wire.$set('shipper_lat', shipper_lat);
                        $wire.$set('shipper_lng', shipper_lng);
                        $wire.dispatch("updateShipperOrder");

                        index++;
                    }, 2000); // mỗi giây di chuyển một lần

                    console.log(shipper_lat)
                    console.log(shipper_lng)
                    console.log("-----------------")

                    // console.log(points)
                })
                $('.reality').on('click', () => {
                     watchID = navigator.geolocation.watchPosition(

                        (position) => {

                            // Lấy vị trí hiện tại
                            shipper_lat = position.coords.latitude;
                            shipper_lng = position.coords.longitude;

                            // Gán cho biến bên Livewire
                            $wire.$set('shipper_lat', shipper_lat)
                            $wire.$set('shipper_lng', shipper_lng)

                            // Xét sự kiện bên livewire
                            $wire.dispatch("updateShipperOrder")

                            console.log(shipper_lat)
                            console.log(shipper_lng)
                            console.log("-----------------")
                        },

                        (error) => {
                            alert("Không thể lấy vị trí")
                        }



                    );
                })
                // Lấy vị trí của nhân viên giao hàng (Vị trí của tôi)
                 watchID = navigator.geolocation.watchPosition(

                    (position) => {

                        // Lấy vị trí hiện tại
                        shipper_lat = position.coords.latitude;
                        shipper_lng = position.coords.longitude;

                        // Gán cho biến bên Livewire
                        $wire.$set('shipper_lat', shipper_lat)
                        $wire.$set('shipper_lng', shipper_lng)

                        // Xét sự kiện bên livewire
                        $wire.dispatch("updateShipperOrder")

                        console.log(shipper_lat)
                        console.log(shipper_lng)
                        console.log("-----------------")
                    },

                    (error) => {
                        alert("Không thể lấy vị trí")
                    }



                );

                $wire.on('updatedShipperOrder', () => {

                    const points = $wire.$get('points')

                    console.log(points)

                    let geoJSONCoordinates = points["points"].map(coord => [coord[1], coord[0]]);

                    if (map.getSource('route')) {
                        // Nếu đã có nguồn 'route', chỉ cần cập nhật dữ liệu
                        shipperMarker.setLngLat([$wire.$get('shipper_lng'), $wire.$get('shipper_lat')])
                        shipperPopup.setLngLat([$wire.$get('shipper_lng'), $wire.$get('shipper_lat')])

                        map.getSource('route').setData({
                            'type': 'Feature',
                            'properties': {},
                            'geometry': {
                                'type': 'LineString',
                                'coordinates': geoJSONCoordinates
                            }
                        });
                    } else {

                        // Tạo phần tử DOM chứa icon tùy chỉnh
                        var el = document.createElement('div');
                        el.className = 'shipper-marker';
                        el.style.backgroundImage =
                            'url(https://cdn-icons-png.flaticon.com/512/3505/3505989.png)';
                        el.style.width = '50px';
                        el.style.height = '50px';
                        el.style.backgroundSize = 'cover'; // Đảm bảo ảnh không bị co giãn
                        el.style.borderRadius = '50%'; // Làm tròn marker nếu muốn

                        shipperMarker = new goongjs.Marker(el)
                            .setLngLat([$wire.$get('shipper_lng'), $wire.$get('shipper_lat')])
                            .addTo(map);

                        shipperPopup = new goongjs.Popup({
                                offset: popupOffsets,
                                className: 'my-location',
                                closeButton: false,
                                closeOnClick: false
                            })
                            .setLngLat([$wire.$get('shipper_lng'), $wire.$get('shipper_lat')])
                            .setHTML("<span>Bạn ở đây</span>")
                            .addTo(map);



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
                                'line-color': '#4176ff',
                                'line-width': 8
                            }
                        });
                    }
                    map.flyTo({
                        center: [$wire.$get('shipper_lng'), $wire.$get('shipper_lat')],
                        zoom: 15
                    });
                });


            }

        });
    </script>
@endscript
