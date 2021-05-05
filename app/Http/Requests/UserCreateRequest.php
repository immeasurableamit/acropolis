<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'mobile' => ['required', 'max:10'],
            'date_of_birth' => 'required',
            'profile_picture' => ['required', 'mimes:jpg,png', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'mobile.max' => '10 digits numeric mobile no.',
            'profile_picture.required' => "You must use the 'Choose Profile' to select which file you wish to upload",
            'profile_picture.mimes' => "Maximum file size to upload is 100 KB. If you are uploading a photo, try to reduce its resolution to make it under 100KB"

        ];
    }
}
