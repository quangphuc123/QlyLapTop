<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'tieu_de'=>'required',
            'noi_dung_report'=>'required',
        ];
    }
    public function messages(){
        return[
            'tieu_de.required'=>'Vui lòng nhập tiêu đề',
            'noi_dung_report.required'=>'Vui lòng nhập nội dung',
        ];
    }
}
