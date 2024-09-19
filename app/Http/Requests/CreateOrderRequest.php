<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'id' => 'required|string|max:8',
            'name' => 'required|string|max:255',
            'address.city' => 'required|string',
            'address.district' => 'required|string',
            'address.street' => 'required|string',
            'price' => 'required|integer',
            'currency' => 'required|in:TWD,USD,JPY,RMB,MYR',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'id 不可為空',
            'id.string' => 'id 必須為字串',
            'id.max' => 'id 最多8個字元',

            'name.required' => 'name 不可為空',
            'name.string' => 'name 必須為字串',
            'name.max' => 'name 最多255個字元',

            'address.city.required' => 'city 不可為空',
            'address.city.string' => 'city 必須為字串',

            'address.district.required' => 'district 不可為空',
            'address.district.string' => 'district 必須為字串',

            'address.street.required' => 'street 不可為空',
            'address.street.string' => 'street 必須為字串',

            'price.required' => 'price 不可為空',
            'price.integer' => 'price 必須為整數',

            'currency.required' => 'currency 不可為空',
            'currency.in' => 'currency 必須被包含在這範圍內(TWD,USD,JPY,RMB,MYR)',
        ];
    }
}
