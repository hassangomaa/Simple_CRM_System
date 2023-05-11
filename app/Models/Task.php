<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'description', 'completed', 'project_id'];

    protected $dates = ['deleted_at'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
