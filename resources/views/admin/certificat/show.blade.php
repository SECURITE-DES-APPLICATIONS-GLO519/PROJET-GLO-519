@extends('admin.dashboard')

@section('title', "Ajout d'information")

@section('content')
<div class="student-info">
    <h2>Informations de l'étudiant</h2>
    <ul>
        <li><strong>Nom :</strong> {{$etudiant->nom}}</li>
        <li><strong>Prénom :</strong> {{$etudiant->prenom}}</li>
        <li><strong>Matricule :</strong> {{$etudiant->matricule}}</li>
        <li><strong>Date de naissance :</strong>{{$etudiant->date_naissance}}</li>
        <li><strong>Niveau :</strong>{{$etudiant->niveau}}</li>
        <li><strong>Cycle :</strong>{{$etudiant->cycle}}</li>
        <li><strong>Téléphone :</strong>{{$etudiant->telephone}}</li>
    </ul>
</div>
<div class="demande-info">
    <h2>Information sur la demande</h2>
    <ul>
        <li><strong>Type :</strong> {{$demande->type}}</li>
        <li><strong>Statut :</strong> {{$demande->statut}}</li>
        <li><strong>Date d'envoi :</strong> {{$demande->created_at}}</li>
    </ul>
</div>
<div class="demande-info">
    <h2>Information sur la pieces jointes</h2>
@if(!$demande->quitus)
    
@else
@foreach ($demande->quitus as $quitus )
    <div class="">
        <ul>
            <li><strong> Type :</strong> Quitus</li>
            <li><strong> annee </strong> {{$quitus->annee}}</li>
            <li><strong> niveau </strong> {{$quitus->niveau}}</li>
            <li><img src="{{ asset("storage/quitus/{$quitus->url}")}}" alt="Image du quitus" /></li>
        </ul>
    </div>
    @endforeach  
@endif
@if(!$demande->quitus)
    
@else
@foreach ($demande->relevers as $relever )
    <div class="">
        <ul>
            <li><strong> Type :</strong> Quitus</li>
            <li><strong> annee </strong> {{$relever->annee}}</li>
            <li><strong> niveau </strong> {{$relever->niveau}}</li>
            <li><img src="{{ asset("storage/releve/{$relever->url}")}}" alt="Image du releves" /></li>
        </ul>
    </div>
    @endforeach  
@endif
</div>
<center class="mt-1">
    <button class="btn btn-new me-2">
            <a href="{{route('admin.demande.valider',['table'=>$demande])}}">Valider la demande</a>
    </button >
</center>



@endsection
