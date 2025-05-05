<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->admin?->id;
        if ($id){
            return [
                'email' => ['required','email',Rule::unique('admins','email')->ignore($id)],
                'phone' => ['required','numeric',Rule::unique('admins','phone')->ignore($id)],
                'password' => 'nullable|min:8|max:50',
                'date' => 'required|date|date_format:Y-m-d',
            ];
        }else{
            return [
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|min:8|max:50',
                'phone' => 'required|numeric|unique:admins,phone',
                'date' => 'required|date|date_format:Y-m-d',
            ];
        }

    }

    public function messages()
    {
        return [
          'email.required'  => 'هذه الايميل مطلوب',
          'email.email'  => 'هذه الايميل مطلوب ومن نوع ايميل',
          'email.unique'  => 'هذه الايميل مسجل سابقا',
           'password.required' => 'كلمه المرور مطلوبه',
           'password.min' => 'كلمه المرور لا تقل عن 8 حروف وارقام'
        ];
    }
}
