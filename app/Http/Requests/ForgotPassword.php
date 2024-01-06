<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'new_password' => 'required',
            "new_password_confirmation" =>'required|same:new_password'
        ];
    }

    public function messages(): array
    {
        return [
            'new_password.required' => 'Mời bạn nhập mật khẩu mới',
            'new_password_confirmation.same' => 'Mật khẩu chưa trùng khớp',
        ];
    }
}
