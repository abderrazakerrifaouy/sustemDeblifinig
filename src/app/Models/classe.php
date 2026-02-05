<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    protected $fillable = [
        'name',
        'formation_id',
        'anneDetudiant',
        'is_active',
    ];

    public function formation()
    {
        return $this->belongsTo(formation::class, 'formation_id');
    }
}
