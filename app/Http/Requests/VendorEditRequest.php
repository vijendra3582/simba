<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorEditRequest extends FormRequest
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
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact' => ['required', 'numeric', 'digits:10'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'city' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png,gif'],
            'category_id' => ['required'],
            'designation_id' => ['required'],
            'discount' => ['required'],
            'registration_tenure' => ['required'],
            'registration_details_title' => ['required'],
            'registration_details_file' => ['required'],
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
            'avatar' => 'avatar',
            'category_id' => 'category',
            'designation_id' => 'designation',
            'discount' => 'discount',
            'registration_tenure' => 'registration tenure',
            'registration_details_title' => 'registration details',
            'registration_details_file' => 'registration details'
        ];
    }

}
