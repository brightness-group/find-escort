<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class AddonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::check() && Auth::user()->role === 'admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'          => 'required|string|unique:addons,name',
            'interval'      => 'required',
            'addon_type_id' => 'required',
            'duration'      => 'required',
            'price'         => 'required',
        ];

        if ($this->method() == 'PUT') {
            $rules['name'] .= ",$this->category";
        }

        return $rules;
    }
}
