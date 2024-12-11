@extends('admin.dashboard')

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
</div>

<div  class="box-body">
    <div class="">
        <div class="table-responsive">
            <table class="table table-hover table-responsible table-striped">
                <thead>
                    <th>Type</th>
                    <th>Statut</th>
                    <th>Valider</th>
                    <th>Date d'envoie</th>
                    <th>Nom Etudiant</th>
                    <th>Matricule</th>
                    <th>Detail</th>
                </thead>
                <tbody>
                    @foreach ($Listes as $Liste )
                        <tr>
                            <td>{{$Liste->type}}</td>
                            <td>{{$Liste->statut}}</td>
                            <td>{{$Liste->confirm_direction}}</td>
                            <td>{{$Liste->created_at}}</ontd>
                            <td>{{$Liste->etudiant->nom}}</td>
                            <td>{{$Liste->etudiant->matricule}}</td>
                            
                            <td><a  href = "{{route('admin.demande.show',['table'=>$Liste])}} ">
                                <button type="edit">Details</button></a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{$Listes->links()}}






@endsection