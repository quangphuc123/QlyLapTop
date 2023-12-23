<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostCatalogueRequest extends FormRequest
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
            'canonical'=>'required|unique:routers,canonical, '.$this->id.',module_id',

            // 'parent_id' => 'gt:0',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn vui lòng nhập tên của ngôn ngữ',
            'canonical.required' => 'Bạn vui lòng nhập đường dẫn',
            'canonical.unique' => 'Đường dẫn đã tồn tại, hãy chọn đường dẫn khác',
            // 'parent_id.gt' => 'Bạn chưa chọn danh mục cha',
        ];
    }
}
