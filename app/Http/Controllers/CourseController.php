<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function viewCourse(){
        $courses = Course::all();
        return view('course\index',compact('courses'));
    }

    //creation des cours
    public function createCourse(){
        
        return view('course\create');
    }

    public function store(Request $request){
        $validata = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Course::create($validata);
        return redirect()->route('course.view')->with('success','Cour enregistrer avec success');
    }

    public function edit(Course $course){
        return view('course\edit',compact('course'));
    }

    public function update(Request $request, int $id){
        $validata = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Course::where('id',$id)->update($validata);
        return redirect()->route('course.view')->with('success','Cour Modifier avec success');
    }

    public function destroy(Course $course){
        $result = $course->delete();

        if($result){
            return redirect()->route('course.view')->with('success', "Cour Supprimer avec success");
        }else{
             return redirect()->route('course.view')->with('error', "Echec de suppression du cour");
        }
    }
}

