@extends('layout')
@section('content')
     <div class="wrapper w-30 shadow m-auto p-4 mt-5">
        <h2>Enregistrer un Resultat</h2>
        <form action="{{route('examen.result.store')}}" method="POST" class="mt-4">
            @csrf
            <div class="form-group mb-3">
                <select name="student_id" class="form-control">
                    <option value=""> --Etudiant</option>
                    @foreach ($students as $student)
                        <option value="{{$student->id}}">{{$student->firstName.' '.$student->lastName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <select name="examen_id" class="form-control">
                    <option value=""> --Examen</option>
                    @foreach ($exams as $exam)
                        <option value="{{$exam->id}}">{{$exam->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <input type="number" class="form-control" name="note" placeholder="La note">
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{route('examen.view')}}" class="btn btn-info">Annuler</a>
        </form>
@endsection