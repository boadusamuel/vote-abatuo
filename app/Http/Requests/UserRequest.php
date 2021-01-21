<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
      $rules = [
          'name' => ['string', 'required', 'min:3'],
          'phone' => ['string','unique:users', 'required', 'regex:/^0[25][0-9]{8}$/'],
          'role_id' => ['numeric', 'exists:roles,id'],
          'password' => ['string', 'min:4']
      ];
      if($this->getMethod() === 'PUT'){

          $rules['phone'][1] = 'unique:users,phone,' . $this->route('user')->id ;
      }
      return $rules;
    }
}
