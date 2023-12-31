<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'email'=>'required',
            'password'=>'required|between:8,16',
        ];
    }
    public function messages(){
        return[
            'email.required'=>'Vui lòng nhập gmail đã đăng kí',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.between'=>'Mật khẩu từ :min đến :max ký tự'
        ];
    }
}
