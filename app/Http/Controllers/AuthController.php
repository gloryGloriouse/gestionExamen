<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;   
use Illuminate\Support\Facades\Auth;   
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //formulaire de connexion
    public function loginForm() {
        return view('auth\login');
    }

    public function logIn(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        //only() pour preciser ce quon veut recuperer
        $credentials = $request->only("email","password");
        if (Auth::attempt($credentials)){
            return redirect()->intended("students")
              ->withSuccess("Connexion Reussie");
        }else{
            return redirect()->route("login")->withSuccess("Identifiants Incorrect");
        }
    }

    public function registration(){
        return view('auth\registration');
    }

    //enregistrement de user
     public function userRegistration(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:8"
        ]);

        $data = $request->all();
        $check = User::create([
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => Hash::make($data['password'])
        ]);

        if ($check){
            return redirect()->route("student.view")
             ->withSuccess('Vous etes Enregistrer');
        }else {
            return redirect()->route("login")->withSuccess('Echec d\'enregistrement');
        }
    }

    public function logOut(){
        Session::flush();
        auth()->logout();
        //Auth::logout();
        return redirect()->route("login");
    }
}
