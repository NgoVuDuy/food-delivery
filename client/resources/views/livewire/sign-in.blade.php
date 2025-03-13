<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <!-- Modal đăng nhập đăng ký -->
    <div class="modal fade modal-form modal-signin" id="signinModal" tabindex="-1" aria-labelledby="signinModal" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <div class="d-flex column-gap-4 justify-content-center title-wrap">

                        <h1 class="modal-title fs-5 sign-in-title">Đăng Nhập</h1>
                        <h1 class="modal-title fs-5 sign-up-title" data-bs-toggle="modal" data-bs-target="#signupModal">Đăng Ký</h1>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-5 d-flex align-items-center">

                                <div class="logo d-flex flex-column row-gap-3 align-items-center">

                                    <img class="" src="{{ asset('logo/3.png') }}" alt="">

                                    <span class="">NVD's Pizzeria</span>
                                </div>

                            </div>
                            <div class="col-7">

                                <div class="form-wrap d-flex flex-column row-gap-4">
                                    <div class="">

                                        <label for="phone-number">Số Điện Thoại</label>
                                        <input id="phone-number" class="form-control" type="search"
                                            placeholder="Nhập Số Điện Thoại">
                                    </div>
                                    <div class="">

                                        <label for="pwd">Mật Khẩu</label>
                                        <input id="pwd" class="form-control" type="search" placeholder="Nhập Mật Khẩu">
                                    </div>

                                </div>

                                <span class="forgot-pwd">Quên mật khẩu ?</span>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="aws-button" data-bs-dismiss="modal">Hủy Bỏ</button>

                    <button type="button" class="cold-button" wire:click="update_customer_name()"
                        data-bs-dismiss="modal">Đăng Nhập</button>
                </div>
            </div>
        </div>
    </div>
</div>
