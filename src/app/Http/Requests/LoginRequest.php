<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
class LoginRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required|email',
            'password'  => 'required',
        ];
    }

    public function messages() {
        return [
            'required'  => 'The :attribute is required'
        ];
    }

    public function attributes()
    {
        return [
            'email'     => 'Email',
            'password'  => 'Password'
        ];
    }
}
