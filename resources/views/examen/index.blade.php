@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto mt-5">
            <h2>Liste des Examens</h2>

            <div class="d-flex justify-content-between align-items-center ">
                <a href="{{route('examen.create')}}" class="btn btn-success my-3">Ajouter</a>
                <a href="{{route('examen.result.create')}}" class="btn btn-warning my-3 text-white">Enregistrer les notes</a>
            </div>
            <table class="table table-striped shadow">
                @if (session()->has('success'))
                    <div class="alert alert-success text-center my-2">
                        {{session()->get('success')}}
                    </div>
                @endif
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Cours</th>
                    <th>Actions</th>
                </tr>
                @foreach ($examens as $examen)
                    <tr>
                        <td>{{$examen->id}}</td>
                        <td>{{$examen->title}}</td>
                        <td>{{$examen->date}}</td>
                        <td>{{$examen->course->name}}</td>
                        <td>
                            <a href="{{route('examen.edit',$examen->id)}}" class="btn btn-success">Modifier</a>
                            <form action = "{{route('examen.destroy',$examen->id)}}" method="POST" class="d-inline">
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