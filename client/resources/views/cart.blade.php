@extends('layouts.main')

@section('title', 'Giỏ hàng')

@section('css')

@endsection

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-8 rounded shadow p-3">
                <div class="cart-title"><h5>Giỏ Hàng <span>( 3 sản phẩm )</span></h5></div>

                <div class="row">
                    @for ($i = 1; $i <= 5; $i++)

                        <div class="col-12">

                            <div class="cart-item-wrap d-flex justify-content-between">
                                <div class="cart-item-left d-flex align-items-center">

                                    <div class="cart-item-img">
                                        <img src="{{ asset('Products/10099238.jpg') }}" alt="">
                                    </div>

                                    <div class="cart-item-info d-flex flex-column">

                                        <div class="cart-item-name">Pizza phô mai Ý</div>

                                        <div class="cart-item-price">69.000 VND</div>
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
                                        <input type="number" name="quantity" id="quantity" min="1" max="10"
                                            value="1">
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

                    @endfor
                </div>

            </div>
            <div class="col-4">

                <div class="row">
                    <div class="col-12">
                        <div class="card-wrap">
                            <div class="card-item-1 rounded shadow p-2">

                                <div class="card-delivery-title">
                                    <h6>Giao hàng đến</h6>
                                </div>

                                <div class="card-delivery-address d-flex justify-content-between align-items-center">
                                    <span>290 Nguyễn Văn Linh, An Khánh, Ninh Kiều, Cần Thơ</span>

                                    <div class="card-delivery-address-edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>

                                    </div>
                                </div>

                            </div>

                            <div class="card-item-2 rounded shadow p-2 mt-5">

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



                            </div>

                            <div class="card-item-note rounded shadow p-2 mt-5">

                                <div class="card-item-note-title">
                                    <h6>Ghi chú cho đơn hàng</h6>
                                </div>

                                <div class="card-item-note-input">
                                    <textarea type="text"></textarea>
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

                        <button class="order-btn main-button mt-2">Đặt hàng</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
