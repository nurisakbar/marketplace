<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;
use App\Entities\Transaction;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        $rules = [
            'store_id' => 'required',
            'courier_service_id' => 'required',
            'user_address_id' => 'required'
        ];

        $rules['status'] = [
            'required',
            Rule::in(Transaction::statusValues())
        ];
        return $rules;
    }
}
