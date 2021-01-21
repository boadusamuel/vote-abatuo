<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NomineeRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3'],
            'department_id' => ['required', 'exists:departments,id'],
            'election_id' => ['required', 'exists:elections,id']
         ];
    }
}
