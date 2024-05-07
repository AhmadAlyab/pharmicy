<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineStoreRequest extends FormRequest
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
        //    'photo' => 'mimes:jpg,bmp,png'
            'name' => ['required', 'string', 'max:255'],
            'available' => ['required'],
            'place_where' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'alternatives' => ['required', 'string'],
            'alternatives' => ['required', 'string'],
        ];
    }
}
