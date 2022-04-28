<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use App\Models\ProjectStatus;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'estimate_end',
        'progress',
        'active',
        'status_id'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function status()
    {
        return $this->belongsTo(ProjectStatus::class, 'status_id');
    }
    
}
