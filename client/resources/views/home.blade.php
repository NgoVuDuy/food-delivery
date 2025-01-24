@extends('layouts.main')

@section('title', 'Trang chủ')

@section('css')

@endsection

@section('content')

    <div class="container-fluid bg-header-wrap">
        <div class="bg-header">
            <img src="{{ asset('bg_2.webp') }}" alt="" width="100%" height="100%">

            <div class="bg-content">
                <div class="bg-text">

                    <p>Chào mừng bạn đến với Food delivery</p>
                    <p>Hãy thưởng thức món ngon<br>cùng gia đình</p>
                </div>

                <div class="bg-more-btn">
                    <button>
                        <span>Menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            width="16" height="16" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>

                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">

        {{-- Outstanding --}}

        <div class="row">

            <div class="col-12 mb-5">
                <div class="home-product-title">
                    <p class="grad-text">Thực đơn tiêu biểu</p>
                </div>
            </div>

            <div class="col-4">
                <div class="home-otd-product-wrap">
                    <img src="{{ asset('Products/pizza-home-1.png') }}" alt="">

                    <div class="product-content d-flex justify-content-center align-items-center">
                        {{-- <p>Pizza Phô Mai Ý</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-4">

                <div class="home-otd-product-wrap">
                    <img src="{{ asset('Products/pizza-home-2.png') }}" alt="">

                    <div class="product-content">

                    </div>
                </div>

            </div>
            <div class="col-4">

                <div class="home-otd-product-wrap">
                    <img src="{{ asset('Products/pizza-home-3.png') }}" alt="">

                    <div class="product-content">

                    </div>
                </div>

            </div>
        </div>

        
        
    </div>
    
    <div class="container-fluid home-product-infor-wrap">
        
        {{-- Information --}}
        <div class="row justify-content-center">
            <div class="col-8">
    
                <div class="home-product-infor">
                    <img src="{{ asset('Products/pizza-mix.webp') }}" alt="">
                </div>
    
            </div>
    
            <div class="col-12">
                <div class="home-product-infor-content">

                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        
        {{-- News --}}
    
        <div class="row">
    
            <div class="col-12 mb-5">
                <div class="home-product-title">
                    <p>Tin tức</p>
                </div>
            </div>
    
            <div class="col-3">
                <div class="home-news-wrap">
    
                </div>
            </div>
            <div class="col-3">
                <div class="home-news-wrap">
    
                </div>
            </div>
            <div class="col-3">
                <div class="home-news-wrap">
    
                </div>
            </div>
            <div class="col-3">
                <div class="home-news-wrap">
                    
                </div>
            </div>
        </div>
    </div>
    
    
    @endsection
    
    @section('js')
    
    @endsection
