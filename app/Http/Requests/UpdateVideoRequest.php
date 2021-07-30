<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class UpdateVideoRequest extends FormRequest
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
            'title'     =>  'required',
            //'active' => 'required',
            //'category_id'     =>  'required|exists:categories,id',
            'file_name' => 'mimes:mp4,mov,ogg,qt',
        ];
    }
}
