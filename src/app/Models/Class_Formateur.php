<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Class_Formateur extends Model
{
    protected $fillable = ['id_formateur', 'id_classe', 'is_principal'];
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe');
    }
    public function formateur()
    {
        return $this->belongsTo(User::class, 'id_formateur')->where('role', 'Formateur');
    }
}
