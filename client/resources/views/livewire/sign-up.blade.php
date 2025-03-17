<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <!-- Modal đăng nhập đăng ký -->
    <div class="modal fade modal-form modal-signup" id="signupModal" tabindex="-1" aria-labelledby="signupModal"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <div class="d-flex column-gap-4 justify-content-center title-wrap">

                        <h2 class="modal-title fs-6 sign-in-title" data-bs-toggle="modal" data-bs-target="#signinModal">
                            Đăng Nhập</h2>
                        <h2 class="modal-title fs-6 sign-up-title">Đăng Ký</h2>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" wire:submit="signup">

                    <div class="modal-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-12">


                                    <div class="form-wrap d-flex flex-column row-gap-4">

                                        <div class="">

                                            <label for="name">Họ Và Tên</label>
                                            <input id="name" class="form-control" type="search"
                                                placeholder="Nhập Họ Và Tên" wire:model.live="name">
                                            @error('name')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

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


                                </div>
                                <div class="col-12 mt-3">

                                    <div class="alert alert-{{ $is_success ? 'success'  : 'danger'}} alert-dismissible fade {{ !empty($message) ? 'show' : '' }}" role="alert">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="aws-button" data-bs-dismiss="modal">Hủy Bỏ</button>

                        <button type="submit" class="cold-button">Đăng Ký</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
