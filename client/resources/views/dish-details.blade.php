@extends('layouts.main')

@section('title', 'Chi tiết món ăn')

@section('css')

@endsection

@section('content')

    <div class="container mt-5">


        <div class="row">
            <div class="col-12">
                <div class="nav-child mb-4">
                    <a href="">Menu</a>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" width="16px"
                        height="16px" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>


                    <a href="" class="active">Pizza phô mai Ý</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-5">

                <div class="dish-img-wrap shadow">
                    <img src="{{ asset('Products/10099238.jpg') }}" alt="" width="100%">

                </div>

            </div>
            <div class="col-7">

                <div class="dish-option-wrap bg-light">

                    <div class="dish-option-name">
                        Pizza phô mai Ý
                    </div>

                    <div class="dish-option-price">
                        59.000 VND
                    </div>

                    <div class="dish-option-cover">
                        <div class="dish-option-title">
                            Chọn size
                        </div>

                        <button class="outline-button">Nhỏ (12cm) + 0 VND</button>
                        <button class="outline-button">Vừa (14cm) + 6.000 VND</button>
                        <button class="outline-button">Lớn (16cm) + 8.000 VND</button>


                    </div>

                    <div class="dish-option-cover">

                        <div class="dish-option-title">
                            Đồ dùng kèm
                        </div>

                        <button class="outline-button">Coca + 0 VND</button>
                        <button class="outline-button">Khoai tây chiên + 6000 VND</button>
                        <button class="outline-button">Salad + 8.000 VND</button>


                    </div>

                    <div class="dish-option-cover">
                        <div class="dish-option-title">
                            Hình thức
                        </div>

                        <button class="outline-button">Cắt sẵn</button>
                        <button class="outline-button">Không cắt</button>

                    </div>

                </div>

                <div class="dish-btn-cover d-flex align-items-center justify-content-between mt-4">

                    <div class="dish-btn-quantity">
                        <label for="quantity">Số lượng</label>
                        <button class="outline-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                width="16px" height="16px" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                            </svg>

                        </button>
                        <input type="number" name="quantity" id="quantity" min="1" max="10" value="1">
                        <button class="outline-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                width="16px" height="16px" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>

                        </button>
                    </div>

                    <button class="add-cart-btn main-button">Thêm vào giỏ hàng</button>
                </div>



            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="dish-description-wrap">
                    <div class="dish-description-title">
                        Mô tả sản phẩm
                    </div>

                    <div class="dish-description-content">
                        Cho ngày thêm tươi, tỉnh, êm, mượt với Trà Xanh Espresso Marble. Đây là sự mai mối bất ngờ giữa trà
                        xanh Tây Bắc vị mộc và cà phê Arabica Đà Lạt. Muốn ngày thêm chút highlight, nhớ tìm đến sự bất ngờ
                        này bạn nhé!
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">

            <div class="dish-product-suggest-title">
                Có thể bạn sẽ thích
            </div>

            @for($i=1;$i<=8;$i++)

            <div class="col-3">

                <div class="dish-product-suggest">


                </div>
            </div>
            @endfor


        </div>
    </div>


@endsection

@section('js')

@endsection
