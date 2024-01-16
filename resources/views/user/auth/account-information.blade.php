<form action="{{ route('xl-cap-nhat', ['id' => Auth::user()->id]) }}" method="POST">
    @csrf
    <div class="single-input-item">
        <label for="name" class="required">Họ và tên</label>
        <input type="text" name="name" class="inputstyle" <?php
                                                                    if(Auth::user()->name==null){
                                                                ?> placeholder="Chưa cập nhật"
            <?php } else ?> placeholder="{{ Auth::user()->name }}" />
    </div>
    <div class="single-input-item">
        <label for="birthday" class="required">Ngày sinh</label>
        <input type="date" name="birthday" class="inputstyle"
            value="{{ old('birthday', isset(Auth::user()->birthday) ? date('Y-m-d', strtotime(Auth::user()->birthday)) : '') }}"
            class="form-control" placeholder="" autocomplete="off">
    </div>
    <div class="single-input-item">
        <label for="phone" class="required">Số điện
            thoại</label>
        <input type="text" name="phone" class="inputstyle" <?php
                                                                    if(Auth::user()->phone==null){
                                                                ?> placeholder="Chưa cập nhật"
            <?php } else ?> placeholder="{{ Auth::user()->phone }}" />
    </div>
    <div class="single-input-item">
        <label for="address" class="required">Địa chỉ</label>
        <input type="text" name="address" class="inputstyle" <?php
                                                                    if(Auth::user()->address==null){
                                                                ?> placeholder="Chưa cập nhật"
            <?php } else ?> placeholder="{{ Auth::user()->address }}" />
    </div>
    <div class="single-input-item">
        <label for="email" class="required">Địa chỉ Email</label>
        <input type="email" name="email" class="inputstyle" disabled placeholder="{{ Auth::user()->email }}" />
    </div>
    {{-- <div class="col-lg-7">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row mb15">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <label for="" class="control-lable text-left">Thành Phố
                            </label>
                            <select name="province_id" class="form-control setupSelect2 province location"
                                data-target="districts">
                                <option value="0">----- Chọn Thành Phố -----</option>
                                @if (@isset($provinces))
                                    @foreach ($provinces as $province)
                                        <option @if (old('province_id') == $province->code) selected @endif
                                            value="{{ $province->code }}">{{ $province->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <label for="" class="control-lable text-left">Quận/Huyện
                            </label>
                            <select name="district_id" id=""
                                class="form-control districts setupSelect2 location" data-target="wards">
                                <option value="0">----- Chọn Quận/Huyện -----</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb15">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <label for="" class="control-lable text-left">Phường/Xã
                            </label>
                            <select name="ward_id" id="" class="form-control setupSelect2 wards">
                                <option value="0">----- Chọn Phường/Xã -----</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <label for="" class="control-lable text-left">Địa Chỉ
                            </label>
                            <input type="text" name="address" value="{{ old('address', $user->address ?? '') }}"
                                class="form-control" placeholder="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row mb15">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <label for="" class="control-lable text-left">Số Điện Thoại
                            </label>
                            <input type="number" name="phone" value="{{ old('phone', $user->phone ?? '') }}"
                                class="form-control" placeholder="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <label for="" class="control-lable text-left">Ghi chú
                            </label>
                            <input type="text" name="description"
                                value="{{ old('description', $user->description ?? '') }}" class="form-control"
                                placeholder="" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="single-input-item">
        <button class="btn btn-danger " type="submit">Lưu</button>
    </div>
</form>
