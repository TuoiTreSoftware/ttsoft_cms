<?php

namespace TTSoft\Frontend\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required',
            'phone_number' => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Vui lòng điền tên',
            'email.required' => 'Vui lòng điền email',
            'subject.required' => 'Vui lòng nhập tiêu đề',
            'content.required' => 'Vui lòng điền nội dung',
            'phone_number.required' => 'Vui lòng nhập số điện thoại',
        ];
    }
}