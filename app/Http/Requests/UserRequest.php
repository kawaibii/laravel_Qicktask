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
        return [
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'repassword' => 'same:password',
            'image' => 'mimes:png,jpeg,jpg',
        ];
    }
    public function messages()
    {
        return [
        'name.required' => trans('message.name_required'),
        'name.min' => trans('message.name_min'),
        'name.max' => trans('message.nam_max'),
        'email.email' => trans('message.email_email'),
        'email.unique' => trans('message.email_unique'),
        'email.required' => trans('message.email_required'),
        'password.required' => trans('message.password_required'),
        'password.min' => trans('message.password_min'),
        'repassword.same' => trans('message.repassword_same'),
        'image.mimes' => trans('message.image_mimes'),
        ];
    }
}
