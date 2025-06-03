<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTown extends FormRequest
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

            'name_ar' => 'string|required|between:3,15|unique:towns,name->ar,'.$this->id,
            'name_en' => 'string|required|between:3,15|unique:towns,name->en,'.$this->id,
            'city_id'=>'required',
    ];

    }

    public function messages()
    {
        return [
            'name_ar.string' => trans('validation.string'),
            'name_ar.required' => trans('validation.required'),
            'name_ar.between:10,50' => trans('validation.between:10,50'),
            'name_ar.unique' => trans('validation.unique'),

            // ++++++++++
            'name_en.string' => trans('validation.string'),
            'name_en.required' => trans('validation.required'),
            'name_en.between:10,50' => trans('validation.between:10,50'),
            'name_en.unique' => trans('validation.unique'),


        ];
    }
}
