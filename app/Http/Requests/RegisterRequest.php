<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        toast('Lỗi','error');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'bail|required|min:6',
            'password'=>'bail|required|between:8,16',
            'confirm_password'=>'bail|required|same:password',
            'email'=>'bail|required|email',
        ];
    }
    public function messages(){
        return[
            'name.required'=>'Vui lòng nhập tên đăng nhập',
            'name.min'=>'Tên đăng nhập có độ dài ít nhất 6 ký tự',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.between'=>'Mật khẩu có độ dài từ :min đến :max ký tự',
            'confirm_password.required'=>'Vui lòng xác nhận mật khẩu',
            'confirm_password.same'=>'Xác nhận mật khẩu không khớp',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Vui lòng nhập email đúng định dạng',
        ];
    }
}
