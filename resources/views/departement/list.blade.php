@extends('dashboard')

@section('title', 'Liste des pharmacie')
@section('content')
<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Liste des departements</h3>
    <div class="box-tools pull-right">
        <div class="has-feedback">
            <input type="text" class="form-control input-sm" name="recherch" id="Re" placeholder="Recherche par Designation......"/>
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <a href="{{route('departement.create')}}" id="aj"  class="btn btn-success glyphicon glyphicon-plus" > Ajouter</a>
        </div>
    </div>
</div>

<div  class="box-body">
    <div class="">
        <div class="table-responsive">
            <table class="table table-hover table-responsible table-striped">
                <thead>
                    <th>Id</th>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Description</th>
                    
                    <th>Modifier</th>
                    <th>Suprimer</th>
                </thead>
                <tbody>
                    @foreach ($Listes as $Liste )
                        <tr>
                            <td>{{$Liste->id}}</td>
                            <td>{{$Liste->code}}</td>
                            <td>{{$Liste->nom}}</td>
                            <td>{{$Liste->description}}</td>
                            
                            <td><a  href = "{{route('departement.update',['table'=>$Liste])}} ">
                                <button type="edit">Modifier</button></a></td>
                            <td><a  href = "{{route('departement.delete',['table'=>$Liste])}} ">
                                <button type="edit">Suprimer</button></a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{$Listes->links()}}

@endsection