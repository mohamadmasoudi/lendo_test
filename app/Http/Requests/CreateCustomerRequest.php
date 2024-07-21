<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCustomerRequest extends FormRequest
{



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bank_account_number'   => ['nullable', 'string'],
            'status'                => ['required', Rule::in('normal','blocked')],
            'complete_info'         => ['nullable', 'boolean'],
            'mobile'                => ['required', 'string','digits:11',Rule::unique('customers','mobile')],
            'name'                  => ['required', 'string'],
        ];
    }

    public function wantsJson()
    {
        return true;
    }
}
