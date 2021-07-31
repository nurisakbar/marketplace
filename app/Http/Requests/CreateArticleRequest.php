<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class CreateArticleRequest extends FormRequest
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
            'title'         =>  'required',
            'description'   =>  'required',
            'category_id'   =>  'required|exists:categories,id',
            'image'         =>  'required|image|mimes:jpeg,jpg,png|max:2000',
            
        ];
    }
}
