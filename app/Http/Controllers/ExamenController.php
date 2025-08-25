<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;
use App\Models\Student;
use App\Models\Course;
use App\Models\Result;

class ExamenController extends Controller
{
      public function examen(){
        $examens = Examen::with('course')->get();
        return view("examen\index", compact('examens'));
    }

    public function create(){
        $courses = Course::all();
        return view("examen\create",compact("courses"));
    }

    public function store(Request $request){
        $valid = $request->validate([
            'title' => 'required', 
            'date' => 'required|date',
            'course_id' => 'required|exists:courses,id'
        ]);

        Examen::create($valid);
       
        return redirect()->route("examen.view")->with("success","Examen creer avec sucess");
    }

    public function edit(Examen $examen){
        $courses = Course::all();
        return view("examen\create", compact("examen","courses"));
    }

    public function update(Request $request, int $id){
        $valid = $request->validate([
            'title' => 'required', 
            'date' => 'required|date',
            'course_id' => 'required|exists:courses,id'
        ]);

        Examen::where('id', $id)->update($valid);
        return redirect()->route("examen.view")->with("success","Examen Modifier avec sucess");
    }

    public function destroy(Examen $examen){
        $result = $examen->delete();

        if ($result){
            return redirect()->route("examen.view")->with("success","Examen supprimer avec sucess");
        }else{
            return redirect()->route("examen.view")->with("error","Erreur de supression de l'examen");
        }
    }

    public function createresult(){
        $students = Student::all();
        $exams = Examen::all();
        return view('examen\storeResult',compact('students','exams'));
    }

    public function storeresult(Request $request){
       $valid = $request->validate([
            'note' => 'required', 
            'student_id' => 'required|exists:students,id',
            'examen_id' => 'required|exists:examens,id'
        ]);

        $note = $request->note;
        $grade = 'null';

        if ($note <= 5){
            $grade = 'nulle';
        }elseif ($note <= 7) {
            $grade = 'Faible';
        }elseif($note <= 9){
            $grade = 'Insuffissante';
        }elseif($note <= 11){
            $grade = 'Passable';
        }elseif ($note <= 13) {
            $grade = 'Assez bien';
        }elseif($note <= 15){
            $grade = 'Bien';
        }elseif($note <= 17){
            $grade = 'Tres bien';
        }elseif($note <= 19){
            $grade = 'Excellent';
        }elseif ($note == 20) {
            $grade = "Honorable";
        }

        Result::create([
            'note' => $valid['note'],
            'student_id' => $valid['student_id'],
            'examen_id' => $valid['examen_id'],
            'grade' => $grade
        ]);

        return redirect()->route('examen.result.show')->with('success','Resultat enregistrer avec Success');
    }

    public function showresult(){
        $results = Result::all();
        return view('examen\showResult',compact('results'));
    }
}
