<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => [
                'required',
                'unique:categories,name' . ($this->method() == 'PUT' ? ',' . $this->product->id : ''),
                'max:255'
            ],
            'category_id' => [
                'required',
                'max:255'
            ],
            'desc' => [
                'required',
                'max:555'
            ],
            'image' => [
                'sometime',
                'max:255',
            ],
            'price' => [
                'required',
                'numeric',
                'digits_between:1,12'
            ]
        ];
        // return [
        //     'name' => [
        //         'required',
        //         'unique:categories,name' . ($this->method() == 'PUT' ? ',' . $this->category->id : ''),
        //         'max:255'
        //     ],
        //     'desc' => [
        //         'required',
        //         'max:255'
        //     ]
        // ];
    }
}
