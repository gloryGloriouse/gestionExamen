@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto mt-5">
            <h2>Liste des Etudiants</h2>
            <a href="{{route('student.create')}}" class="btn btn-success my-3">Ajouter</a>
            <table class="table table-striped shadow">
                @if (session()->has('success'))
                    <div class="alert alert-success text-center my-2">
                        {{session()->get('success')}}
                    </div>
                @endif
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>E-mail</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Filiere</th>
                    <th>Action</th>
                </tr>
                @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->firstName}}</td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->adresse}}</td>
                        <td>{{$student->mobile}}</td>
                        <td>{{$student->filiere->name}}</td>
                        <td>
                            <a href="{{route('student.edit',$student->id)}}" class="btn btn-success">Modifier</a>
                            <form action = "{{route('student.destroy',$student->id)}}" method="POST" class="d-inline">
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