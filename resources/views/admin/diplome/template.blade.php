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
                <h3 class="box-title fa fa-flask">Information releve 1</h3>
                <div class="form-group">
                    <label for="niveau1" class="control-label">niveau:</label>
                    <input type="text" name="niveau1" class="form-control " value="{{old('niveau1',$table->niveau)}}">
                    @error('niveau1')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="annee1" class="control-label">annee:</label>
                    <input type="date" name="annee1" class="form-control " value="{{old('annee1',$table->annee)}}">
                    @error('annee')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                @if (0)
                    <div class="row mt-1">
                        <div class="col-md-3 center bg-danger text-light">releve present en bd</div>
                    </div>
                    <div class="row mt-1">
                        <label for="url" class="label col-md-4 control-label">Insere le releve de note:</label>
                        <div class="col-md-8">
                            <input type="file" name="url1" class="form-control" value="{{old('url1')}}">
                            @error("url1")
                                <span class="text-danger" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @else
                    <label for="url1" class="label col-md-4 control-label">Insere un releve:</label>
                    <div class="col-md-8">
                        <input type="file" name="url1" class="form-control" required value="{{old('url1')}}">
                        @error("url1")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
                <h3 class="box-title fa fa-flask">Information releve 2</h3>
                <div class="form-group">
                    <label for="niveau2" class="control-label">niveau:</label>
                    <input type="text" name="niveau2" class="form-control " value="{{old('niveau2',$table->niveau)}}">
                    @error('niveau2')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="annee2" class="control-label">annee:</label>
                    <input type="date" name="annee2" class="form-control " value="{{old('annee2',$table->annee)}}">
                    @error('annee')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                @if (0)
                    <div class="row mt-1">
                        <div class="col-md-3 center bg-danger text-light">releve present en bd</div>
                    </div>
                    <div class="row mt-1">
                        <label for="url2" class="label col-md-4 control-label">Insere le releve de note:</label>
                        <div class="col-md-8">
                            <input type="file" name="url2" class="form-control" value="{{old('url2')}}">
                            @error("url2")
                                <span class="text-danger" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @else
                    <label for="url2" class="label col-md-4 control-label">Insere un releve:</label>
                    <div class="col-md-8">
                        <input type="file" name="url2" class="form-control" required value="{{old('url2')}}">
                        @error("url2")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
                <h3 class="box-title fa fa-flask">Information releve 3</h3>
                <div class="form-group">
                    <label for="niveau3" class="control-label">niveau:</label>
                    <input type="text" name="niveau3" class="form-control " value="{{old('niveau3',$table->niveau)}}">
                    @error('niveau3')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="annee3" class="control-label">annee:</label>
                    <input type="date" name="annee3" class="form-control " value="{{old('annee3',$table->annee)}}">
                    @error('annee3')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                @if (0)
                    <div class="row mt-1">
                        <div class="col-md-3 center bg-danger text-light">releve present en bd</div>
                    </div>
                    <div class="row mt-1">
                        <label for="url3" class="label col-md-4 control-label">Insere le releve de note:</label>
                        <div class="col-md-8">
                            <input type="file" name="url3" class="form-control" value="{{old('url3')}}">
                            @error("url3")
                                <span class="text-danger" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @else
                    <label for="url3" class="label col-md-4 control-label">Insere un releve:</label>
                    <div class="col-md-8">
                        <input type="file" name="url3" class="form-control" required value="{{old('url3')}}">
                        @error("url3")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
                <h3 class="box-title fa fa-flask">Information releve 4</h3>
                <div class="form-group">
                    <label for="niveau4" class="control-label">niveau:</label>
                    <input type="text" name="niveau4" class="form-control " value="{{old('niveau4',$table->niveau)}}">
                    @error('niveau4')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="annee" class="control-label">annee:</label>
                    <input type="date" name="annee4" class="form-control " value="{{old('annee4',$table->annee)}}">
                    @error('annee4')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                @if (0)
                    <div class="row mt-1">
                        <div class="col-md-3 center bg-danger text-light">releve present en bd</div>
                    </div>
                    <div class="row mt-1">
                        <label for="url4" class="label col-md-4 control-label">Insere le releve de note:</label>
                        <div class="col-md-8">
                            <input type="file" name="url4" class="form-control" value="{{old('url4')}}">
                            @error("url4")
                                <span class="text-danger" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @else
                    <label for="url" class="label col-md-4 control-label">Insere un releve:</label>
                    <div class="col-md-8">
                        <input type="file" name="url4" class="form-control" required value="{{old('url4')}}">
                        @error("url4")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
                <h3 class="box-title fa fa-flask">Information releve 5</h3>
                <div class="form-group">
                    <label for="niveau5" class="control-label">niveau:</label>
                    <input type="text" name="niveau5" class="form-control " value="{{old('niveau5',$table->niveau)}}">
                    @error('niveau5')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="annee5" class="control-label">annee:</label>
                    <input type="date" name="annee5" class="form-control " value="{{old('annee5',$table->annee)}}">
                    @error('annee')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                @if (0)
                    <div class="row mt-1">
                        <div class="col-md-3 center bg-danger text-light">releve present en bd</div>
                    </div>
                    <div class="row mt-1">
                        <label for="url5" class="label col-md-4 control-label">Insere le releve de note:</label>
                        <div class="col-md-8">
                            <input type="file" name="url5" class="form-control" value="{{old('url5')}}">
                            @error("url5")
                                <span class="text-danger" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @else
                    <label for="url" class="label col-md-4 control-label">Insere un releve:</label>
                    <div class="col-md-8">
                        <input type="file" name="url5" class="form-control" required value="{{old('url5')}}">
                        @error("url5")
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
