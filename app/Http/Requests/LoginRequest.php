<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\password;

class LoginRequest extends FormRequest
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
            'email'=> 'required|email',
            'password'=> ['required','string']//Password::min(8)->letters()->numbers()]
        ];
    }

    public function messages(){
        return [
            'email.required' => 'ایمیل الزامی است.',
            'email.email' => 'فرمت ایمیل نادرست است.',
            'password.required' => 'رمز عبور الزامی است',
            'password.Password' => 'رمز عبور حداقل باید 8 کاراکتر شامل عدد و حروف باشد.'
        ];
    }
}
