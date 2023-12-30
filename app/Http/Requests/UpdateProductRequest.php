<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the product is authorized to make this request.
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
            'name' => 'required|string',
            'product_catalogue_id' => 'gt:0',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn vui lòng nhập tên của bạn',
            'name.string' => 'Tên của bạn phải là ký tự',
            'product_catalogue_id.gt' => 'Bạn chưa chọn nhóm thành viên',
        ];
    }
}
