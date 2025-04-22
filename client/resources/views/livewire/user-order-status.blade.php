<div>
    <div class="d-flex flex-column row-gap-3 user-order-status" >

        @if(!empty($user_order))

            @foreach ($user_order['orders'] as $user_order)
                <div class="items d-flex align-items-center shadow">
    
                    <span class="text">Bạn đang có một đơn hàng</span>
                    <button class="cold-button" wire:click="order_details({{ $user_order['id'] }})">Chi tiết</button>
                </div>
            @endforeach
        @endif

    </div>
</div>
