<?php

namespace App\Http\Requests\EscortProfile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountDetailsRequest extends FormRequest
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
        $user = Auth::user();
        return [
            'email'     => 'required|string|email|max:255|unique:users,email,'.$user['id'],
            'password'  => 'nullable|confirmed|string|min:8',
            'avatar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'phone'     => 'required',
            'instagram' => 'nullable|url',
            'mym'       => 'nullable|url',
            'myonlyfan' => 'nullable|url',
            'ismygirl'  => 'nullable|url',
        ];
    }

    public function messages()
    {
        return [
            'before' => 'The :attribute must be greater than 18 Years',
        ];
    }
}
