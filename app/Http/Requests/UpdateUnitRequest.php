<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUnitRequest extends FormRequest
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
            'name.unique' => 'A unit has already created.'
        ];
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:units'
        ];
    }
}
