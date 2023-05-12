<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:clients,email,' . $this->client,
            'phone' => 'sometimes|required',
            'image' => 'nullable|image',
        ];
    }
}
