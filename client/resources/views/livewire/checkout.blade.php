<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="container mt-5">


        <div class="row justify-content-center">

            <div class="col-11">
                <div class="row justify-content-between">

                    <div class="col-4">

                        <div class="">

                            <p class="checkout-title">Thanh Toán</p>

                            <div class="checkout-left" wire:ignore>


                                <button class="cod shadow payment-method" wire:click="payment_method('cod')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-banknote">
                                        <rect width="20" height="12" x="2" y="6" rx="2" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M6 12h.01M18 12h.01" />
                                    </svg>
                                    <span>Tiền Mặt</span>

                                </button>

                                <button class="vn-pay shadow payment-method" wire:click="payment_method('vnpay')">
                                    <img src="{{ asset('images/vnpay-logo.jpg') }}" alt="">
                                    <span>VNPAY</span>
                                </button>

                            </div>
                        </div>

                        <div class="checkout-note mt-5">
                            <div class="title">
                                Lưu ý
                            </div>
                            <div class="content">
                                <ul>
                                    <li>Vui lòng chọn phương thức thanh toán.</li>
                                    <li>Tiền mặt: Khách hàng trả tiền mặt cho nhân viên giao hàng sau khi nhận và kiểm
                                        tra hàng.</li>
                                    <li>VNPay: Chuyển khoản trước cho nhà hàng bằng thẻ ATM nội địa.</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-7">

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

                            <div class="card-order-information rounded shadow p-3">

                                <p class="card-title">Thông tin đơn hàng</p>

                                <div class="d-flex row-gap-2 flex-column">

                                    @foreach ($carts['cart_items'] as $index => $cart_items)
                                        <div class="cart-item-wrap d-flex justify-content-between align-items-center">

                                            <div class="cart-item-left d-flex align-items-center">

                                                <div class="checkout-cart-item-img">
                                                    <img src="{{ asset($cart_items['product']['image']) }}"
                                                        alt="" width="60px">
                                                </div>

                                                <div class="cart-item-info d-flex flex-column">

                                                    <div class="cart-item-name">{{ $cart_items['product']['name'] }}
                                                    </div>

                                                    <div class="cart-item-price">{{ $cart_items['total'] }}đ</div>
                                                </div>

                                                @if ($cart_items['has_options'] == 1)
                                                    <div class="options" style="width: 40%">
                                                        <ul>
                                                            <li>- {{ $cart_items['size_option']['name'] }}</li>
                                                            <li>- {{ $cart_items['base_option']['name'] }}</li>
                                                            <li>- {{ $cart_items['border_option']['name'] }}</li>
                                                        </ul>
                                                    </div>
                                                @else
                                                    <div class=""></div>
                                                @endif

                                            </div>

                                            <div class="cart-item-right d-flex align-items-center">
                                                <div class="quantity">
                                                    <span>x{{ $cart_items['quantity'] }}</span>
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
                                            {{ $total }}đ
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <button class="order-btn main-button" wire:click="payment">Tiếp Tục</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@section('js')
    <script>
        $(document).ready(function() {

            $('.payment-method').click(function() {
                $('.payment-method').removeClass('active')
                $(this).addClass('active')
            })
        })
    </script>
@endsection
