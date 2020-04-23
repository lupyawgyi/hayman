<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputerInsertFormRequest extends FormRequest
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
//            'local_id' => 'required|unique:computers',
//            'brand' => 'required',
//            'model_or_serial' => 'required',
//            'specification' => 'required',
//            'ip_address'=>'required',
//            'company_id' => 'required',
//            'price' => 'required',
//            'bought_date' => 'required',
//            'image' => 'required',

        ];
    }
}
