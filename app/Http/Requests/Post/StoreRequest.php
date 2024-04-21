<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
//    /**
//     * Determine if the user is authorized to make this request.
//     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post.title' => 'required|string',
            'post.description' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'nullable|file'
        ];
    }

    protected function passedValidation()
    {
        return $this->merge([
            'images' => $this->images ?? []
        ]);
    }
}
