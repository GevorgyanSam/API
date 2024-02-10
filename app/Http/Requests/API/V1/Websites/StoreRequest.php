<?php

namespace App\Http\Requests\API\V1\Websites;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['bail', 'required', 'max:255', 'unique:websites']
        ];
    }
}
