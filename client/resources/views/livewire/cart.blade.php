<div>

    <div class="container mt-5 {{ $isEmptyCart ? 'd-block' : 'd-none' }}">
        <div class="row empty-cart-wrap justify-content-center align-items-center">
            <div class="col-3">

                <img class="empty-cart-img" src="{{ asset('images/sad-emoji.jpg') }}" alt="">
            </div>
            <div class="col-6">
                <div class="right">

                    <p class="empty-cart-title">Giỏ hàng trống</p>
                    <p class="empty-cart-desc">Hiện tại bạn chưa có sản phẩm nào trong giỏ hàng. Hãy xem qua menu của
                        chúng tôi nhé, <span>NVD's Pizzeria</span> có nhiều món ngon lắm !</p>

                    <a href="/menu" wire:navigate.hover><button class="cold-button mt-3">Chọn Món</button></a>

                </div>
            </div>
        </div>
    </div>

    <div class="container {{ $isEmptyCart ? 'd-none' : 'd-block' }} mt-5">

        <div class="row">

            <div class="cart-wrap col-8 rounded p-3">

                <div class="cart-title">
                    <p>Giỏ Hàng<span></span></p>
                </div>

                <div class="row row-gap-3">

                    @foreach ($carts as $index => $cart)
                        <div class="col-12">

                            <div class="cart-item-wrap d-flex justify-content-between align-items-center">
                                <div class="cart-item-left d-flex align-items-center justify-content-between">

                                    <div class="d-flex align-items-center">

                                        <div class="cart-item-img">
                                            <img src="{{ asset($cart['product']['image']) }}" alt="">
                                        </div>

                                        <div class="cart-item-info d-flex flex-column">

                                            <div class="cart-item-name">{{ $cart['product']['name'] }}</div>

                                            <div class="cart-item-price">{{ $cart['total'] }}đ</div>
                                        </div>
                                    </div>
                                    @if (empty($cart['size']) && empty($cart['base']) && empty($cart['border']))
                                        <div class=""></div>
                                    @else
                                        <div class="options">
                                            <ul>
                                                <li>- {{ $cart['size'] }}</li>
                                                <li>- {{ $cart['base'] }}</li>
                                                <li>- {{ $cart['border'] }}</li>
                                            </ul>
                                        </div>
                                    @endif


                                </div>


                                <div class="cart-item-right d-flex align-items-center">

                                    <div class="dish-btn-quantity">
                                        <button class="outline-button" wire:click="decrease({{ $index }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" width="16px" height="16px" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                            </svg>

                                        </button>
                                        <input type="number" name="quantity" id="quantity" min="1"
                                            max="100" value="{{ $default_quantity[$index] }}"
                                            wire:model.live="default_quantity.{{ $index }}">


                                        <button class="outline-button" wire:click="increase({{ $index }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" width="16px" height="16px" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>

                                        </button>
                                    </div>

                                    <button title="Xóa" class="cart-item-delete"
                                        wire:click="delete_cart_item({{ $cart['id'] }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" width="24px" height="24px" stroke="currentColor"
                                            class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </button>



                                </div>
                            </div>
                        </div>

                        <div class="item-separation"></div>
                    @endforeach

                </div>

            </div>
            <div class="col-4">

                <div class="row">
                    <div class="col-12">
                        <div class="card-wrap">

                            <div class="card-user-information rounded shadow p-3">

                                <div class="card-delivery-title">
                                    <p class="card-title">Thông tin người nhận</p>
                                </div>

                                <div class="d-flex flex-column row-gap-3 wrap">

                                    <div class="card-delivery-address">
                                        <span class="title">Giao đến: </span> <br>

                                        <div class="d-flex justify-content-between align-items-center column-gap-1">

                                            @if (empty($delivery_location))
                                                <span class="address">Vui lòng thêm địa chỉ giao hàng</span>
                                            @else
                                                <span>{{ $delivery_location }}</span>
                                            @endif


                                            <div class="card-delivery-address-edit" data-bs-toggle="modal"
                                                data-bs-target="#addressEditModal">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-map-pinned">
                                                    <path
                                                        d="M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0" />
                                                    <circle cx="12" cy="8" r="2" />
                                                    <path
                                                        d="M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712" />
                                                </svg>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">
                                            <span class="title">Tên người nhận: </span>

                                            @if (empty($customer_name))
                                                <span>Vui lòng nhập họ tên</span>
                                            @else
                                                <span>{{ $customer_name }}</span>
                                            @endif

                                        </div>
                                        <span class="edit-text" data-bs-toggle="modal"
                                            data-bs-target="#nameEditModal">Sửa</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">
                                            <span class="title">Số điện thoại: </span>

                                            @if (empty($customer_phone))
                                                <span>Vui lòng nhập số điện thoại</span>
                                            @else
                                                <span>{{ $customer_phone }}</span>
                                            @endif
                                        </div>
                                        <span class="edit-text" data-bs-toggle="modal"
                                            data-bs-target="#phoneEditModal">Sửa</span>
                                    </div>


                                </div>



                            </div>

                            {{-- <div class="card-item-note rounded shadow p-3 mt-5 d-none">

                                <div class="card-item-note-title">
                                    <h6>Ghi chú cho đơn hàng</h6>
                                </div>

                                <div class="card-item-note-input">
                                    <textarea type="text"></textarea>
                                </div>
                            </div>

                            <div class="card-item-2 rounded shadow p-3 mt-5 d-none">

                                <div class="card-item-title">
                                    <h6>Tùy chọn</h6>
                                </div>

                                <div class="card-item-option d-flex justify-content-between align-items-center">
                                    <div class="card-item-option-name">
                                        <p>Lấy dụng cụ ăn uống</p>
                                    </div>

                                    <div class="card-item-option-switch">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-item-option d-flex justify-content-between align-items-center">
                                    <div class="card-item-option-name">
                                        <p>Không lấy tương cà</p>
                                    </div>

                                    <div class="card-item-option-switch">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-item-option d-flex justify-content-between align-items-center">
                                    <div class="card-item-option-name">
                                        <p>Không lấy tương ớt</p>
                                    </div>

                                    <div class="card-item-option-switch">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                        </div>
                                    </div>
                                </div>

                            </div> --}}



                            <div class="card-sum-information rounded shadow p-3">

                                <div class="card-sum d-flex justify-content-between align-items-center">

                                    <div class="card-sum-title">
                                        <p>Tổng cộng</p>
                                    </div>

                                    <div class="card-sum-monney">
                                        <p>{{ $total }}đ</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button class="order-btn main-button mt-3" wire:click="payment">Thanh Toán</button>

                    </div>
                </div>

            </div>
        </div>

        <!-- Modal sua dia chi giao hang -->
        <div class="modal fade modal-delivery-address" id="addressEditModal" tabindex="-1"
            aria-labelledby="addressEditModal" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="">Chọn
                            địa chỉ giao hàng</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="body-delivery-address">

                        <div class="input-wrap" id="input-delivery-address">

                            <input class="form-control" type="search" placeholder="Vui lòng nhập địa chỉ giao hàng"
                                wire:model.live="location_search">

                            <button class="current-location-btn" id="current-location" title="Vị trí của bạn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-locate-fixed">
                                    <line x1="2" x2="5" y1="12" y2="12" />
                                    <line x1="19" x2="22" y1="12" y2="12" />
                                    <line x1="12" x2="12" y1="2" y2="5" />
                                    <line x1="12" x2="12" y1="19" y2="22" />
                                    <circle cx="12" cy="12" r="7" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>

                        <div class="search-result-wrap" id="search-result">

                            @if (!empty($predictions))

                                @foreach ($predictions['predictions'] as $prediction)
                                    <button class="search-result-btn"
                                        wire:click="setLocation('{{ $prediction['description'] }}')">{{ $prediction['description'] }}</button>
                                @endforeach
                            @endif
                        </div>

                        <div id="cart-map" class="d-none"></div>
                        <pre id="coordinates" class="coordinates d-none"></pre>
                    </div>

                    <div class="modal-footer">
                        <div>

                            <button type="button" class="cold-button" id="useMapBtn">Chọn Trên Bản Đồ</button>

                            <button type="button" class="cold-button d-none" id="backMapBtn"
                                wire:click="$refresh">Quay lại</button>

                        </div>
                        <div>

                            {{-- <button type="button" class="aws-button" data-bs-dismiss="modal">Thoát</button> --}}
                            <button type="button" class="cold-button" wire:click="update_location()"
                                data-bs-dismiss="modal" id="update-location-btn">Cập Nhật</button>

                            <button type="button" class="cold-button d-none" id="conform-location-btn">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal sua ten khach hang -->
        <div class="modal fade modal-name" id="nameEditModal" tabindex="-1" aria-labelledby="nameEditModal"
            aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tên người nhận</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input class="form-control" type="search" placeholder="Vui lòng nhập tên người dùng"
                            wire:model.live="customer_name_input">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="aws-button" data-bs-dismiss="modal">Thoát</button>
                        <button type="button" class="cold-button" wire:click="update_customer_name()"
                            data-bs-dismiss="modal">Cập Nhật</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal sua so dien thoai khach hang-->
        <div class="modal fade modal-phone" id="phoneEditModal" tabindex="-1" aria-labelledby="phoneEditModal"
            aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Số điện thoại</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" type="search" placeholder="Vui lòng nhập số điện thoại"
                            wire:model.live="customer_phone_input">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="aws-button" data-bs-dismiss="modal">Thoát</button>
                        <button type="button" class="cold-button" wire:click="update_customer_phone()"
                            data-bs-dismiss="modal">Cập Nhật</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>

@script
    <script>
        $(document).ready(function() {

            let current_latitude
            let current_longitude

            // let marker_latitude
            // let marker_longitude

            // Gọi api lấy vị trí hiện tại
            navigator.geolocation.getCurrentPosition(

                (position) => {


                    current_latitude = position.coords.latitude
                    current_longitude = position.coords.longitude

                    console.log('Vị trí của bạn:', current_latitude, current_longitude);

                    // $wire.$set('latitude', latitude)
                    // $wire.$set('longitude', longitude)

                    // $wire.dispatch('current_location')
                },
                (error) => {
                    console.error('Không thể lấy vị trí:', error);
                }
            );


            // ấn vào option sử dụng bản đồ để chọn địa chỉ giao hàng
            $('#useMapBtn').click(function() {

                // ấn trường input nhập địa chỉ 
                $('#input-delivery-address').addClass('d-none')
                // ẩn nút option sử dụng bản đồ
                $(this).addClass('d-none')
                // ẩn kết quả tìm kiếm
                $('#search-result').addClass('d-none')
                // ẩn nút cập nhât
                $('#update-location-btn').addClass('d-none')


                // Hiển thị đối tượng bản đồ
                $('#cart-map').removeClass('d-none')
                $('#coordinates').removeClass('d-none')

                // Hiện nút quay lại
                $('#backMapBtn').removeClass('d-none')

                // Hiện nút xác nhận
                $('#conform-location-btn').removeClass('d-none')


                var coordinates = document.getElementById('coordinates');

                goongjs.accessToken = 'w9SBOdwcQ8M5CWKDP6F5r45arXbKLMflJeCJZmXT';

                var map = new goongjs.Map({

                    container: 'cart-map',
                    style: 'https://tiles.goong.io/assets/goong_map_web.json',
                    center: [current_longitude, current_latitude],
                    zoom: 13
                });

                marker = new goongjs.Marker({
                        draggable: true
                    })
                    .setLngLat([current_longitude, current_latitude])
                    .addTo(map);

                function onDragEnd() {

                    var lngLat = marker.getLngLat();
                    coordinates.style.display = 'block';
                    coordinates.innerHTML =
                        'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;

                    current_latitude = lngLat.lat
                    current_longitude = lngLat.lng



                }

                marker.on('dragend', onDragEnd);

            })

            $('#backMapBtn').click(function() {

                // hiện trường input nhập địa chỉ 
                $('#input-delivery-address').removeClass('d-none')
                // hiện nút option sử dụng bản đồ
                $(this).removeClass('d-none')
                // hiện kết quả tìm kiếm
                $('#search-result').removeClass('d-none')
                // Hiển thị nút cập nhật
                $('#update-location-btn').removeClass('d-none')

                // ẩn thị đối tượng bản đồ
                $('#cart-map').addClass('d-none')
                $('#coordinates').addClass('d-none')

                // Ẩn nút back
                $(this).addClass('d-none')
                // ẩn nút xác nhận
                $('#conform-location-btn').addClass('d-none')

                //Hiển thị nút chọn bản đồ
                $('#useMapBtn').removeClass('d-none')

            })

            $('#conform-location-btn').click(function() {

                $wire.$set('latitude', current_latitude)
                $wire.$set('longitude', current_longitude)

                $wire.dispatch('current_location')
            } ) 
                
            

            $('#current-location').click(function() {

                navigator.geolocation.getCurrentPosition(

                    (position) => {
                        console.log('Vị trí của bạn:', position.coords.latitude, position.coords
                            .longitude);

                        let latitude = position.coords.latitude
                        let longitude = position.coords.longitude

                        $wire.$set('latitude', latitude)
                        $wire.$set('longitude', longitude)

                        $wire.dispatch('current_location')
                    },
                    (error) => {
                        console.error('Không thể lấy vị trí:', error);
                    }
                );
            })
        })
    </script>
@endscript
