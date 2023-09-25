<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class Pre_Registration_Request extends FormRequest
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
           // 'file_photo' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'phone' => 'required|digits:10',
            'birth' => 'required|date',

        ];
    }
}