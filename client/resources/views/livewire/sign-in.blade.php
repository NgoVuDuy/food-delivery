<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <!-- Modal đăng nhập đăng ký -->
    <div class="modal fade modal-form modal-signin" id="signinModal" tabindex="-1" aria-labelledby="signinModal"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <div class="d-flex column-gap-4 justify-content-center title-wrap">

                        <h2 class="modal-title fs-5 sign-in-title">Đăng Nhập</h2>
                        <h2 class="modal-title fs-5 sign-up-title" data-bs-toggle="modal" data-bs-target="#signupModal">
                            Đăng Ký</h2>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" wire:submit="signin">

                    <div class="modal-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-5 d-flex align-items-center d-none">

                                    <div class="logo d-flex flex-column row-gap-3 align-items-center">

                                        <img class="" src="{{ asset('logo/3.png') }}" alt="">

                                        <span class="">NVD's Pizzeria</span>
                                    </div>

                                </div>
                                <div class="col-12">

                                    <div class="form-wrap d-flex flex-column row-gap-4">
                                        <div class="">

                                            <label for="phone-number">Số Điện Thoại</label>
                                            <input id="phone-number" class="form-control" type="search"
                                                placeholder="Nhập Số Điện Thoại" wire:model.live="phone_number">

                                            @error('phone_number')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="">

                                            <label for="pwd">Mật Khẩu</label>
                                            <input id="pwd" class="form-control" type="password"
                                                placeholder="Nhập Mật Khẩu" wire:model.live="pwd">

                                            @error('pwd')
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>

                                    </div>

                                    <span class="forgot-pwd">Quên mật khẩu ?</span>

                                    @if (session('user'))
                                        <p>
                                            {{ json_encode(session('user')) }}

                                        </p>
                                    @endif

                                    {{ $message }}
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="aws-button" data-bs-dismiss="modal">Hủy Bỏ</button>

                        <button type="submit" class="cold-button">Đăng Nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
