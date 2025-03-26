<div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="payment-box">
                    <svg class="error-icon" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-circle-x-icon lucide-circle-x">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m15 9-6 6" />
                        <path d="m9 9 6 6" />
                    </svg>
                    <p class="title">Giao Dịch Thất Bại</p>
                    {{-- <p class="total-price">120.000đ</p> --}}
                    <p class="decs">Vui lòng kiểm tra lại thông tin giao dịch</p>
                    <button class="cold-button" wire:click="back_btn()">Trở Về</button>
                </div>
            </div>
        </div>
    </div>
</div>
