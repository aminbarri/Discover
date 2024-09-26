<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlatRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'nom' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'img1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
