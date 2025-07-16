<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter a title.',
            'title.string' => 'The title must be a valid string.',

            'content.required' => 'Please provide the post content.',
            'content.string' => 'The content must be a valid string.',

            'preview_image.required' => 'A preview image is required.',
            'preview_image.file' => 'The preview image must be a valid file.',

            'main_image.required' => 'A main image is required.',
            'main_image.file' => 'The main image must be a valid file.',

            'category_id.required' => 'Please select a category.',
            'category_id.integer' => 'The selected category is invalid.',
            'category_id.exists' => 'The selected category does not exist.',

            'tag_ids.array' => 'Tags must be provided as an array.',
        ];
    }
}
