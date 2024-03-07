<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
                'max:255',
            ],
            'address' => [
                'required',
                'max:255',
            ],
            'contact' => [
                'required',
                'max:255'
            ],
            'city' => [
                'required',
                'in:Surabaya,Jakarta,Bandung,Malang,Solo,Semarang,Jogja'
            ],
            'payment_method' => [
                'required',
                'in:prepaid,postpaid'
            ],
            'bank' => [
                'required_if:payment_method,prepaid',
                'in:credit,debit,paypal'
            ],
            'paypal_id' => [
                'required_if:bank,paypal',
                'exists:users,paypal_id'
            ]
        ];
    }

    public function messages()
    {
        return [
            'paypal_id.required_if' => 'Please update your paypal id in your profile',
            'paypal_id.exists' => 'Please update your paypal id in your profile'
        ];
    }
}
