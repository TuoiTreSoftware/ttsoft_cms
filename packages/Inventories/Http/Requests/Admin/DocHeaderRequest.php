<?php

namespace TTSoft\Inventories\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DocHeaderRequest extends FormRequest
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
            'tinh_trang' => 'required',
            'kho_id' => 'required',
            // 'xuat_kho' => 'required',
            //doc_details
            'doc_details' => 'required',
            
        ];
    }
    public function messages(){
        return [
            'doc_details.required' => ' ',
            
        ];
    }
}
