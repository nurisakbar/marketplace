<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class UpdateHarvestRequest extends FormRequest
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
            'title'         =>  'required|min:3|max:150',
            'description'   =>  'required|min:3',
            'category_id'   =>  'required|exists:categories,id',
        ];
    }
}
