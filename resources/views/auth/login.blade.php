@extends('layout')
@section('content')
    <main class="my-4">
        <div class="row justify-content-center mt-4">
            <div class="col-md-4 mt-4">
                @if (session()->has('success'))
                    <div class="alert alert-danger text-center my-2 text-2xl">
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="card mt-4 shadow">
                    <h3 class="card-header text-center">Se connecter</h3>
                    <div class="card-body">
                        <form action="{{route('login.user')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" name="email" placeholder="Email de l'utilisateur" class="form-control">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" placeholder="Mot de passe" class="form-control">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Remember me</label>
                                </div>
                            </div>
                            <div class = "d-grid mx-auto">
                                <button type="submit" class="btn btn-success btn-block">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection