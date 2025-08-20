@extends('layout')

@section('content')
    <div class="wrapper w-30 shadow m-auto p-4 mt-5">
        <h2>Ajouter Un Cour</h2>

        <form class="mt-4" action="{{route('course.store')}}" method="POST" class="mt-4"> 
            @csrf
            <div class="form-group mb-3">
                <input type="text" name="name" placeholder="Nom du cour" class="form-control">
                @error('name') <div class="text-danger">{{$message}}</div>@enderror
            </div>
            <div class="form-group mb-3">
                <textarea type="text" name="description" placeholder="Description du cours" cols="20" rows="3" class="form-control"></textarea>
                @error('description') <div class="text-danger">{{$message}}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
            <a href="{{route('course.view')}}" class="btn btn-info">Annuler</a>
        </form>
    </div>
@endsection