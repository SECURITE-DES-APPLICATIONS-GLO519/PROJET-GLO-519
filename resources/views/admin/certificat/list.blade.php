@extends('etudiant.dashboard')

@section('title', "Ajout d'information")

@section('content')
<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Liste des demandes</h3>
    <div class="box-tools pull-right">
        <div class="has-feedback">
            <input type="text" class="form-control input-sm" name="recherch" id="Re" placeholder="Recherche par Designation......"/>
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <a href="{{route('etudiant.certificat.add')}}" id="aj"  class="btn btn-success glyphicon glyphicon-plus" > Ajouter</a>
        </div>
    </div>
</div>

<div  class="box-body">
    <div class="">
        <div class="table-responsive">
            <table class="table table-hover table-responsible table-striped">
                <thead>
                    <th>Id</th>
                    <th>Statut</th>
                    <th>Valider</th>
                    <th>Date d'envoie</th>
                    <th>Voir les details</th>
                    <th>Annuler Demandes</th>
                </thead>
                <tbody>
                    @foreach ($Listes as $Liste )
                        <tr>
                            <td>{{$Liste->id}}</td>
                            <td>{{$Liste->statut}}</td>
                            <td>{{$Liste->confirm_direction}}</td>
                            <td>{{$Liste->created_at}}</ontd>
                            
                            <td><a  href = "{{route('etudiant.certificat.show',['table'=>$Liste])}} ">
                                <button type="edit">Voir les details</button></a></td>
                            <td><a  href = "{{route('etudiant.certificat.annuler',['table'=>$Liste])}} ">
                                <button type="edit">Annuler</button></a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{$Listes->links()}}






@endsection