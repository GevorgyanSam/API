<?php

namespace App\Http\Requests\API\V1\Websites;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['bail', 'required', 'email:filter,rfc,dns'],
        ];
    }
}
