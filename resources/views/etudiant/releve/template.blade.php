<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Informations</h3>
</div>
<div  class="box-body">
    <div class="card">
        <div class="card-body">
            <div class="student-info">
                <h2>Informations de l'étudiant</h2>
                <ul>
                    <li><strong>Nom :</strong> {{$etudiant->nom}}</li>
                    <li><strong>Prénom :</strong> {{$etudiant->niveau}}</li>
                    <li><strong>Date naissance :</strong> {{$etudiant->date_naissance}}</li>
                    <li><strong>Niveau :</strong>{{$etudiant->niveau}}</li>
                    <li><strong>Cycle :</strong>{{$etudiant->cycle}}</li>
                </ul>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="vstack gap 3 text-black">
                @csrf
                <h3 class="box-title fa fa-flask">Information liees au quitus 1</h3>
                <div class="form-group">
                    <label for="niveau" class="control-label">niveau:</label>
                    <input type="text" name="niveau" class="form-control " value="{{old('niveau',$table->niveau)}}">
                    @error('niveau')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="annee" class="control-label">annee:</label>
                    <input type="date" name="annee" class="form-control " value="{{old('annee',$table->annee)}}">
                    @error('annee')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                @if ($quitus->url)
                    <div class="row mt-1">
                        <div class="col-md-3 center bg-danger text-light">quittus present en bd</div>
                    </div>
                    <div class="row mt-1">
                        <label for="url" class="label col-md-4 control-label">Insere le fichier des coordonnees:</label>
                        <div class="col-md-8">
                            <input type="file" name="url" class="form-control" value="{{old('url')}}">
                            @error("url")
                                <span class="text-danger" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @else
                    <label for="url" class="label col-md-4 control-label">Insere un quitus:</label>
                    <div class="col-md-8">
                        <input type="file" name="url" class="form-control" required value="{{old('url')}}">
                        @error("url")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
                <h3 class="box-title fa fa-flask">Information liees au quitus 2</h3>
                <div class="form-group">
                    <label for="niveau" class="control-label">niveau:</label>
                    <input type="text" name="niveau2" class="form-control " value="{{old('niveau',$table->niveau)}}">
                    @error('niveau1')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="annee" class="control-label">annee:</label>
                    <input type="date" name="annee2" class="form-control " value="{{old('annee',$table->annee)}}">
                    @error('annee')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                @if ($quitus->url)
                    <div class="row mt-1">
                        <div class="col-md-3 center bg-danger text-light">quittus present en bd</div>
                    </div>
                    <div class="row mt-1">
                        <label for="url" class="label col-md-4 control-label">Insere le fichier des coordonnees:</label>
                        <div class="col-md-8">
                            <input type="file" name="url2" class="form-control" value="{{old('url')}}">
                            @error("url2")
                                <span class="text-danger" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @else
                    <label for="url" class="label col-md-4 control-label">Insere un quitus:</label>
                    <div class="col-md-8">
                        <input type="file" name="url2" class="form-control" required value="{{old('url')}}">
                        @error("url")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                @endif

                <center class="mt-1">
                    <button class="btn btn-new me-2" type="submit" >
                        @if($table->id)
                            Modifier
                        @else
                            Enregistrer
                        @endif
                    </button >
                    <input type="reset" class="btn btn-new" value="Effacer">
                </center>
                
            </form>
        </div>
    </div>
</div>
