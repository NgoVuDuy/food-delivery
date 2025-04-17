<div>

    <div class="container mt-5">

        <div class="mng-nav">

            <div class="mng-row-wrap d-flex column-gap-4">

                {{-- {{ session("user")["shipper"] }} --}}

                {{-- @isset($user) --}}

                    @if ( !empty(session("user")["shipper"]) )

                        <a href="shipper-orders" wire:navigate wire:current="active" wire:ignore.self>
                            
                            <div class="nav-option">
                                <div class="title">Đơn cần giao</div>
                                <div class="order-number">đang bảo trì</div>
                            </div>
                        </a>
                    @endif
                    
                {{-- @endisset --}}

                <a href="pending" wire:navigate wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Chờ xác nhận</div>
                        <div class="order-number">
                            {{ !empty($count_orders['pending']) ? $count_orders['pending'] : '0' }} đơn hàng</div>
                    </div>
                </a>


                <a href="preparing" wire:navigate wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Đang chuẩn bị</div>
                        <div class="order-number">
                            {{ !empty($count_orders['preparing']) ? $count_orders['preparing'] : '0' }} đơn hàng</div>

                    </div>
                </a>

                <a href="ready" wire:navigate wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Đã sẵn sàng</div>
                        <div class="order-number">{{ !empty($count_orders['ready']) ? $count_orders['ready'] : '0' }}
                            đơn hàng</div>

                    </div>
                </a>

                <a href="delivering" wire:navigate wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Đang giao</div>
                        <div class="order-number">
                            {{ !empty($count_orders['delivering']) ? $count_orders['delivering'] : '0' }} đơn hàng</div>

                    </div>
                </a>

                <a href="completed" wire:navigate wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Hoàn thành</div>
                        <div class="order-number">
                            {{ !empty($count_orders['completed']) ? $count_orders['completed'] : '0' }} đơn hàng</div>

                    </div>
                </a>

                <a href="cancelled" wire:navigate wire:current="active" wire:ignore.self>
                    <div class="nav-option">
                        <div class="title">Đã hủy</div>
                        <div class="order-number">
                            {{ !empty($count_orders['cancelled']) ? $count_orders['cancelled'] : '0' }} đơn hàng</div>

                    </div>
                </a>

            </div>

        </div>
    </div>


    @yield('slot')

</div>
