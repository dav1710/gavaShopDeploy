<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'cover' => 'required',
            'price' => 'required',
            'count' => 'required',
            'is_published' => 'nullable',
            'category_id' => 'required',
            'images' => 'required|array',
            'tags' => 'nullable|array',
            'shoes_size' => 'nullable|array',
            'colors' => 'nullable|array',
        ];
    }
}
