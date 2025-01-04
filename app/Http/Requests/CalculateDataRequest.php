<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class CalculateDataRequest extends FormRequest
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
            'capitalInicial' => 'required|numeric',
            'interes' => 'required|numeric',
            'anios' => 'required|numeric',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     * @return array
     */
    public function messages(): array
    {
        return [
            'capitalInicial.required' => 'El capital inicial es requerido',
            'capitalInicial.numeric' => 'El capital inicial debe ser un número',
            'interes.required' => 'El interés es requerido',
            'interes.numeric' => 'El interés debe ser un número',
            'anios.required' => 'Los años son requeridos',
            'anios.numeric' => 'Los años deben ser un número',
        ];
    }
    /**
     * Handle a failed validation attempt.
     * @param Validator $validator
     * @return void
     * @throws BindingResolutionException
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Errores de validación',
            'errors' => $errors
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
