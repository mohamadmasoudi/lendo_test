<?php

namespace App\Http\Requests;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateOrderRequest extends FormRequest
{

    public function prepareForValidation()
    {
        $customer = Customer::findOrFail($this->input('customer_id'));

        $this->merge([
            'status' => $customer->bank_account_number ? 'CHECK_HAVING_ACCOUNT' : 'OPENING_BANK_ACCOUNT',
            'customer_status'=> $customer->status,
        ]);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id'           => ['required', Rule::exists('customers', 'id')],
            'amount'                => ['required','integer',Rule::in([10000000,12000000,15000000,20000000])],
            'invoice_count'         => ['required','integer',Rule::in([6,9,12])],
            'status'                => ['required','string',Rule::in('CHECK_HAVING_ACCOUNT','OPENING_BANK_ACCOUNT')],
            'customer_status'       => ['required','string',Rule::notIn('blocked')],
            'complete_info'         => ['boolean'],
        ];
    }


}
