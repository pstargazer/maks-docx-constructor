<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
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
            "name_prefix" => "required|string",
            "company_name" => "required|string",
            'address' => 'required|string',
            'phone' => 'required|string',

            "delegate_name" => 'required|string',
            "delegate_surname" => 'required|string',
            // "delegate_th_name" => 'string',
            "delegate_post" => 'required|string|min:1',

            'bik' => 'required|string|min:9|max:9',
            'kpp' => 'required|string|min:9|max:9',
            'inn' => 'required|string|min:10|max:12',

            'payment_account' => 'required|string|min:20|max:20',
            'correspondent_account' => 'required|string|min:20|max:20',
            'bank_id' => "required|integer"
        ];
    }
}
