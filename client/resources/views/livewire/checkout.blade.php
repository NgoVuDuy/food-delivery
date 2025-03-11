<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="container mt-5">
        <div class="row">
            <p class="checkout-title">Thanh Toán</p>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="checkout-left">

                    <div class="cod shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-banknote">
                            <rect width="20" height="12" x="2" y="6" rx="2" />
                            <circle cx="12" cy="12" r="2" />
                            <path d="M6 12h.01M18 12h.01" />
                        </svg>
                        <span>Tiền Mặt</span>

                    </div>

                    <div class="vn-pay shadow">
                        <img src="{{ asset('images/vnpay-logo.jpg') }}" alt="">
                        <span>VNPAY</span>
                    </div>

                    <form action="/payment" method="post" class="">
                        @csrf

                        <button name="redirect" type="submit" class="order-btn main-button mt-3 ">Thanh
                            toán VNPAY</button>
                    </form>
                </div>

            </div>
            <div class="col-6">
                {{-- <div class="checkout-right">

                </div> --}}
                <div class="card-wrap">

                    <div class="card-item-information rounded shadow p-3">

                        <div class="card-delivery-title">
                            <h6>Thông tin người nhận</h6>
                        </div>

                        <div class="d-flex flex-column row-gap-3 wrap">

                            <div class="card-delivery-address d-flex">
                                <span class="title">Giao đến: </span>

                                <div class="d-flex justify-content-between align-items-center column-gap-1">

                                    <span>Cần Thơ</span>

                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class="title">Từ: </span>

                                    <span>Chi nhánh Nguyễn Văn Linh</span>

                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class="title">Tên người nhận: </span>

                                    <span>Ngo vu duy</span>

                                </div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class="title">Số điện thoại: </span>

                                    <span>Ngo vu duy </span>
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="rounded shadow p-3 mt-5">

                        <h6>Thông tin đơn hàng</h6>
                        @for ($i = 1; $i < 5; $i++)
                            <div class="cart-item-wrap d-flex justify-content-between align-items-center mb-3">

                                <div class="cart-item-left d-flex align-items-center">

                                    <div class="cart-item-img">
                                        <img src="{{ asset('images/products/pizzas/pizza-pho-mai.jpg') }}"
                                            alt="">
                                    </div>

                                    <div class="cart-item-info d-flex flex-column">

                                        <div class="cart-item-name">Pizza pho mai Ys</div>

                                        <div class="cart-item-price">129000đ</div>
                                    </div>

                                    <div class="options">
                                        <ul>
                                            <li>- Nhỏ (20 CM)</li>
                                            <li>- Mỏng</li>
                                            <li>- Viền Không Nhân</li>

                                        </ul>
                                    </div>

                                </div>

                                <div class="cart-item-right d-flex align-items-center">
                                    <span>x2</span>
                                </div>

                            </div>
                        @endfor

                    </div>

                    <div class="card-item-3 rounded shadow p-2 mt-5">

                        <div class="mb-3 card-template d-flex justify-content-between align-items-center">
                            <div class="card-template-title">
                                <p>Tạm tính</p>
                            </div>

                            <div class="card-template-monney">
                                <p>129.000đ</p>
                            </div>
                        </div>

                        <div class="card-sum d-flex justify-content-between align-items-center">

                            <div class="card-sum-title">
                                <p>Tổng tiền</p>
                            </div>

                            <div class="card-sum-monney">
                                <p>129000đ</p>
                            </div>
                        </div>
                    </div>

                    <button class="order-btn main-button mt-3" wire:click="payment">Tiếp Tục</button>
                </div>
            </div>
        </div>
    </div>
</div>
