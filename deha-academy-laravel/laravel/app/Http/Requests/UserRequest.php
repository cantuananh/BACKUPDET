<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

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
            'name' => 'required',
            'hours_worked' => 'required|numeric|min:0|max:40',
            'period_first_at' => 'required|date|date_format:Y-m-d',
            'trainning_state' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required',
            'hours_worked.numeric' => 'Hours Worked is numeric : 0 - 40',
            'hours_worked.required' => 'Hours Worked is required',
            'period_first_at' => 'Period first at field invalid ',
            'trainning_state.required' => 'Trainning state field is required'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            response()->json(
                $validator->errors(), 
                422
            )
        ); 
    }
}
