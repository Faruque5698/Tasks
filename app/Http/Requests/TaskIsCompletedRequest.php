<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class TaskIsCompletedRequest extends FormRequest
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
            'is_completed' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'is_completed.required' => 'Please indicate whether the task is completed or not.',
            'is_completed.boolean' => 'Please provide a valid option (true or false) for task completion.',
        ];
    }
}
