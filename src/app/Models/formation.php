<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    protected $fillable = [
        'title',
        'is_active',
    ];

    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'formation_id');
    }
    public function commpetonses()
    {
        return $this->hasMany(Commpetonse::class, 'formation_id');
    }
    public function sprints()
    {
        return $this->hasMany(sprint::class, 'formation_id');
    }
}

