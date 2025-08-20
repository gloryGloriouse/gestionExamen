@extends('layout')

@section('content')
    <div class="wrapper w-30 shadow m-auto p-4 mt-3">
        <h2>Modifier Une Filieres</h2>

        <form class="mt-4" action="{{route('filiere.update',$filiere->id)}}" method="POST" class="mt-4"> 
            @csrf
            @method("PUT")
            <div class="form-group mb-3">
                <input type="text" name="name" value="{{$filiere->name}}" class="form-control">
                @error('name') <div class="text-danger">{{$message}}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success">Modifier</button>
            <a href="{{route('filieres.view')}}" class="btn btn-info">Annuler</a>
        </form>
    </div>
@endsection