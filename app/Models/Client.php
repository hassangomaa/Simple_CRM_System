<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'email', 'phone', 'image'];

    protected $dates = ['deleted_at'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
