<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'name' => ['required','max:10','alpha'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','string']
        ];
    }

    public function messages():array
    {   
        return [
            'name.required' => 'the name field is required',
            'email.required' => 'the email field must be required',
            'password.required ' => 'the password field must be required',
            'email.email' => 'the email field must be type email',
        ];
    }
}
