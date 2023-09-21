<?php

namespace App\Http\Requests;

use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'description' => ['required','string'],
            //'image' => ['nullable','image'],
            'date_to_publish' => ['required'],
            'status' => ['required',Rule::in('publish','r')],
        ];
        

    }
}
