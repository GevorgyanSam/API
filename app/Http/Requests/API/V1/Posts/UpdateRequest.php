<?php

namespace App\Http\Requests\API\V1\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'max:255'],
            'description' => ['bail', 'required', 'max:1000'],
        ];
    }
}
