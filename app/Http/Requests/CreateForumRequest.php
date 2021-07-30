<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class CreateForumRequest extends FormRequest
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
            'topic'             => 'required|max:10',
            'user_id'           => 'required|numeric',
            'description'       => 'required',
            'category_id'       => 'required|numeric'
        ];
    }
}
