<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return session('auth');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => '',
            'category' => '',
            'cost' => '',
            'end_plan' => '',
            'end_fact' => '',
            'mechanics_id' => '',
            'cars_num' => '',
        ];
    }
}
