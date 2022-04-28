<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;

class Milestone extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'task_id',
        'user_id',
        'name',
        'start',
        'end',
        'total',
        'completed'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
