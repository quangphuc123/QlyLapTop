<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChangPassWordRequest extends FormRequest
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

            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ];
    }
    public function messages(): array
    {
        return [
            'old_password.required' => 'Mời bạn nhập mật khẩu cũ',
            'new_password.required' => 'Mời bạn nhập mật khẩu mới',
            'new_password.confirmed' => 'Mật khẩu chưa trùng khớp',
        ];
    }
}
