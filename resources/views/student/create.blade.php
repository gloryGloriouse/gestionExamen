@extends('layout')

@section('content')
   @if(isset($student))
        <div class="wrapper w-30 shadow m-auto p-4 mt-3">
            <h2>Modifier Un Etudiant</h2>

            <form class="mt-4" action="{{route('student.update',$student->id)}}" method="POST" class="mt-4"> 
                @csrf
                @method("PUT")
               <div class="form-group mb-3">
                    <input type="text" name="firstName" value="{{$student->firstName}}" class="form-control">
                    @error('firstName') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="lastName" value="{{$student->lastName}}" class="form-control">
                    @error('lastName') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="email" value="{{$student->email}}" class="form-control">
                    @error('email') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="mobile" value="{{$student->mobile}}" class="form-control">
                    @error('mobile') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="adresse" value="{{$student->adresse}}" class="form-control">
                    @error('adresse') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <select class="form-control" name="filiere_id">
                        <option value="">--filiere</option>
                        @foreach ($filieres as $filiere)
                            <option value="{{$filiere->id}}"
                                @if ($filiere->id == $student->filiere_id)
                                    selected
                                @endif
                            >{{$filiere->name}}</option>
                        @endforeach
                    </select>
                    @error('filiere_id') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                
                <button type="submit" class="btn btn-success">Modifier</button>
                <a href="{{route('student.view')}}" class="btn btn-info">Annuler</a>
            </form>
        </div>
    @else
        <div class="wrapper w-20 shadow m-auto p-4 mt-5">
            <h2>Ajouter Un Etudiant</h2>
            <form class="mt-4" action="{{route('student.store')}}" method="POST" class="mt-4"> 
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="firstName" placeholder="Nom de l'etudiant" class="form-control">
                    @error('firstName') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="lastName" placeholder="Prenom de l'etudiant" class="form-control">
                    @error('lastName') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="email" placeholder="Email" class="form-control">
                    @error('email') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="mobile" placeholder="Numero de Telephone" class="form-control">
                    @error('mobile') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="adresse" placeholder="Adresse" class="form-control">
                    @error('adresse') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <select class="form-control" name="filiere_id">
                        <option value="">--filiere</option>
                        @foreach ($filieres as $filiere)
                            <option value="{{$filiere->id}}">{{$filiere->name}}</option>
                        @endforeach
                    </select>
                    @error('filiere_id') <div class="text-danger">{{$message}}</div>@enderror
                </div>
                
                <button type="submit" class="btn btn-success">Ajouter</button>
                <a href="{{route('student.view')}}" class="btn btn-info">Annuler</a>
            </form>
        </div>
    @endif 
    
@endsection