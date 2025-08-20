<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Filiere;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        "firstName",
        "lastName",
        "email",
        "mobile",
        "adresse",
        "filiere_id"
    ];

    public function filiere(){
       return $this->belongsTo(Filiere::class,'filiere_id');
    }
}
