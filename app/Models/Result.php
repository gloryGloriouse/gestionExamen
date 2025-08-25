<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Examen;
use App\Models\Student;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'student_id',
        'examen_id',
        'grade'
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function examen(){
        return $this->belongsTo(Examen::class, 'examen_id');
    }
}
