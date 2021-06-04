<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class yTableorderRequest extends FormRequest
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
    protected $errorBag = 'orderbag';
    public function rules()
    {
        return [
            'first_name'=>'required|max:100',
            'last_name'=>'required|max:100',
            'company'=>'max:255',
            'address'=>'required|max:500',
            'city'=>'required|max:100',
            'zip'=>'required|max:20',
            'country'=>'required|max:100',
            'phone'=>'required|max:20',
            'email'=>'required|max:255',
        ];
    }
}
