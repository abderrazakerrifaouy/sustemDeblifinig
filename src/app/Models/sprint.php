<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sprint extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'formation_id',
    ];

    public function formation()
    {
        return $this->belongsTo(formation::class, 'formation_id');
    }
}
