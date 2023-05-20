<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|unique:products|min:4',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'code'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg',
            'category_id'=>'required',
            'unit_id'=>'required'
        ];
    }
}
