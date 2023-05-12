<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:projects',
            'description' => 'required',
            'client_id' => 'required|exists:clients,id',
            'status' => 'nullable|boolean'
        ];
    }

}
