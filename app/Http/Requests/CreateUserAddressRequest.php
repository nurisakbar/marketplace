<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class CreateUserAddressRequest extends FormRequest
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
    // 'user_id', 'lebel', 'address', 'phone', 'name'
    protected function rules(): array
    {
        return [
            'user_id'  => 'required',
            'lebel'    => 'required',
            'name'     => 'required'
        ];
    }
}
