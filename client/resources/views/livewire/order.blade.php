<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-12">
                <div class="order-status-wrap" {{-- {{ $status_order == "completed" || $status_order == "cancelled" ? wire:poll.20s="reset_data" }} --}}
                    @if ($order_status != 'completed' && $order_status != 'cancelled') wire:poll.10s="reset_data" @endif>
                    <div class="order-title mb-4">
                        <p>Đơn hàng</p>
                    </div>
                    <div class="order-status d-flex align-items-center justify-content-center">

                        <div class="approval-icon-wrap status-icon">

                            <svg class="{{ $order_statuses[0] ? 'approval-icon' : '' }}"
                                xmlns="ht tp://www.w3.org/2000/svg" width="1.625rem" height="1.625rem" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-hourglass">
                                <path d="M5 22h14" />
                                <path d="M5 2h14" />
                                <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                                <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                            </svg>

                            <div
                                class="d-none d-lg-flex d-md-flex order-status-box-wrap d-flex align-items-center flex-column">
                                <div class="{{ $order_statuses[0] ? 'arrow-active' : '' }} arrow"></div>
                                <div
                                    class="{{ $order_statuses[0] ? 'active' : '' }} order-status-box d-flex justify-content-center align-items-center">
                                    <span>Chờ xác nhận</span>
                                </div>
                            </div>
                        </div>

                        <div class="process-bar">
                            <div class="{{ $order_statuses[0] ? 'process' : '' }}">

                            </div>
                        </div>

                        <div class="checked-icon-wrap status-icon">

                            <svg class="{{ $order_statuses[1] ? 'approval-icon' : '' }}"
                                xmlns="http://www.w3.org/2000/svg" width="1.625rem" height="1.625rem"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-check">
                                <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                                <path d="m9 14 2 2 4-4" />
                            </svg>

                            <div
                                class="d-none d-lg-flex d-md-flex order-status-box-wrap d-flex align-items-center flex-column">
                                <div class="{{ $order_statuses[1] ? 'arrow-active' : '' }} arrow"></div>
                                <div
                                    class="{{ $order_statuses[1] ? 'active' : '' }} order-status-box d-flex justify-content-center align-items-center">
                                    <span>Đang chuẩn bị</span>
                                </div>
                            </div>

                        </div>

                        <div class="process-bar">
                            <div class="{{ $order_statuses[1] ? 'process' : '' }}">

                            </div>
                        </div>

                        <div class="cooking-icon-wrap status-icon">

                            <svg class="{{ $order_statuses[2] ? 'approval-icon' : '' }}"
                                xmlns="http://www.w3.org/2000/svg" width="1.625rem" height="1.625rem"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cooking-pot">
                                <path d="M2 12h20" />
                                <path d="M20 12v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8" />
                                <path d="m4 8 16-4" />
                                <path
                                    d="m8.86 6.78-.45-1.81a2 2 0 0 1 1.45-2.43l1.94-.48a2 2 0 0 1 2.43 1.46l.45 1.8" />
                            </svg>

                            <div
                                class="d-none d-lg-flex d-md-flex order-status-box-wrap d-flex align-items-center flex-column">
                                <div class="{{ $order_statuses[2] ? 'arrow-active' : '' }} arrow"></div>
                                <div
                                    class="{{ $order_statuses[2] ? 'active' : '' }} order-status-box d-flex justify-content-center align-items-center">
                                    <span>Đã sẵn sàng</span>
                                </div>
                            </div>


                        </div>

                        <div class="process-bar">
                            <div class="{{ $order_statuses[2] ? 'process' : '' }}">

                            </div>
                        </div>

                        <div class="delivery-icon-wrap status-icon">

                            <svg class="{{ $order_statuses[3] ? 'approval-icon' : '' }}"
                                xmlns="http://www.w3.org/2000/svg" width="1.625rem" height="1.625rem"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-bike-icon lucide-bike">
                                <circle cx="18.5" cy="17.5" r="3.5" />
                                <circle cx="5.5" cy="17.5" r="3.5" />
                                <circle cx="15" cy="5" r="1" />
                                <path d="M12 17.5V14l-3-3 4-3 2 3h2" />
                            </svg>

                            <div
                                class="d-none d-lg-flex d-md-flex order-status-box-wrap d-flex align-items-center flex-column">
                                <div class="{{ $order_statuses[3] ? 'arrow-active' : '' }} arrow"></div>
                                <div
                                    class="{{ $order_statuses[3] ? 'active' : '' }} order-status-box d-flex justify-content-center align-items-center">
                                    <span>Đang giao hàng</span>
                                </div>
                            </div>

                        </div>

                        <div class="process-bar">
                            <div class="{{ $order_statuses[3] ? 'process last-process' : '' }}">

                            </div>
                        </div>

                        <div class="home-icon-wrap status-icon">

                            <svg class="{{ $order_statuses[4] ? 'approval-icon' : '' }}"
                                xmlns=" http://www.w3.org/2000/svg" width="1.625rem" height="1.625rem"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                <path
                                    d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>

                            <div
                                class="d-none d-lg-flex d-md-flex order-status-box-wrap d-flex align-items-center flex-column">
                                <div class="{{ $order_statuses[4] ? 'arrow-active' : '' }} arrow"></div>
                                <div
                                    class="{{ $order_statuses[4] ? 'active' : '' }} order-status-box d-flex justify-content-center align-items-center">
                                    <span>Giao thành công</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="tag-wrap">

                    <div class="order-status-text">

                        <p class="{{ $order_status == 'pending' ? '' : 'd-none' }}">Chờ xác nhận</p>
                        <p class="{{ $order_status == 'preparing' ? '' : 'd-none' }}">Bếp đang thực hiện món</p>
                        <p class="{{ $order_status == 'ready' ? '' : 'd-none' }}">Chờ giao đến bạn</p>
                        <p class="{{ $order_status == 'delivering' ? '' : 'd-none' }}">Đơn hàng đang giao tới bạn</p>
                        <p class="{{ $order_status == 'completed' ? '' : 'd-none' }}">Giao hàng thành công</p>
                        <p class="{{ $order_status == 'cancelled' ? '' : 'd-none' }}">Giao hàng thất bại</p>


                    </div>

                </div>

            </div>
            {{-- End --}}
            <div class="col-lg-4 col-md-4 col-12">

                <div class="card-wrap">

                    <div class="card-user-information rounded shadow p-3">

                        <div class="card-delivery-title">
                            <p class="card-title">Thông tin người nhận</p>
                        </div>

                        <div class="d-flex flex-column row-gap-3 wrap">

                            <div class="card-delivery-address d-flex">
                                <span class="title">Giao đến: </span>

                                <div class="d-flex justify-content-between align-items-center column-gap-1">

                                    <span>{{ $order['place_name'] }}</span>

                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class="title">Từ: </span>

                                    <span>{{ $order['store_location']['name'] }}</span>

                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class="title">Tên người nhận: </span>

                                    <span>{{ $order['name'] }}</span>

                                </div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class="title">Số điện thoại: </span>

                                    <span>{{ $order['phone'] }}</span>
                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class="title">Thanh toán: </span>

                                    <span>{{ $order['payment_method'] }}</span>
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="card-item-delivery-man rounded shadow p-3 mt-5 d-none">

                        <div class="delivery-man-info ">

                            <div class="d-flex flex-column row-gap-3">
                                <div class="d-flex align-items-center column-gap-3">
                                    <img class="" src="" alt="">
                                    <span class="delivery-man-name">Null</span>
                                </div>

                                <div id="chat-box-btn" class="delivery-man-chat d-flex align-items-center rounded-2">
                                    <div class="icon rounded-start-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-message-circle">
                                            <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                                        </svg>

                                        <div
                                            class="chat-box-number rounded-circle d-flex justify-content-center align-items-center">
                                            <span>3</span>
                                        </div>
                                    </div>

                                    <div class="text rounded-end-2">
                                        <span>Chat với nhân viên giao hàng</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div id='map' class="mt-5" wire:ignore></div>
            </div>

        </div>

        <div id="chat-box" class="delivery-man-contact d-none">
            <div class="chat-box bg-light shadow">
                <div class="delivery-man-info d-flex align-items-center justify-content-between">

                    <div class="d-flex align-items-center">

                        <img src="" alt="" class="rounded-circle">

                        <div class="delivery-man-name">NGÔ VŨ DUY</div>

                    </div>

                    <div id="close-chat-box-btn" class="x-btn">

                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-x">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>

                    </div>
                </div>

                <div class="message-container mb-4">

                    @for ($i = 1; $i <= 5; $i++)
                        <div class="row justify-content-start">
                            <div class="col-10 message-delivery-mand d-flex justify-content-start mt-4">
                                <div class="message-item">Đơn hàng của bạn đang được giao. Vui lòng kiểm tra tin
                                    nhắn</div>
                            </div>
                        </div>
                        <div class="row justify-content-end mt-4">
                            <div class="col-10 message-customer d-flex justify-content-end">
                                <div class="message-item">Cảm ơn bạn</div>
                            </div>
                        </div>
                    @endfor

                </div>

                <div class="message-input">
                    <input class="form-control" type="text" placeholder="Soạn tin nhắn">
                </div>
            </div>
        </div>
    </div>
    {{-- Modal thành công --}}
    <div class="modal fade modal-form modal-success" id="successModal" tabindex="-1" aria-labelledby="successModal"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <span></span>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="success-modal">
                                    <svg class="success-icon" xmlns="http://www.w3.org/2000/svg" width="100"
                                        height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-circle-check-icon lucide-circle-check">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="m9 12 2 2 4-4" />
                                    </svg>
                                    <p class="title">Giao hàng thành công</p>
                                    <p class="desc">Cảm ơn bạn đã tin tưởng và mua hàng tại chi nhánh của chúng
                                        tôi</p>
                                    {{-- <button class="cold-button" wire:click="">Trở về</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="aws-button" data-bs-dismiss="modal">Hủy Bỏ</button> --}}

                    <button type="submit" class="cold-button" wire:click="back_home">Về trang chủ</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal thất bại --}}
    <div class="modal fade modal-form modal-success" id="errorModal" tabindex="-1" aria-labelledby="errorModal"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <span></span>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="success-modal">
                                    <svg class="error-icon" xmlns="http://www.w3.org/2000/svg" width="100"
                                        height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-circle-x-icon lucide-circle-x">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="m15 9-6 6" />
                                        <path d="m9 9 6 6" />
                                    </svg>
                                    <p class="title">Giao hàng thất bại</p>
                                    <p class="desc">Xin lỗi vì đã mang lại trải nghiệm không tốt cho khách hàng</p>
                                    {{-- <button class="cold-button" wire:click="">Trở về</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="aws-button" data-bs-dismiss="modal">Hủy Bỏ</button> --}}

                    <button type="submit" class="cold-button" wire:click="back_home">Về trang chủ</button>
                </div>
            </div>
        </div>
    </div>

</div>

@script
    <script>
        $(document).ready(function() {


            let width = 0
            let intervalID

            function updateProcessBar() {

                width = width + 25

                $('.process').last().css('width', width + "%")

                if (width == 100) {
                    width = 0
                }

                // if ($('.process').last().hasClass('last-process')) {
                //     clearInterval(intervalID)
                // }
            }

            if (!($wire.$get('order_status') == 'completed' || $wire.$get('order_status') == 'cancelled')) {

                intervalID = setInterval(
                    updateProcessBar, 1000);

            }

            $wire.on('completedOrder', () => {

                // clearInterval(intervalID)

                const myModal = new bootstrap.Modal('#successModal')
                myModal.show();

            })

            $wire.on('cancelledOrder', () => {

                // clearInterval(intervalID)

                const myModal = new bootstrap.Modal('#errorModal')
                myModal.show();

            })

            console.log(intervalID)

            goongjs.accessToken = 'w9SBOdwcQ8M5CWKDP6F5r45arXbKLMflJeCJZmXT';

            // $infor_delivery = $wire.$get('infor_delivery')

            $customer_lat = $wire.$get('customer_lat')
            $customer_lng = $wire.$get('customer_lng')

            let shipper_lat = null
            let shipper_lng = null

            let shipperMarker = null
            let shipperPopup = null

            let map = new goongjs.Map({
                container: 'map',
                style: 'https://tiles.goong.io/assets/goong_map_web.json',
                center: [$customer_lng, $customer_lat], //[lng,lat]
                zoom: 15,
            });

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

            // marker của người nhận hàng
            new goongjs.Marker({
                    color: "red"
                })
                .setLngLat([$customer_lng, $customer_lat])
                .addTo(map);

            // popup của người nhận hàng
            new goongjs.Popup({
                    offset: popupOffsets,
                    className: 'my-location',
                    closeButton: false,
                    closeOnClick: false
                })
                .setLngLat([$customer_lng, $customer_lat])
                .setHTML("<span>Bạn ở đây</span>")
                .addTo(map);

            // lấy ra trạng thái đơn hàng
            // let order_status = $wire.$get('order_status')

            // if (order_status == 'delivering') {

            //     points = $wire.$get('points')
            //     shipper = $wire.$get('shipper')

            //     geoJSONCoordinates = points["points"].map(coord => [coord[1], coord[0]]);

            //     // map.on('load', () => {

            //     if (map.getSource('route')) {
            //         // Nếu đã có nguồn 'route', chỉ cần cập nhật dữ liệu

            //         shipperMarker.setLngLat([shipper["longitude"], shipper["latitude"]])
            //         shipperPopup.setLngLat([shipper["longitude"], shipper["latitude"]])

            //         map.getSource('route').setData({
            //             'type': 'Feature',
            //             'properties': {},
            //             'geometry': {
            //                 'type': 'LineString',
            //                 'coordinates': geoJSONCoordinates
            //             }
            //         });
            //     } else {

            //         // $('#map').css('height', '500px')

            //         // Tạo phần tử DOM chứa icon tùy chỉnh
            //         var el = document.createElement('div');
            //         el.className = 'shipper-marker';
            //         el.style.backgroundImage =
            //             'url(https://cdn-icons-png.flaticon.com/512/3505/3505989.png)';
            //         el.style.width = '50px';
            //         el.style.height = '50px';
            //         el.style.backgroundSize = 'cover'; // Đảm bảo ảnh không bị co giãn
            //         el.style.borderRadius = '50%'; // Làm tròn marker nếu muốn

            //         shipperMarker = new goongjs.Marker(el)
            //             .setLngLat([shipper["longitude"], shipper["latitude"]])
            //             .addTo(map);

            //         shipperPopup = new goongjs.Popup({
            //                 offset: popupOffsets,
            //                 className: 'my-location',
            //                 closeButton: false,
            //                 closeOnClick: false
            //             })
            //             .setLngLat([shipper["longitude"], shipper["latitude"]])
            //             .setHTML("<span>Người giao hàng</span>")
            //             .addTo(map);

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
            //                 'line-color': '#4176ff',
            //                 'line-width': 8
            //             }
            //         });


            //     }
            //     map.flyTo({
            //         center: [shipper["longitude"], shipper["latitude"]],
            //         zoom: 15,

            //     });
            // }

            $wire.on('updatedShipperLocation', () => {

                points = $wire.$get('points')
                shipper = $wire.$get('shipper')

                geoJSONCoordinates = points["points"].map(coord => [coord[1], coord[0]]);

                // map.on('load', () => {

                if (map.getSource('route')) {
                    // Nếu đã có nguồn 'route', chỉ cần cập nhật dữ liệu

                    shipperMarker.setLngLat([shipper["longitude"], shipper["latitude"]])
                    shipperPopup.setLngLat([shipper["longitude"], shipper["latitude"]])

                    map.getSource('route').setData({
                        'type': 'Feature',
                        'properties': {},
                        'geometry': {
                            'type': 'LineString',
                            'coordinates': geoJSONCoordinates
                        }
                    });
                } else {

                    // $('#map').css('height', '500px')

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
                        .setLngLat([shipper["longitude"], shipper["latitude"]])
                        .addTo(map);

                    shipperPopup = new goongjs.Popup({
                            offset: popupOffsets,
                            className: 'my-location',
                            closeButton: false,
                            closeOnClick: false
                        })
                        .setLngLat([shipper["longitude"], shipper["latitude"]])
                        .setHTML("<span>Người giao hàng</span>")
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
                    center: [shipper["longitude"], shipper["latitude"]],
                    zoom: 15,

                });
                // })
            })
        })
    </script>
@endscript
