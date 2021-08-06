<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class CreateStoreRequest extends FormRequest
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
        return [
            'user_id'       =>  'required',
            'name'          =>  'required',
            'address'       =>  'required',
            'phone'         =>  'required',
            'description'   =>  'required',
            'logo'          =>  'required',
        ];
    }
}
