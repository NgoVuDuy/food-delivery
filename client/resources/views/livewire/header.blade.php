<div class="sticky-top">

    <div>
        <nav class="navbar  navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/" wire:navigate><img src="{{ asset('logo/logo.png') }}" alt=""
                        width="80px"></a>

                <div class="order-lg-2">

                    <div class="header-icon-wrap">

                        <div class="header-user-icon {{ empty($user) ? '' : 'd-none' }}" data-bs-toggle="modal"
                            data-bs-target="#signinModal">

                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-user-round">
                                <circle cx="12" cy="8" r="5" />
                                <path d="M20 21a8 8 0 0 0-16 0" />
                            </svg>
                        </div>

                        <div class="nav-item dropdown {{  empty($user) ? 'd-none' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">

                                @if (!empty($user))
                                    {{ $user['name'] }}
                                @endif

                            </a>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" href="#">Lịch sử mua hàng</button></li>
                                <li><button class="dropdown-item" wire:click="logout">Đăng xuất</button></li>

                            </ul>
                        </div>

                        <div class="header-cart-icon">

                            <a href="/cart" wire:navigate class="cart-icon-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart">
                                    <circle cx="8" cy="21" r="1" />
                                    <circle cx="19" cy="21" r="1" />
                                    <path
                                        d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                                </svg>
                                <div
                                    class=" header-cart-quantity rounded-circle d-flex justify-content-center align-items-center">
                                    <span>{{ $count }}</span>
                                </div>
                            </a>

                        </div>
                    </div>

                    <button class=" navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>


                <div class="order-lg-1 collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

                    <ul class="navbar-nav mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="/home" wire:navigate wire:current="active-nav">TRANG CHỦ</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/pending" wire:navigate wire:current="active-nav">QUẢN LÝ ĐƠN</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/menu" wire:navigate wire:current="active-nav">MENU</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/promotion" wire:navigate wire:current="active-nav">KHUYẾN
                                MÃI</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/store-locations" wire:navigate wire:current="active-nav">CỬA
                                HÀNG</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/news" wire:navigate wire:current="active-nav">TIN
                                TỨC</a>
                        </li>

                    </ul>

                    <form class="header-form-search d-flex align-items-center" role="search" wire:submit="search">

                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm món ăn"
                            aria-label="Search" wire:model="search_text">

                        <button type="submit" class="search-submit-btn">

                            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="50" height="50" fill="currentColor" class="size-6">
                                <path d="M8.25 10.875a2.625 2.625 0 1 1 5.25 0 2.625 2.625 0 0 1-5.25 0Z" />
                                <path fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.125 4.5a4.125 4.125 0 1 0 2.338 7.524l2.007 2.006a.75.75 0 1 0 1.06-1.06l-2.006-2.007a4.125 4.125 0 0 0-3.399-6.463Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                    </form>


                </div>
            </div>
        </nav>

    </div>

</div>

@script
@endscript
