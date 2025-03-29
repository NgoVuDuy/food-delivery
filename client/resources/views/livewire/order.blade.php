<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-8">
                <div class="order-status-wrap" wire:poll.10s="reset_data">
                    <div class="order-title mb-4">
                        <p>Đơn hàng</p>
                    </div>
                    <div class="order-status d-flex align-items-center justify-content-center">

                        <div class="approval-icon-wrap status-icon">

                            <svg class="{{ $order_statuses[0] ? 'approval-icon' : '' }}"
                                xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-hourglass">
                                <path d="M5 22h14" />
                                <path d="M5 2h14" />
                                <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                                <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                            </svg>

                            <div class="order-status-box-wrap d-flex align-items-center flex-column">
                                <div class="{{ $order_statuses[0] ? 'arrow-active' : '' }} arrow"></div>
                                <div
                                    class="{{ $order_statuses[0] ? 'active' : '' }} order-status-box d-flex justify-content-center align-items-center">
                                    <span>Chờ xác nhận</span>
                                </div>
                            </div>
                        </div>


                        <div class="process-bar {{ $order_statuses[0] ? 'bar' : '' }}"></div>

                        <div class="checked-icon-wrap status-icon">

                            <svg class="{{ $order_statuses[1] ? 'approval-icon' : '' }}"
                                xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-clipboard-check">
                                <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                                <path d="m9 14 2 2 4-4" />
                            </svg>

                            <div class="order-status-box-wrap d-flex align-items-center flex-column">
                                <div class="{{ $order_statuses[1] ? 'arrow-active' : '' }} arrow"></div>
                                <div
                                    class="{{ $order_statuses[1] ? 'active' : '' }} order-status-box d-flex justify-content-center align-items-center">
                                    <span>Đang chuẩn bị</span>
                                </div>
                            </div>

                        </div>

                        <div class="process-bar {{ $order_statuses[1] ? 'bar' : '' }}"></div>

                        <div class="cooking-icon-wrap status-icon">

                            <svg class="{{ $order_statuses[2] ? 'approval-icon' : '' }}"
                                xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-cooking-pot">
                                <path d="M2 12h20" />
                                <path d="M20 12v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8" />
                                <path d="m4 8 16-4" />
                                <path
                                    d="m8.86 6.78-.45-1.81a2 2 0 0 1 1.45-2.43l1.94-.48a2 2 0 0 1 2.43 1.46l.45 1.8" />
                            </svg>

                            <div class="order-status-box-wrap d-flex align-items-center flex-column">
                                <div class="{{ $order_statuses[2] ? 'arrow-active' : '' }} arrow"></div>
                                <div
                                    class="{{ $order_statuses[2] ? 'active' : '' }} order-status-box d-flex justify-content-center align-items-center">
                                    <span>Đã sẵn sàng</span>
                                </div>
                            </div>


                        </div>

                        <div class="process-bar {{ $order_statuses[2] ? 'bar' : '' }}"></div>

                        <div class="delivery-icon-wrap status-icon">

                            <svg class="{{ $order_statuses[3] ? 'approval-icon' : '' }}" aria-hidden="true"
                                focusable="false" class="fl-neutral-secondary" width="26" height="26"
                                viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" data-testid="RIDER">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.23752 3.28752C9.23752 3.95027 8.70027 4.48752 8.03752 4.48752C7.37478 4.48752 6.83752 3.95027 6.83752 3.28752C6.83752 2.62478 7.37478 2.08752 8.03752 2.08752C8.70027 2.08752 9.23752 2.62478 9.23752 3.28752ZM6.14386 9.14592C6.00445 8.96508 5.94904 8.72306 6.01506 8.48618L6.86505 5.43618C6.97625 5.03718 7.38985 4.80386 7.78886 4.91506C7.91357 4.94981 8.02209 5.01411 8.10897 5.09826L9.67246 6.11242L11.5377 6.11242C11.8829 6.11242 12.1627 6.39224 12.1627 6.73742C12.1627 7.0826 11.8829 7.36242 11.5377 7.36242H9.48751C9.3668 7.36242 9.24867 7.32746 9.14739 7.26177L8.10235 6.58391L7.63531 8.2598L9.66925 8.36322C9.87995 8.37393 10.071 8.49022 10.1773 8.67244C10.2837 8.85467 10.2909 9.07823 10.1965 9.26693L10.0965 9.46693L10.0947 9.47057L8.54468 12.5206C8.38829 12.8283 8.01206 12.951 7.70434 12.7946C7.39662 12.6382 7.27394 12.262 7.43032 11.9543L8.64567 9.56279L6.65576 9.46161C6.43443 9.45035 6.24586 9.32527 6.14386 9.14592ZM2.53752 4.68752C1.87478 4.68752 1.33752 5.22478 1.33752 5.88752V7.48752C1.33752 8.15027 1.87478 8.68752 2.53752 8.68752H4.13752C4.80027 8.68752 5.33752 8.15027 5.33752 7.48752V5.88752C5.33752 5.22478 4.80027 4.68752 4.13752 4.68752H2.53752ZM4.33752 10.5125C3.74382 10.5125 3.26252 10.9938 3.26252 11.5875C3.26252 12.1812 3.74382 12.6625 4.33752 12.6625C4.93123 12.6625 5.41252 12.1812 5.41252 11.5875C5.41252 10.9938 4.93123 10.5125 4.33752 10.5125ZM2.01252 11.5875C2.01252 10.3035 3.05346 9.26252 4.33752 9.26252C5.62159 9.26252 6.66252 10.3035 6.66252 11.5875C6.66252 12.8716 5.62159 13.9125 4.33752 13.9125C3.05346 13.9125 2.01252 12.8716 2.01252 11.5875ZM11.2625 11.5875C11.2625 10.9938 11.7438 10.5125 12.3375 10.5125C12.9312 10.5125 13.4125 10.9938 13.4125 11.5875C13.4125 12.1812 12.9312 12.6625 12.3375 12.6625C11.7438 12.6625 11.2625 12.1812 11.2625 11.5875ZM12.3375 9.26252C11.0535 9.26252 10.0125 10.3035 10.0125 11.5875C10.0125 12.8716 11.0535 13.9125 12.3375 13.9125C13.6216 13.9125 14.6625 12.8716 14.6625 11.5875C14.6625 10.3035 13.6216 9.26252 12.3375 9.26252Z">
                                </path>
                            </svg>

                            <div class="order-status-box-wrap d-flex align-items-center flex-column">
                                <div class="{{ $order_statuses[3] ? 'arrow-active' : '' }} arrow"></div>
                                <div
                                    class="{{ $order_statuses[3] ? 'active' : '' }} order-status-box d-flex justify-content-center align-items-center">
                                    <span>Đang giao hàng</span>
                                </div>
                            </div>

                        </div>


                        <div class="process-bar {{ $order_statuses[3] ? 'bar' : '' }}"></div>

                        <div class="home-icon-wrap status-icon">

                            <svg class="{{ $order_statuses[4] ? 'approval-icon' : '' }}"
                                xmlns=" http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-house">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                <path
                                    d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>

                            <div class="order-status-box-wrap d-flex align-items-center flex-column">
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
                        <p class="">Chúng tôi đã tiếp nhận đơn hàng của bạn.</p>
                    </div>

                </div>

            </div>
            <div class="col-4">

                <div class="card-wrap">

                    <div class="card-user-information rounded shadow p-3">

                        <div class="card-delivery-title">
                            <p class="card-title">Thông tin người nhận</p>
                        </div>

                        <div class="d-flex flex-column row-gap-3 wrap">

                            <div class="card-delivery-address d-flex">
                                <span class="title">Giao đến: </span>

                                <div class="d-flex justify-content-between align-items-center column-gap-1">

                                    <span>{{ $infor_delivery['to']['place_name'] }}</span>

                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class="title">Từ: </span>

                                    <span>{{ $infor_delivery['from']['store_name'] }}</span>

                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class="title">Tên người nhận: </span>

                                    <span>{{ $infor_delivery['name'] }}</span>

                                </div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class="title">Số điện thoại: </span>

                                    <span>{{ $infor_delivery['phone'] }}</span>
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
</div>

@script
    <script>
        $(document).ready(function() {

            goongjs.accessToken = 'w9SBOdwcQ8M5CWKDP6F5r45arXbKLMflJeCJZmXT';
            $infor_delivery = $wire.$get('infor_delivery')

            // Kinh vĩ độ của người nhận hàng
            $customer_lat = $infor_delivery["to"]["lat"]
            $customer_lng = $infor_delivery["to"]["lng"]

            // Kinh vĩ độ của người giao hàng
            // $store_lat = $infor_delivery["from"]["lat"]; // X
            // $store_lng = $infor_delivery["from"]["lng"]; // X

            let shipper_lat = null
            let shipper_lng = null

            let shipperMarker = null

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

            // marker của người giao hàng
            // let shipperMarker = new goongjs.Marker({
            //         color: "#00abed"
            //     })
            //     .setLngLat([$store_lng, $store_lat])
            //     .addTo(map);

            new goongjs.Popup({
                    offset: popupOffsets,
                    className: 'my-location',
                    closeButton: false,
                    closeOnClick: false
                })
                .setLngLat([$customer_lng, $customer_lat])
                .setHTML("<span>Bạn ở đây</span>")
                .addTo(map);

            // Lấy vị trí của nhân viên giao hàng
            navigator.geolocation.watchPosition((position) => {

                shipper_lat = position.coords.latitude;
                shipper_lng = position.coords.longitude;

                $wire.$set('shipper_lat', shipper_lat)
                $wire.$set('shipper_lng', shipper_lng)

                $wire.dispatch("updateShipperLocation")


                console.log(shipper_lat)
                console.log(shipper_lng)

                console.log("-----------------")

            })

            // new goongjs.Popup({
            //         offset: popupOffsets,
            //         className: 'store-location',
            //         closeButton: false,
            //         closeOnClick: false
            //     })
            //     .setLngLat([$store_lng, $store_lat])
            //     .setHTML("<span>Người Giao Hàng</span>")
            //     .addTo(map);

            $wire.on('updatedShipperLocation', () => {

                points = $wire.$get('points')

                let geoJSONCoordinates = points["points"].map(coord => [coord[1], coord[0]]);

                if (map.getSource('route')) {
                    // Nếu đã có nguồn 'route', chỉ cần cập nhật dữ liệu

                    shipperMarker.setLngLat([$wire.$get('shipper_lng'), $wire.$get('shipper_lat')])

                    map.getSource('route').setData({
                        'type': 'Feature',
                        'properties': {},
                        'geometry': {
                            'type': 'LineString',
                            'coordinates': geoJSONCoordinates
                        }
                    });
                } else {

                    shipperMarker = new goongjs.Marker({
                            color: "#00abed"
                        })
                        .setLngLat([$wire.$get('shipper_lng'), $wire.$get('shipper_lat')])
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
                            'line-color': '#00abed',
                            'line-width': 8
                        }
                    });


                }
                map.flyTo({
                    center: [$wire.$get('shipper_lng'), $wire.$get('shipper_lat')],
                    zoom: 15,

                });


            })

            // let infor_delivery = $wire.$get('infor_delivery')

            // let geoJSONCoordinates = infor_delivery["points"].map(coord => [coord[1], coord[0]]);

            // map.on('load', function() {

            //     map.addSource('route', {
            //         'type': 'geojson',
            //         'data': {
            //             'type': 'Feature',
            //             'properties': {},
            //             'geometry': {
            //                 'type': 'LineString',
            //                 'coordinates': geoJSONCoordinates
            //             }
            //         }
            //     });
            //     map.addLayer({


            //         'id': 'route',
            //         'type': 'line',
            //         'source': 'route',
            //         'layout': {
            //             'line-join': 'round',
            //             'line-cap': 'round'
            //         },
            //         'paint': {
            //             'line-color': '#00abed',
            //             'line-width': 8
            //         }
            //     });
            // })
        })
    </script>
@endscript
