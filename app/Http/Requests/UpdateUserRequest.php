<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['max:55'],
            'email' => ['email'],
            'profile_image' => 'nullable|image|max:10240', // 10MB
            'profile_image_path' => 'nullable|string',
            'password' => ['nullable', Password::min(8)->numbers()->letters()->symbols()]
        ];
    }
}