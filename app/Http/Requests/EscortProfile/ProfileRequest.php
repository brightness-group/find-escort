<?php

namespace App\Http\Requests\EscortProfile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'birthday'          => 'required|date_format:d/m/Y|before:-18 years',
            'specialities'      => 'required',
            'bio'               => 'required',
            'hair_color_id'     => 'required',
            'hair_length_id'    => 'required',
            'boob_id'           => 'required',
            'mobility'          => 'required',
            'city_id'           => 'required',
            'country_id'        => 'required',
            'height'            => 'required',
            'body_id'           => 'required',
            'eyes_color_id'     => 'required',
            'ethnicity_id'      => 'required',
            'cup_size_id'       => 'required',
            'pubic_hair_id'     => 'required',
            'client_id'         => 'required',
            'smoke_id'          => 'required',
            'tattoo_id'         => 'required'
        ];
    }

    public function messages()
    {
        return [
            'before' => 'The :attribute must be greater than 18 Years',

        ];
    }
}
