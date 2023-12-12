<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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

            'email' => 'required|string|email|unique:users,email, ' . $this->id . '|max:255',
            'name' => 'required|string',
            'user_catalogue_id' => 'gt:0',

        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Bạn vui lòng nhập email của bạn',
            'email.email' => 'Email chưa đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'email.string' => 'Email phải là ký tự',
            'email.string' => 'Email phải là ký tự',
            'name.required' => 'Bạn vui lòng nhập tên của bạn',
            'name.string' => 'Tên của bạn phải là ký tự',
            'user_catalogue_id.gt' => 'Bạn chưa chọn nhóm thành viên',
        ];
    }
}
