<?php

namespace TTSoft\Inventories\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DocDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required',
            'name_product' => 'required',
            'so_luong' => 'required',
            'don_gia' => 'required',
            'vat' => 'required',
        ];
    }
    public function messages(){
        return [
            'product_id.required' => 'Chưa điền mã vật tư',
            'name_product.required' => 'Chưa điền tên',
            'so_luong.required' => 'Chưa điền số lượng',
            'don_gia.required' => 'Chưa điền đơn giá',
            'vat.required' => 'Chưa điền thuế vat',

        ];
    }
}
