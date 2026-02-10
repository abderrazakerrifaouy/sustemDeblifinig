<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commpetonse extends Model
{
    protected $fillable = ['name', 'formation_id'];
    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }
}

