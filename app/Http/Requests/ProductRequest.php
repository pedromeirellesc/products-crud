<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'codigo' => ['required', 'string', 'min:1', 'max:30'],
            'descricao' => ['nullable', 'string', 'min:1', 'max:60'],
        ];
    }
}
