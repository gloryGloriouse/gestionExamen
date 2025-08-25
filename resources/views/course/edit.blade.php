@extends('layout')

@section('content')
    <div class="wrapper w-30 shadow m-auto p-4 mt-4">
        <h2>Modifier Un Cour</h2>

        <form class="mt-4" action="{{route('course.update',$course->id)}}" method="POST" class="mt-4"> 
            @csrf
            @method("PUT")
            <div class="form-group mb-3">
                <input type="text" name="name" value="{{$course->name}}" class="form-control">
                @error('name') <div class="text-danger">{{$message}}</div>@enderror
            </div>
            <div class="form-group mb-3">
                <textarea type="text" name="description"  cols="20" rows="3" class="form-control">{{$course->description}}</textarea>
                @error('description') <div class="text-danger">{{$message}}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success">Modifier</button>
            <a href="{{route('course.view')}}" class="btn btn-info">Annuler</a>
        </form>
    </div>
@endsection