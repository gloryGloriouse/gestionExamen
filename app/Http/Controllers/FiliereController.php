<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;

class FiliereController extends Controller
{
    public function viewfiliere(){
        $filieres = Filiere::all();

        return view("filiere.index",compact('filieres'));
    }

    //aller dans le form pour creer la fil 
    public function createFil(){
        return view("filiere/create");
    }

    //enregitrer une filiere
    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        Filiere::create($validate);
        return redirect()->route('filieres.view')->with('success',"Filiere enregistrer avec sucess");
        //with()... pour renvoyer un mesage en cas de reussit
    }

    public function edit(Filiere $filiere){
        return view('filiere/edit',compact('filiere'));
    }

    public function update(Request $request,int $id){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        Filiere::where('id',$id)->update($validate);
        return redirect()->route('filieres.view')->with('success', "Filiere Modifier avec success");
    }

    public function destroy(Filiere $filiere){
        $result = $filiere->delete();

        if($result){
            return redirect()->route('filieres.view')->with('success', "Filiere Supprimer avec success");
        }else{
             return redirect()->route('filieres.view')->with('error', "Echec de suppression de filiere ");
        }
    }
}
