<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class yTableproduct_inquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $errorBag = 'productinquiry';
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
            'name'=>'required|max:300',
            'email'=>'required|max:300|email',
            'message'=>'required',
        ];
    }
}
