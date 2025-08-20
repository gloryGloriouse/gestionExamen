@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto mt-5">
            <h2>Liste des filiere</h2>
            <a href="{{route('filieres.create')}}" class="btn btn-success my-3">Ajouter</a>
            <table class="table table-striped shadow">
                @if (session()->has('success'))
                    <div class="alert alert-success text-center my-2">
                        {{session()->get('success')}}
                    </div>
                @endif
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
                @foreach ($filieres as $filiere)
                    <tr>
                        <td>{{$filiere->id}}</td>
                        <td>{{$filiere->name}}</td>
                        <td>
                            <a href="{{route('filiere.edit',$filiere->id)}}" class="btn btn-success">Modifier</a>
                            <form action = "{{route('filiere.destroy',$filiere->id)}}" method="POST" class="d-inline">
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