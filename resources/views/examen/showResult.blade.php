@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-9 mx-auto mt-5">
            <h2>Liste des Resultats</h2>
            <a href="{{ auth()->check()? route('examen.view') : route('login')}}" class="btn btn-success my-3">Retour</a>
            <table class="table table-striped shadow">
                @if (session()->has('success'))
                    <div class="alert alert-success text-center my-2">
                        {{session()->get('success')}}
                    </div>
                @endif
                <tr>
                    <th>#</th>
                    <th>Etudiant</th>
                    <th>Examen</th>
                    <th>Note</th>
                    <th>Mention</th>
                    <th>Decision</th>
                </tr>
                @foreach ($results as $result)
                    <tr>
                        <td>{{$result->id}}</td>
                        <td>{{$result->student->firstName. ' '.$result->student->lastName}}</td>
                        <td>{{$result->examen->title}}</td>
                        <td>{{$result->note}}</td>
                        <td>{{$result->grade}}</td>
                        <td>
                            @if ($result->note >= 10)
                                <span class="text-success py-2 text-center rounded 
                                shadow d-block" style="width:100px;">
                                    Valider
                                </span>
                            @else 
                                <span class="text-danger py-2 text-center rounded 
                                shadow d-block" style="width:100px;">
                                    Echouer
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection