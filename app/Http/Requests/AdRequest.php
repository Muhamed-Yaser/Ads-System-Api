<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class Adrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(Validator $validator) {
        if($this->is('api/*')){
           $errorResponse = ApiResponse::error(422 , 'validation error' , $validator->messages()->all());
            throw new ValidationException($validator , $errorResponse);
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
            'title' => 'required|max:255',
            'text' => 'required',
            'phone' => 'required',
            'group_id' => 'required|exists:groups,id',
            'slug' => 'required',
            'status' => 'required'
        ];
    }

    public function attributes()
    {
        return [
        'title' => __('العنوان'),
        'text' => __('الوصف'),
        'phone' => __('الهاتف'),
        'group_id' => __('المجموعة')
        ];
    }
}