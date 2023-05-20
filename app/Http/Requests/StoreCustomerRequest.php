<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages() : array
    {
        return [
          'phone.unique' => 'We already have this phone number in our records',
        ];
    }

    public function rules(): array
    {
        return [
            'name'=>'required|min:5',
            'phone'=>'required|numeric|unique:customers',
            'address'=>'required|min:5',
        ];
    }
}
