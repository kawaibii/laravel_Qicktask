<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'image' => 'mimes:png,jpeg,jpg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('message.name_required'),
            'name.min' => trans('message.name_min'),
            'name.max' => trans('message.nam_max'),
            'image.mimes' => trans('message.image_mimes'),
        ];
    }
}
