<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class BlogRequest extends FormRequest
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
            'title'         => 'required',
            'slug'          => 'required|alpha_dash|unique:blogs,slug',
            'content'       => 'required',
            'thumbnail'     => 'image|mimes:jpeg,png,jpg,svg,gif,jfif',
            'categories_id' => 'required',
        ];

        if ($this->method() == 'PUT') {
            $rules['slug'] .= ",$this->blog";
        }

        return $rules;
    }
}
