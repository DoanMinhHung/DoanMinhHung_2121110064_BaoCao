<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required',
            //first là: required, nếu required lỗi thì unique là first
            'metakey'=>'required',
            'metadesc'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' =>'Tên danh mục bắt buộc không được để trống',
            //first là: required, nếu required lỗi thì unique là first
            'metakey.required' =>'Từ khóa không được để trống',
            'metadesc.required' =>'Mô tả không được để trống',
        ];
    }
}