<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Ajouter un Administrateur</h3>
</div>

<div  class="box-body">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" class="vstack gap 3 text-black">
                @csrf

                <div class="form-group">
                    <label for="nom" class="control-label">Nom De l'Administration:</label>
                    <input type="text" name="nom" class="form-control " value="{{old('nom',$table->nom)}}">
                    @error('nom')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Nom d'utilisateur</label>:</label>
                    <input type="text" name="name" class="form-control " value="{{old('name',$table->name)}}">
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="departement_id" class="control-label">departement</label>
                    <select name="departement_id" class="form-control">
                        <option value="{{$table->departement_id}}">{{$departement->nom}}</option>
                        <option value=""></option>
                        @foreach ($departements as $cate )
                            <option value="{{$cate->id}}">{{$cate->nom}}</option>
                        @endforeach
                    </select>
                    @error('departement_id')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group" style="display: none;">
                    <label for="role" class="control-label">Role</label>
                    <input type="text" name="role" class="form-control " value="Admin">
                    @error('role')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="service" class="control-label">service</label>
                    <select name="service" class="form-control">
                        <option value="{{$table->service}}">{{$table->service}}</option>
                        @foreach ($services as $cate )
                            <option value="{{$cate}}">{{$cate}}</option>
                        @endforeach
                    </select>
                    @error('service')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control " value="{{old('email',$table->email)}}">
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>                      
                        @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Mot de passe:</label>
                    <input type="text" name="password" class="form-control " value="{{old('password')}}">
                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="confirm_password" class="control-label">Confirmer le mot de passe:</label>
                    <input type="text" name="confirm_password" class="form-control " value="{{old('confirm_password')}}">
                    @error('confirm_password')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
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
