@extends('layout')

@section('content')
    <div class="wrapper w-30 shadow m-auto p-4 mt-3">
        <h2>Ajouter Une Filieres</h2>

        <form class="mt-4" action="{{route('filiere.store')}}" method="POST" class="mt-4"> 
            @csrf
            <div class="form-group mb-3">
                <input type="text" name="name" placeholder="Nom de la filiere" class="form-control">
                @error('name') <div class="text-danger">{{$message}}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
            <a href="{{route('filieres.view')}}" class="btn btn-info">Annuler</a>
        </form>
    </div>
@endsection