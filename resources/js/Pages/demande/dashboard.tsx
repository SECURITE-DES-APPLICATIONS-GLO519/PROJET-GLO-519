import   '../../../css/base.css'
import { Head } from '@inertiajs/react';

export default function AdminDashboard(){
    return (
        <html lang="fr">
            <Head title="Dashboard" />
            <header>
                <nav id="1" className="navbar navbar-expand-md">
                    <div className="container-fluid">
                        <div className="site-logo">
                            <a href="/" rel="home">
                                <img src="{{asset('pharmacie.jpg')}}" alt="LOGO" width="50" height="50" className="header image is-logo-image lazy loaded"></img>
                            </a>
                        </div>
                        <div className="navbar-collapse">
                            <div className="navbar-nav ms-auto">
                                @auth
                                    <button className="btn btn-medium">Non D'utilisateur</button>
                                    <form className="nav-item" action="{{route('logout')}}" method="POST">
                                        @method("delete")
                                        @csrf
                                        <button className="btn btn-black">se deconnecter</button>
                                    </form>
                                @endauth
                                @guest
                                    <div className="nav-item">
                                        <a href="{{route('login')}}">se connecter</a>
                                    </div>
                                @endguest
                            </div>
                        </div>  
                    </div>
                </nav>
            </header>
            <body>
            <div className="container">
                <aside>
                    <section className="sidebar">
                        <div className="user-panel">
                        <div className="pull-left image-panel">
                            <img src="{{asset('photo.png')}}" className="image-profil" alt="User Image"/>
                        </div>
                            <div className="pull-left info-panel">
                                <p id="nomPre">Nom d'utilisateur</p>            
                            </div>
                        </div>
                    <nav>
                        <ul className="sidebar-menu" id="menu">
                            <li><a href="{{route('user.list')}}">User</a></li>
                            <li><a href="{{route('medicament.list')}}">Medicament</a></li>
                            <li><a href="{{route('pharmacie.list')}}">Pharmacie</a></li>
                            <li><a href="{{route('pharmacie.validate',['table'=>Auth::user()->id_pharmacie])}}">Check disponibility</a></li>
                        </ul>
                    </nav>
                    </section>
                </aside>

                <main>
                    <div className="box">
                        @if(session('success'))
                            <div className="alert alert-success">
                                Votre session
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </main>
            </div>
                
            </body>
            </html>
                );
            }

