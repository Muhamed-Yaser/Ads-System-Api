<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(Validator $validator){
        if ($this->is('api/*')){
            $errorReesponse = ApiResponse::error(422 , 'Register Validation Errors' , $validator->errors());
            throw new ValidationException($validator , $errorReesponse);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required', Rules\Password::default(),
        ];
    }
// |confirmed

    public function attributes()
    {
        return [
        'name' => __('Name'),
        'email' => __('E-mail'),
        'password' => __('Password')
        ];
    }
}