@extends('layout')

@section('content')
   @if(isset($examen))
        <div class="wrapper w-30 shadow m-auto p-4 mt-3">
            <h2>Modifier Un Examen</h2>

            <form class="mt-4" action="{{route('examen.update',$examen->id)}}" method="POST" class="mt-4"> 
                @csrf
                @method("PUT")
               <div class="form-group mb-3">
                    <input type="text" name="title" value="{{$examen->title}}" class="form-control">
                    @error('title') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <input type="dateTime-local" name="date" value="{{$examen->date}}" class="form-control">
                    @error('date') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <select class="form-control" name="course_id">
                        <option value="">--Cour</option>
                        @foreach ($courses as $course)
                            <option value="{{$course->id}}"
                                @if ($course->id == $examen->course_id)
                                    selected
                                @endif
                            >{{$course->name}}</option>
                        @endforeach
                    </select>
                    @error('course_id') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                
                <button type="submit" class="btn btn-success">Modifier</button>
                <a href="{{route('examen.view')}}" class="btn btn-info">Annuler</a>
            </form>
        </div>
    @else
        <div class="wrapper w-20 shadow m-auto p-4 mt-5">
            <h2>Ajouter Un Examen</h2>
            <form class="mt-4" action="{{route('examen.store')}}" method="POST" class="mt-4"> 
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="title" placeholder="Titre de l'examen" class="form-control">
                    @error('title') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <input type="date" name="date" placeholder="Date de l'examen" class="form-control">
                    @error('date') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <select class="form-control" name="course_id">
                        <option value="">--Cour</option>
                        @foreach ($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                    @error('course_id') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                
                <button type="submit" class="btn btn-success">Ajouter</button>
                <a href="{{route('examen.view')}}" class="btn btn-info">Annuler</a>
            </form>
        </div>
    @endif 
    
@endsection