@extends('layouts.main')

@section('title', 'Khu vực')

@section('css')

@endsection

@section('content')

    <div class="container">

        <div class="row mt-5">
            <div class="col-9">
                <div id='map'></div>

            </div>

            <div class="col-3">
                <div class="place-wrap">

                    <p class="place-title">Danh sách cửa hàng</p>

                    <div class="place-item">
                        <div class="place-name">Chi nhánh Nguyễn Văn Linh</div>
                        <div class="place-time">Open: 9 am - 11 pm</div>
                        <div class="place-address">333 Đ. Nguyễn Văn Linh, An Khách, Ninh Kiều, Cần Thơ</div>
                    </div>
                    <div class="place-item mt-4">
                        <div class="place-name">Chi nhánh Nguyễn Văn Linh</div>
                        <div class="place-time">Open: 9 am - 11 pm</div>
                        <p>333 Đ. Nguyễn Văn Linh, An Khách, Ninh Kiều, Cần Thơ</p>

                    </div>
                    <div class="place-item mt-4">
                        <div class="place-name">Chi nhánh Nguyễn Văn Linh</div>
                        <div class="place-time">Open: 9 am - 11 pm</div>
                        <p>333 Đ. Nguyễn Văn Linh, An Khách, Ninh Kiều, Cần Thơ</p>

                    </div>

                    <div class="place-item mt-4">
                        <div class="place-name">Chi nhánh Nguyễn Văn Linh</div>
                        <div class="place-time">Open: 9 am - 11 pm</div>
                        <p>333 Đ. Nguyễn Văn Linh, An Khách, Ninh Kiều, Cần Thơ</p>

                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection

@section('js')
    <script src="{{ asset('js/location.js') }}"></script>
@endsection
