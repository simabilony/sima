<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBlogRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'date_to_publish' => ['required'],
            'image_file' => ['required', 'image'],
            'status' => ['required', Rule::in('publish', 'unpublish')],
            'category_id' => ['required'],
            'user_id' => ['required'],
        ];
    }
}
