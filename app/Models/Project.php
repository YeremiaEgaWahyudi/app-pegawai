<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'status',
        'quota',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'project_employee')
            ->withPivot('role', 'status', 'joined_at', 'left_at')
            ->withTimestamps();
    }

    public function getActiveCountAttribute()
    {
        return $this->employees()
            ->wherePivot('status', 'aktif')
            ->count();
    }

    public function hasAvailableQuota()
    {
        return $this->active_count < $this->quota;
    }

    public function getRemainingQuotaAttribute()
    {
        return $this->quota - $this->active_count;
    }
}
