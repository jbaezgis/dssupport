<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;
use App\Models\TaskStatus;
use App\Models\Milestone;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'user_id',
        'name',
        'details',
        'hours',
        'status_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }
}
