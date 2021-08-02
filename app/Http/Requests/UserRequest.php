<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class UserRequest extends FormRequest
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
            'name'      =>  'required',
            'email'     =>  'required|unique:users'
        ];

        if ($this->method() == 'POST') {
            $rules['password'] = 'required';
        }

        if ($this->method() == 'PUT') {
            $rules['email'] = $rules['email'] . ',email,' . $this->id;
        }

        return $rules;
    }
}
