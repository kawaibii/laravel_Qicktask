<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:20',
            'body' => 'required',
            'image' => 'mimes:png,jpeg,jpg',
        ];
    }

    public function messages()
    {
       return [
           'title.required' => trans('validator.title_required'),
           'title.min' => trans('validator.title_min'),
           'body.required' => trans('validator.body_required'),
           'image.mimes' => trans('validator.file_mimes'),
       ];
    }
}
