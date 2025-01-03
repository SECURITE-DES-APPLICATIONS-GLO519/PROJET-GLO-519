<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Informations</h3>
</div>
<div  class="box-body">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" class="vstack gap 3 text-black">
                @csrf

                <div class="form-group">
                    <label for="nom" class="control-label">Nom</label>
                    <input type="text" name="nom" class="form-control " value="{{old('nom',$table->nom)}}">
                    @error('nom')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="prenom" class="control-label">Prenom:</label>
                    <input type="prenom" name="prenom" class="form-control " value="{{old('prenom',$table->prenom)}}">
                    @error('prenom')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="matricule" class="control-label">Matricule:</label>
                    <input type="matricule" name="matricule" class="form-control " value="{{old('matricule',$table->matricule)}}">
                    @error('matricule')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="niveau" class="control-label">Niveau :</label>
                    <input type="niveau" name="niveau" class="form-control "  value="{{old('niveau',$table->niveau)}}">
                    @error('niveau')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cycle" class="control-label">cycle :</label>
                    <input type="cycle" name="cycle" class="form-control "  value="{{old('cycle',$table->cycle)}}">
                    @error('cycle')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date_naissance" class="control-label">Date Naissance :</label>
                    <input type="date" name="date_naissance" class="form-control "  value="{{old('date_naissance',$table->date_naissance)}}">
                    @error('date_naissance')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
                <div class="form-group" style="display: none;">
                    <label for="user_id" class="control-label">user_id :</label>
                    <input type="user_id" name="user_id" class="form-control " value="{{$user_id}}">
                    @error('user_id')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
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
