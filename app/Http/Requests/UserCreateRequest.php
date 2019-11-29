<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserCreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact' => ['required', 'numeric', 'digits:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'city' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'security_question_id' => ['required', 'numeric'],
            'security_question_answer' => ['required', 'string', 'max:255'],
            'avatar' => ['required', 'mimes:jpg,jpeg,png,gif']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'name',
            'email' => 'email',
            'contact' => 'contact',
            'password' => 'password',
            'city' => 'city',
            'dob' => 'date of birth',
            'security_question_id' => 'security question',
            'security_question_answer' => 'security answer',
            'avatar' => 'avatar'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['status' => false, 'message' => ['errors' => $validator->errors()]], 422));
    }
}
