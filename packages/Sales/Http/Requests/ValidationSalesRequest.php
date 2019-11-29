<?php

namespace TTSoft\Sales\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationSalesRequest extends FormRequest
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
            'customer_id' => 'required',
            'address'=> 'required',
        ];
    }
    public function messages(){
        return [
            'customer_id.required' => 'Vui lòng điền nhập số điện thoại, tên hoặc email',
            'address.required' => 'Vui lòng điền nhập địa chỉ của khách hàng',

        ];
    }
}
