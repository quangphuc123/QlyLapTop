@include('assets.css')
<div>
    <h1>Xin chào {{$name}}</h1>
    <a href="{{ 'http://127.0.0.1:8000/change-password-mail/' . $id . '/' . $mail}}">
        <button type="submit">Nhấn vào đây để thay đổi mật khẩu </button>
    </a>
</div>
@include('assets.js')