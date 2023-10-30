<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBooksRequest extends FormRequest
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
    {
        if ($this->method() == 'PUT') {
            return [
                'user_id' => ['integer'],
                'booksName' => ['String'],
                'author' => ['String'],
                'publication'=>['String'],
               
                'rent' => ['Boolean'],
            ];
        } elseif ($this->method() == 'PATCH') {
            return [
                'user_id' => ['sometimes', 'integer'],
                'booksName' => ['sometimes', 'String'],
                'author' => ['sometimes', 'String'],
                'publication' => ['sometimes', 'String'],
                
                'rent' => ['sometimes','Boolean']
            ];
        }
    }
}
