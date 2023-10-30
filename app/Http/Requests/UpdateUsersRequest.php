<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {  if($this->method()=='PUT'){
        return[ 
        'name'=>['string'],
        'email'=>['string'],
        'password'=>['string'] 
      ];
    }
    elseif($this->method()=='PATCH'){
        return[
            'name'=>['sometimes','string'],
        'email'=>['sometimes','string'],
        
        ];
    }
    }
}
