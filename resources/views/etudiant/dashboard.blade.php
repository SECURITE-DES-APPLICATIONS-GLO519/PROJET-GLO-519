<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <link rel="icon" href="{{asset('icon.png')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" crossorigin="anonymous"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('base.css')}}">

</head>
<header>
    <nav id="1" class="navbar navbar-expand-md">
        <div class="container-fluid">
            <div class="site-logo">
                <a href="/" rel="home">
                    <img src="{{asset('icon.png')}}" alt="LOGO" width="50" height="50" class="header image is-logo-image lazy loaded">
                </a>
            </div>
            <div class="navbar-collapse">
                <div class="navbar-nav ms-auto">
                    @auth
                        <button class="btn btn-medium">{{Auth::user()->name}}</button>
                        <form class="nav-item" action="{{route('auth.logout')}}" method="POST">
                            @method("delete")
                            @csrf
                            <button class="btn btn-black">se deconnecter</button>
                        </form>
                    @endauth
                    @guest
                        <div class="nav-item">
                            <a href="{{route('auth.login')}}">se connecter</a>
                        </div>
                    @endguest
                </div>
            </div>  
        </div>
    </nav>
</header>

<body>
<div class="container">
    <aside>
        <section class="sidebar" style="height: auto;">
            <!-- Sidebar user panel -->
            <div class="user-panel">
            <div class="pull-left image-panel">
                <img src="{{asset('icon.png')}}" class="image-profil" alt="User Image">
            </div>
                <div class="pull-left info-panel">
                    <p id="nomPre">{{Auth::user()->name}}</p>            
                </div>
            </div>
        <nav>
            <ul>
                <li><a href="{{route('etudiant.index')}}">Accueil</a></li>
                <li><a href="{{route('etudiant.show_information')}}">Information</a></li>
                <li><a href="{{route('etudiant.certificat.list')}}">Demande de certificat de scolarite</a></li>
                <li><a href="{{route('etudiant.releve.list')}}">Demande de releve de note</a></li>
                <li><a href="{{route('etudiant.diplome.list')}}">Demande de retrait du diplone</a></li>
            </ul>
        </nav>
        </section>
    </aside>

    <main>
        <div class="box">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @yield('content')
        </div>
    </main>
</div>
    
</body>
</html>