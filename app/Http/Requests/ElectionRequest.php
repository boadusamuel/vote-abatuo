<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:7'],
            'period' => ['required', 'date'],
            'completed' =>['required', 'boolean']
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Election Month-Year',
        ];
    }
}
