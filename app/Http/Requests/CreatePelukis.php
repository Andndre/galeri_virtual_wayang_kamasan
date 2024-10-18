<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePelukis extends FormRequest
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
            'name' => ['string', 'required'],
            'email' => ['string', 'email', 'required'],
            'password' => ['string', 'min:8', 'required'],
            'profile_picture' => ['image', 'max:2048','nullable'],
            'whatsapp' => ['string', 'nullable'],
            'address' => ['string', 'nullable']
        ];
    }
}
