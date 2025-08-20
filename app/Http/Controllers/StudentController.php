<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Filiere;

class StudentController extends Controller
{
    public function student(){
        $students = Student::with('filiere')->get();
        return view("student\index", compact('students'));
    }

    public function create(){
        $filieres = Filiere::all();
        return view("student\create",compact("filieres"));
    }

    public function store(Request $request){
        $valid = $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required|email",
            "mobile" => "required|min:9",
            "adresse" => "required",
            "filiere_id" => "required|exists:filieres,id"
        ]);

        Student::create($valid);
        return redirect()->route("student.view")->with("success","Etudiant creer avec sucess");
    }

    public function edit(Student $student){
        $filieres = Filiere::all();
        return view("student\create", compact("student","filieres"));
    }

    public function update(Request $request, int $id){
        $valid = $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required|email",
            "mobile" => "required|min:9",
            "adresse" => "required",
            "filiere_id" => "required|exists:filieres,id"
        ]);

        Student::where('id', $id)->update($valid);
        return redirect()->route("student.view")->with("success","Etudiant Modifier avec sucess");
    }

    public function destroy(Student $student){
        $result = $student->delete();

        if ($result){
            return redirect()->route("student.view")->with("success","Etudiant supprimer avec sucess");
        }else{
            return redirect()->route("student.view")->with("error","Erreur de supression de l'etudiant");
        }
    }
}
