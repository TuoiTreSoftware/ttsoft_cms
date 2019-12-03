<?php

namespace TTSoft\Post\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name'=>'required|unique:posts,name',
            'category_id'=>'numeric'

        ];
    }
     public function messages(){
        return [
                   'name.required' => 'Vui lòng điền tên bào viết',
                   'name.unique' =>'Tên bài viết đã tồn tại xin ',
                   'slug.required' => 'Vui lòng điền URL Key',
                   'category_id.numeric' => 'Vui lòng chọn Categories '

        ];
    }
}
