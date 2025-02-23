@extends('layouts.main')

@section('title', 'Menu')

@section('css')

@endsection

@section('content')

    <div class="container mt-5">

        <div class="row">
            <div class="col-3">

                <div class="menu-filter-wrap">

                    <div class="menu-filter-title d-flex justify-content-between">

                        <p class="mb-3"></p>
                        <p>Tất cả</p>
                    </div>

                    <div class="menu-filter-item mb-3">

                        <div class="caterory-name d-flex align-items-center">

                            <p class="">Nguyên liệu</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-down">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </div>


                        <div class="wrap">

                            <div class="item">
                                <span>Meat Lover's Pizza</span>
                            </div>

                            <div class="item"><span>Vegetarian Pizza</span></div>
                            <div class="item"><span>Seafood Pizza</span></div>
                            <div class="item active"><span>Cheese Pizza</span></div>
                            <div class="item"><span>Spicy Pizza</span></div>
                        </div>



                    </div>

                    <div class="menu-filter-item mb-3">

                        <div class="caterory-name d-flex align-items-center">

                            <p class="">Vùng miền</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-down">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </div>

                        <div class="item">
                            <span>Italian Pizza</span>
                        </div>

                        <div class="item"><span>American Pizza</span></div>
                        <div class="item"><span>Chicago Deep Dish</span></div>
                        <div class="item"><span>Japanese Pizza</span></div>


                    </div>

                    <div class="menu-filter-item mb-3">

                        <div class="caterory-name d-flex align-items-center">

                            <p class="">Khác</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-down">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </div>

                        <div class="item"><span>Mỳ ý</span></div>
                        <div class="item"><span>Hamburger</span></div>
                        <div class="item"><span>Bánh ngọt</span></div>
                        <div class="item"><span>Nước uống</span></div>


                    </div>

                </div>

            </div>

            <div class="col-9">

                <div class="sort-by-wrap d-flex align-items-center justify-content-between">

                    <div>
                        <div class="filter-status-text">Cheese Pizza</div>

                    </div>


                    <div class="sort-by">
                        <button>Giá</button>
                        <button>Đế bánh</button>
                        <button>Kích thước</button>
                        <button>Loại</button>
                    </div>
                </div>

                <div class="row">

                    @for ($i = 1; $i <= 10; $i++)
                        <div class="col-4 mb-5">

                            <a href="menu/1" class="link">

                                <div class="menu-item-wrap dish-item shadow">

                                    {{-- <div class="menu-item-message">
                                        Khuyến mãi
                                    </div> --}}

                                    <div class="menu-item-img d-flex justify-content-center align-items-center">

                                        <img src="{{ asset('Products/pizza-home-4.png') }}" alt="">

                                    </div>

                                    <div class="menu-item-content p-3">
                                        <div class="menu-name">
                                            <p class="">Pizza Phô Mai Ý</p>
                                        </div>

                                        {{-- <div class="menu-time">
                                            <svg aria-hidden="true" focusable="false" class="fl-neutral-secondary"
                                                width="16" height="16" viewBox="0 0 16 16"
                                                xmlns="http://www.w3.org/2000/svg" data-testid="CLOCK">
                                                <path
                                                    d="M8 2C11.3137 2 14 4.68629 14 8C14 11.3137 11.3137 14 8 14C4.68629 14 2 11.3137 2 8C2 4.68629 4.68629 2 8 2ZM8 3.5C5.51472 3.5 3.5 5.51472 3.5 8C3.5 10.4853 5.51472 12.5 8 12.5C10.4853 12.5 12.5 10.4853 12.5 8C12.5 5.51472 10.4853 3.5 8 3.5ZM8 4.72178C8.3797 4.72178 8.69349 5.00394 8.74315 5.37001L8.75 5.47178V7.52334C8.75 7.62941 8.79213 7.73114 8.86712 7.80615L10.1982 9.13758C10.4645 9.40385 10.4887 9.82051 10.2709 10.1141L10.1982 10.1982C9.93198 10.4645 9.51531 10.4887 9.2217 10.2709L9.13758 10.1982L7.54289 8.60355C7.35536 8.41602 7.25 8.16166 7.25 7.89645V5.47178C7.25 5.05757 7.58579 4.72178 8 4.72178Z">
                                                </path>
                                            </svg>

                                            <div class="menu-time-text">
                                                40-60m
                                            </div>
                                        </div>

                                        <div class="menu-transport">
                                            <svg aria-hidden="true" focusable="false" class="fl-neutral-secondary"
                                                width="16" height="16" viewBox="0 0 16 16"
                                                xmlns="http://www.w3.org/2000/svg" data-testid="RIDER">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.23752 3.28752C9.23752 3.95027 8.70027 4.48752 8.03752 4.48752C7.37478 4.48752 6.83752 3.95027 6.83752 3.28752C6.83752 2.62478 7.37478 2.08752 8.03752 2.08752C8.70027 2.08752 9.23752 2.62478 9.23752 3.28752ZM6.14386 9.14592C6.00445 8.96508 5.94904 8.72306 6.01506 8.48618L6.86505 5.43618C6.97625 5.03718 7.38985 4.80386 7.78886 4.91506C7.91357 4.94981 8.02209 5.01411 8.10897 5.09826L9.67246 6.11242L11.5377 6.11242C11.8829 6.11242 12.1627 6.39224 12.1627 6.73742C12.1627 7.0826 11.8829 7.36242 11.5377 7.36242H9.48751C9.3668 7.36242 9.24867 7.32746 9.14739 7.26177L8.10235 6.58391L7.63531 8.2598L9.66925 8.36322C9.87995 8.37393 10.071 8.49022 10.1773 8.67244C10.2837 8.85467 10.2909 9.07823 10.1965 9.26693L10.0965 9.46693L10.0947 9.47057L8.54468 12.5206C8.38829 12.8283 8.01206 12.951 7.70434 12.7946C7.39662 12.6382 7.27394 12.262 7.43032 11.9543L8.64567 9.56279L6.65576 9.46161C6.43443 9.45035 6.24586 9.32527 6.14386 9.14592ZM2.53752 4.68752C1.87478 4.68752 1.33752 5.22478 1.33752 5.88752V7.48752C1.33752 8.15027 1.87478 8.68752 2.53752 8.68752H4.13752C4.80027 8.68752 5.33752 8.15027 5.33752 7.48752V5.88752C5.33752 5.22478 4.80027 4.68752 4.13752 4.68752H2.53752ZM4.33752 10.5125C3.74382 10.5125 3.26252 10.9938 3.26252 11.5875C3.26252 12.1812 3.74382 12.6625 4.33752 12.6625C4.93123 12.6625 5.41252 12.1812 5.41252 11.5875C5.41252 10.9938 4.93123 10.5125 4.33752 10.5125ZM2.01252 11.5875C2.01252 10.3035 3.05346 9.26252 4.33752 9.26252C5.62159 9.26252 6.66252 10.3035 6.66252 11.5875C6.66252 12.8716 5.62159 13.9125 4.33752 13.9125C3.05346 13.9125 2.01252 12.8716 2.01252 11.5875ZM11.2625 11.5875C11.2625 10.9938 11.7438 10.5125 12.3375 10.5125C12.9312 10.5125 13.4125 10.9938 13.4125 11.5875C13.4125 12.1812 12.9312 12.6625 12.3375 12.6625C11.7438 12.6625 11.2625 12.1812 11.2625 11.5875ZM12.3375 9.26252C11.0535 9.26252 10.0125 10.3035 10.0125 11.5875C10.0125 12.8716 11.0535 13.9125 12.3375 13.9125C13.6216 13.9125 14.6625 12.8716 14.6625 11.5875C14.6625 10.3035 13.6216 9.26252 12.3375 9.26252Z">
                                                </path>
                                            </svg>

                                            <div class="menu-transport-text">
                                                Free
                                            </div>
                                        </div> --}}

                                        <div class="menu-price">
                                            157.000đ
                                        </div>
                                    </div>


                                    <div class="menu-item-desc">Pizza với phô mai
                                        tươi được nhập khẩu trực tiếp từ Ý
                                    </div>

                                    <div class="nice-button more-btn">Xem thêm</div>
                                </div>
                            </a>

                        </div>
                    @endfor

                </div>
            </div>


        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('js/menu.js') }}"></script>

@endsection
