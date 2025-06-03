<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCity extends FormRequest
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
            'name_ar' => 'required|between:3,10|unique:citys,name->ar,'.$this->id,
            'name_en' => 'required|between:3,10|unique:citys,name->en,'.$this->id,
        ];
    }

    public function messages()
    {
        return [

            'name_ar.required' => trans('city.required_ar'),
            'name_ar.between:10,50' => trans('city.between:3,10'),
            'name_ar.unique' => trans('city.unique'),

            // ++++++++++
            'name_en.required' => trans('city.required_en'),
            'name_en.between:3,10' => trans('city.between:3,10'),
            'name_en.unique' => trans('city.unique'),



        ];
    }
}
