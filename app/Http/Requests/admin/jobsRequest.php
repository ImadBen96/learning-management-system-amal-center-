<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class jobsRequest extends FormRequest
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
            'student_id' => 'required|integer|exists:users,id',
            'title'      => 'required|min:3|max:30',
            'location'      => 'required|min:3|max:30',
            'supervisor'      => 'required|min:3|max:30',
            'contrat_type'      => 'required|integer',
            'from' => 'required',
            'to' => 'required',
        ];
    }
}
