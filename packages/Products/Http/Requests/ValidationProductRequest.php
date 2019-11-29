<?php

namespace TTSoft\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationProductRequest extends FormRequest
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
        $method = $this->segment(3);
        switch ($method) {
            case 'edit':
                return [
                    'title'=>'required',
                    'slug'=>'required|unique:products,slug,'.$this->segment(4).',id',
                    'sku' => 'required',
                    'price' => 'numeric',
                    'product_category_id' => 'required|numeric',
                    'image' => 'required',
                ];
                break;
            default:
                return [
                    'title'=>'required',
                    'slug'=>'required|unique:products,slug',
                    'sku' => 'required',
                    'price' => 'numeric',
                    'product_category_id' => 'required|numeric',
                    'image' => 'required',
                ];
                break;
        }
    }
}
