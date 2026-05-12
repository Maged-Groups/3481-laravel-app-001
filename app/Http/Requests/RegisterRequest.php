<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:50|alpha',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|unique:users,mobile|regex:/^01[0125]\d{8}$/',
            'password' => 'required|confirmed|between:8,30',
        ];
    }

    public function messages (): array{
        return[
            'name.required' => "Enter a user name",
            'name.min' => "Name not less than 3 letters",
            'name.max' => "Name not more than 50 letters",
            'name.alpha' => "Only letters allwed",
        ];
    }
}
