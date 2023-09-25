<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class IntershipsRequest extends FormRequest
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
            'student_id' =>'required|integer|exists:users,id' ,
            'title' => 'required|string|min:3|max:255',
            'location' => 'required|string|min:3|max:255',
            'start' => 'required|date',
            'end' => 'required|date',
            'supervisor' => 'required|string|min:3|max:255',
        ];
    }
}
