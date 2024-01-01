<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_name',
        'priority',
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
