<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'contact' => ['required', 'numeric', 'digits:10'],
            'city' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'security_question_id' => ['required', 'numeric'],
            'security_question_answer' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png,gif']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'name',
            'contact' => 'contact',
            'city' => 'city',
            'dob' => 'date of birth',
            'security_question_id' => 'security question',
            'security_question_answer' => 'security answer',
            'avatar' => 'avatar'
        ];
    }
}
