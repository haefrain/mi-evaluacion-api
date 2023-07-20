<?php

namespace App\Http\Requests;

use App\Http\Responses\ApiErrorResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class StoreRoleRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50', 'unique:roles'],
        ];
    }

    protected function failedValidation(Validator $validator): ApiErrorResponse {
        $response = new ApiErrorResponse($validator->errors()->toArray(), null, Response::HTTP_UNPROCESSABLE_ENTITY);
        throw new HttpResponseException($response->toResponse($validator));
    }
}
