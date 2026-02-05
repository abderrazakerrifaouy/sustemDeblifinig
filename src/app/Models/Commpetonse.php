<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commpetonse extends Model
{
    protected $fillable = [
        'name',
        'id_formation',
    ];
    public function formation()
    {
        return $this->belongsTo(formation::class, 'formation_id');
    }
}
