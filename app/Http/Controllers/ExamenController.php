<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;
use App\Models\Course;

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
}
