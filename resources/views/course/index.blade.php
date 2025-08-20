@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-9 mx-auto mt-5">
            <h2>Liste des Cours</h2>
            <a href="{{route('course.create')}}" class="btn btn-success my-3">Ajouter</a>
            <table class="table table-striped shadow">
                @if (session()->has('success'))
                    <div class="alert alert-success text-center my-2">
                        {{session()->get('success')}}
                    </div>
                @endif
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$course->description}}</td>
                        <td>
                            <a href="{{route('course.edit',$course->id)}}" class="btn btn-success">Modifier</a>
                            <form action = "{{route('course.destroy',$course->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-danger shadow mx-2">Supprimer</button>    
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection