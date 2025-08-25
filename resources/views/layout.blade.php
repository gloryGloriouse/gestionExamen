<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css" integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success text-white">
        <div class="container-fluid">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
                <a class="navbar-brand mt-2 mt-lg-0 text-white" href="/">LOGO</a>
                @if (Route::has('login'))
                    @auth
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link  text-white"  href="{{route('student.view')}}">Etudiants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white"  href="{{route('filieres.view')}}">Filieres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('course.view')}}">Cours</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('examen.view')}}" >Examen</a>
                            </li>
                            
                        </ul>
                        <div class="d-flex align-items-end">
                            @if (Route::has('register'))
                                <li class="list-inline-item">
                                    <a class="nav-link text-white" href="{{route('register')}}" >Creer un utilisateur</a>
                                </li>
                            @endif
                            <li  class="list-inline-item"><a class="nav-link text-white" href="{{route('logout.user')}}">log Out</a></li>
                        </div>
                    @else
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                            <li class="nav-item">
                                <a class="nav-link  text-white"  href="{{route('examen.result.show')}}">Resultats</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white"  href="{{route('login')}}">Connexion</a>
                            </li>
                           
                        </ul>
                    @endauth
                @endif
            </div>
        </div>
       
    </nav>
    
    <div  class="container Justify-content-center">
    @yield('content')
    <div>
  </body>
</html>