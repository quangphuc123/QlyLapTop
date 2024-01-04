<form action="{{ route('xl-cap-nhat-mat-khau') }}" method="POST">
    @csrf
    <fieldset>
        <legend>Thay đổi mật khẩu</legend>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                <div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                        <div>
        @endif
        <div class="single-input-item">
            <label for="current-pwd" class="required">Mật khẩu
                cũ</label>
            <input name="old_password" type="password"
                class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput" />
            @error('old_password')
                <span class="text-danger">{{ $message }}<span>
                    @enderror
        </div>
        <div class="row mt-10">
            <div class="col-lg-6">
                <div class="single-input-item">
                    <label for="new-pwd" class="required">Mật khẩu
                        mới</label>
                    <input name="new_password" type="password"
                        class="form-control @error('new_password') is-invalid @enderror"
                        id="newPasswordInput" />
                    @error('new_password')
                        <span class="text-danger">{{ $message }}<span>
                            @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-input-item">
                    <label for="confirm-pwd" class="required">Xác nhận
                        mật khẩu mới</label>
                    <input name="new_password_confirmation" type="password" class="form-control"
                        id="confirmNewPasswordInput" />
                </div>
            </div>
        </div>
    </fieldset>
    <div class="single-input-item mt-10">
        <button class="btn btn-danger " type="submit">Lưu</button>
    </div>
</form>
