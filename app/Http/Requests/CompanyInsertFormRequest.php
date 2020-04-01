<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyInsertFormRequest extends FormRequest
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
            'companyName'=>'required|unique:companies',
            'contactOne'=>'required',
            'phoneOne'=>'required',
            'contactTwo',
            'phoneTwo',
            'website',
            'address'=>'required'
        ];
    }
}
