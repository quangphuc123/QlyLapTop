<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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

            'name' => 'required',
            'canonical' => 'required|unique:permissions',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn vui lòng nhập tên của quyền được tạo',
            'canonical.required' => 'Bạn vui lòng nhập đường dẫn của quyền !',
            'canonical.unique' => 'Đường dẫn đã tồn tại vui lòng chọn đường dẫn khác.',
        ];
    }
}
