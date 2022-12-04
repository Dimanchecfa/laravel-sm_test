<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'prix' => 'required|string|max:255',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ];
    }
}
