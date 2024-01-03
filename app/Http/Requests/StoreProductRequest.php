<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the Product is authorized to make this request.
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
            'brand_id' => 'gt:0',
            'price' => 'numeric'

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn vui lòng nhập tên sản phẩm',
            'name.string' => 'Tên sản phẩm phải là ký tự',
            'product_catalogue_id.gt' =>'Bạn chưa chọn loại sản phẩm',
            'brand_id.gt' =>'Bạn chưa chọn thương hiệu',
            'price.numeric' => 'Bạn chỉ được nhập số',
        ];
    }
}
