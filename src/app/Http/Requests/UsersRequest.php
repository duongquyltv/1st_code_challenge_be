<?php

namespace App\Http\Requests;
use App\Http\Requests\BaseRequest;

class UsersRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required',
            'email'     => 'required|email|unique:users,email',
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
            'full_name' => 'Full Name',
            'email'     => 'Email',
            'password'  => 'Password'
        ];
    }
}
