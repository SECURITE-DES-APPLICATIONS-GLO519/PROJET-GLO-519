@extends('etudiant.dashboard')

@section('title', "Ajout d'information")

@section('content')
<div class="student-info">
    <h2>Informations de l'étudiant</h2>
    <ul>
        <li><strong>Nom :</strong> {{$table->nom}}</li>
        <li><strong>Prénom :</strong> {{$table->prenom}}</li>
        <li><strong>Matricule :</strong> {{$table->matricule}}</li>
        <li><strong>Date de naissance :</strong>{{$table->date_naissance}}</li>
        <li><strong>Niveau :</strong>{{$table->niveau}}</li>
        <li><strong>Cycle :</strong>{{$table->cycle}}</li>
        <li><strong>Email :</strong>{{$user->email}}</li>
        <li><strong>Téléphone :</strong>{{$table->telephone}}</li>
    </ul>
</div>
<center class="mt-1">
    <button class="btn btn-new me-2">
            <a href="{{route('etudiant.add_information')}}">Modifier</a>
    </button >
</center>



@endsection
