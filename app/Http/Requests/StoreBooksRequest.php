<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBooksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id'=>['sometimes','integer'],
            'user_id' => ['sometimes','integer'],
            'booksName' => ['required','String'],
            'author' => ['required','String'],
            'publication'=>['sometimes','String'],
            'rent' => ['sometimes','Boolean'],
        ];
    }
}
