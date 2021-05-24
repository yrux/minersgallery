<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class yTablefeedbacksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $errorBag = 'feedback';
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
            'email'=>'required|max:255|email',
            'name'=>'required|max:255',
            'subject'=>'required|max:255',
            'description'=>'required',
        ];
    }
}
