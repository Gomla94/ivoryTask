<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone_number' => ['sometimes', 'nullable', 'regex:/(0)[0-9]/'],
            'age' => ['sometimes', 'nullable', 'integer'],
            'role_id' => ['required', 'numeric', Rule::exists('roles', 'id')]
        ];
    }
}
