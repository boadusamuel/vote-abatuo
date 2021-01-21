<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'nominee_id' => ['required', 'exists:nominees,id'],
            'communication' => ['required', 'integer'],
            'ownership' => ['required', 'integer'],
            'respect' => ['required', 'integer'],
            'integrity' => ['required', 'integer'],
            'professionalism' => ['required', 'integer'],
            'team_work' => ['required', 'integer']
        ];
    }
}
