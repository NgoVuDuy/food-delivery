<div>
    <div class="container">
        <div class="row mt-5">

            <div class="cart-wrap col-8 rounded p-3">

                <div class="cart-title">
                    <p>Giỏ hàng của bạn<span></span></p>
                </div>


                <div class="row row-gap-3">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="col-12">

                            <div class="cart-item-wrap d-flex justify-content-between align-items-center">
                                <div class="cart-item-left d-flex align-items-center">

                                    <div class="cart-item-img">
                                        <img src="{{ asset('Products/44.jpg') }}" alt="">
                                    </div>

                                    <div class="cart-item-info d-flex flex-column">

                                        <div class="cart-item-name">Pizza phô mai Ý</div>

                                        <div class="cart-item-price">69.000đ</div>
                                    </div>

                                    <div class="options">
                                        <ul>
                                            <li>- Size 12 CM</li>
                                            <li>- Đế mỏng</li>
                                            <li>- Viền phô mai</li>
                                            <li>- Thêm phô mai</li>

                                        </ul>
                                    </div>

                                </div>

                                <div class="cart-item-right d-flex align-items-center">

                                    <div class="dish-btn-quantity">
                                        <button class="outline-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" width="16px" height="16px" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                            </svg>

                                        </button>
                                        <input type="number" name="quantity" id="quantity" min="1"
                                            max="10" value="1">
                                        <button class="outline-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" width="16px" height="16px" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>

                                        </button>
                                    </div>

                                    <div class="cart-item-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" width="24px" height="24px" stroke="currentColor"
                                            class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="item-separation"></div>
                    @endfor
                </div>

            </div>
            <div class="col-4">

                <div class="row">
                    <div class="col-12">
                        <div class="card-wrap">

                            <div class="card-item-information rounded shadow p-3">

                                <div class="card-delivery-title">
                                    <h6>Thông tin người nhận</h6>
                                </div>

                                <div class="d-flex flex-column row-gap-3 wrap">

                                    <div class="card-delivery-address">
                                        <span class="title">Giao đến: </span> <br>

                                        <div class="d-flex justify-content-between align-items-center">

                                            <span class="address">Vui lòng thêm địa chỉ giao hàng</span>

                                            <div class="card-delivery-address-edit">
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
                                            <span>Ngô Vũ Duy</span>
                                        </div>
                                        <span class="edit-text">Sửa</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">
                                            <span class="title">Số điện thoại: </span>
                                            <span>0949229535</span>
                                        </div>
                                        <span class="edit-text">Sửa</span>
                                    </div>


                                </div>



                            </div>

                            <div class="card-item-note rounded shadow p-3 mt-5">

                                <div class="card-item-note-title">
                                    <h6>Ghi chú cho đơn hàng</h6>
                                </div>

                                <div class="card-item-note-input">
                                    <textarea type="text"></textarea>
                                </div>
                            </div>

                            <div class="card-item-2 rounded shadow p-3 mt-5">

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
                                        <p>Cắt sẵn</p>
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

                            </div>



                            <div class="card-item-3 rounded shadow p-2 mt-5">

                                <div class="card-template d-flex justify-content-between align-items-center">
                                    <div class="card-template-title">
                                        <p>Tạm tính</p>
                                    </div>

                                    <div class="cart-template-monney">
                                        <p>122.000 VND</p>
                                    </div>
                                </div>

                                <div class="card-sum d-flex justify-content-between align-items-center">

                                    <div class="card-sum-title">
                                        <p>Tổng tiền</p>
                                    </div>

                                    <div class="card-sum-monney">
                                        <p>122.000 VND</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button class="order-btn main-button mt-3">Đặt hàng</button>

                        <form action="/payment" method="post">
                            @csrf

                            <button name="redirect" type="submit" class="order-btn main-button mt-3">Thanh toán VNPAY</button>
                        </form>




                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
