<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    protected $fillable = ['name', 'formation_id', 'anneDetudiant', 'is_active'];

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }
    public function formateurs()
    {
        return $this->belongsToMany(User::class, 'formateur_classes', 'class_id', 'user_id')->withPivot('is_principal');
    }
}
