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
        <input type="date" name="birthday" class="inputstyle" <?php
                                                                    if(Auth::user()->birthday==null){
                                                                ?> placeholder="Chưa cập nhật"
            <?php } else ?> placeholder="{{ Auth::user()->birthday}} " />
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
        <label for="email" class="required">Email
            Addres</label>
        <input type="email" name="email" class="inputstyle" <?php
                                                                    if(Auth::user()->email==null){
                                                                ?> placeholder="Chưa cập nhật"
            <?php } else ?> placeholder="{{ Auth::user()->email }}" />
    </div>
    <div class="single-input-item">
        <button class="btn btn-danger " type="submit">Lưu</button>
    </div>
</form>
