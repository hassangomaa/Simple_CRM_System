<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:projects,name,' . $this->project->id,
            'description' => 'required',
            'client_id' => 'required|exists:clients,id',
            'deadline' => 'nullable|date_format:Y-m-d',
            'assigned_user_id' => 'nullable|exists:users,id',
            'status' => 'nullable|boolean'
        ];
    }
}
