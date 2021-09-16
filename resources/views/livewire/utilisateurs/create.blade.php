<div class="card-body">
    <div class="">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'ajout d'un nouvel administrateur</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" wire:submit.prevent="addUser()">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Nom Complet</label>
                <input required type="text" value="{{ old('name') }}" class="form-control @error('newUser.name') is-ivalid @enderror" wire:model="newUser.name">
               @error("newUser.name")
                   <span class="text-danger">{{ $message }}</span>
               @enderror
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" value="{{ old('email') }}" class="form-control @error('newUser.email') is-ivalid @enderror" wire:model="newUser.email">
                @error("newUser.email")
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <div class="form-group">
                <label>Sexe</label>
                <select required class="form-control @error('newUser.sexe') is-ivalid @enderror" wire:model="newUser.sexe">
                    <option>------------</option>
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
                @error("newUser.sexe")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Adresse</label>
                <input type="text"  required value="{{ old('adresse') }}" class="form-control @error('newUser.adresse') is-ivalid @enderror" wire:model="newUser.adresse">
                @error("newUser.adresse")
                <span class="text-danger">{{ $message }}</span>
                @enderror
             </div>
            <div class="d-flex">
              <div class="form-group flex-grow-1 mr-2">
                <label>Pays</label>
                <input required type="text" value="{{ old('pays') }}" required class="form-control @error('newUser.pays') is-ivalid @enderror"  wire:model="newUser.pays">
                @error("newUser.pays")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group flex-grow-1">
                <label>Ville</label>
                <input type="text" value="{{ old('ville') }}" required class="form-control @error('newUser.ville') is-ivalid @enderror" wire:model="newUser.ville">
                @error("newUser.ville")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

              <div class="form-group">
                <label >Password</label>
                <input type="text" class="form-control" disabled placeholder="Password">
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retourner à la liste des administrateurs</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
    </div>
</div>

<script>
    window.addEventListener("ShowSuccessMessage", event=>{
        Swal.fire({
            position : 'top-end',
            icon: 'success',
            toast:true,
            title:event.detail.message || 'Opération effecctuée avec succès!!',
            showConfirmButton: false,
            timer: 3000
        })
    })
</script>
