<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLanguageRequest extends FormRequest
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
            'canonical' => 'required|unique:languages',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn vui lòng nhập tên của ngôn ngữ',
            'canonical.required' => 'Bạn vui lòng nhập từ khóa của ngôn ngữ !',
            'canonical.unique' => 'Từ khóa đã tồn tại vui lòng chọn từ khóa khác.',
        ];
    }
}
