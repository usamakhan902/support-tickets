<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class CommentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|string',
            'created_by' => 'required',
            'ticket_id' => 'required|exists:tickets,id'
        ];
    }


    public function messages()
    {
        return [
            'body.required' => 'The body field is required.',
            'body.string' => 'The body field must be a string.',
            'created_by.required' => 'The created by field is required.',
            'ticket_id.required' => 'The ticket ID field is required.',
            'ticket_id.exists' => 'The selected ticket ID is invalid.',
        ];
    }
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errorMessages = [];
        foreach ($validator->errors()->toArray() as $field => $messages) {
            $errorMessages[$field] = $messages[0];
        }

        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'error' => 'Validation Failed',
            'errors' => $errorMessages,
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
