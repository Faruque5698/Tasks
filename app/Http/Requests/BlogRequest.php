<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                $validator->errors()->toArray()
            ], Response::HTTP_UNPROCESSABLE_ENTITY)

        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title is required. Please provide a title for your post.',
            'title.string' => 'The title should be a valid string. Please make sure your title is composed of letters and/or numbers.',
            'title.max' => 'The title is too long. Please keep it under 255 characters.',

            'content.required' => 'Content is required. Please write something for your post.',
            'content.string' => 'The content should be a valid string. Please check your content for any unusual characters.',
        ];
    }
}
