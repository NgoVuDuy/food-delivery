<div>

    <div class="container mt-5">

        <div class="mng-nav">

            <div class="mng-row-wrap">


                <a href="pending" wire:navigate wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Chờ xác nhận</div>
                        <div class="order-number">{{ $pending_count }} đơn hàng</div>
                    </div>
                </a>

                <a href="preparing" wire:navigate  wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Đang chuẩn bị</div>
                        <div class="order-number">{{ $preparing_count }} đơn hàng</div>

                    </div>
                </a>

                <a href="ready" wire:navigate  wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Đã sẵn sàng</div>
                        <div class="order-number">0 đơn hàng</div>

                    </div>
                </a>

                <a href="delivering" wire:navigate  wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Đang giao</div>
                        <div class="order-number">0 đơn hàng</div>

                    </div>
                </a>

                <a href="completed" wire:navigate  wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Hoàn thành</div>
                        <div class="order-number">0 đơn hàng</div>

                    </div>
                </a>

                <a href="cancelled" wire:navigate  wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Đã hủy</div>
                        <div class="order-number">0 đơn hàng</div>

                    </div>
                </a>

            </div>

        </div>
    </div>



    @yield('slot')

</div>
