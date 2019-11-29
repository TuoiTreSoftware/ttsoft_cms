<?php

namespace TTSoft\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
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
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ];
    }

    public function messages(){
        return [
            'password.required' => 'The password field is required.',
            'password_confirm.required' => 'The password confirm field is required.',
            'password_confirm.same' => 'Password confirm incorrect.'
        ];
    }
}
