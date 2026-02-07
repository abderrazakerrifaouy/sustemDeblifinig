<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date', 'formation_id'];

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }
}
