<div class="card-body">
    <div class="">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'édition d'un administrateur</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" wire:submit.prevent="updateUser()">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Nom Complet</label>
                <input type="text" class="form-control @error('editUser.name') is-ivalid @enderror" wire:model="editUser.name">
               @error("editUser.name")
                   <span class="text-danger">{{ $message }}</span>
               @enderror
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control @error('editUser.email') is-ivalid @enderror" wire:model="editUser.email">
                @error("editUser.email")
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <div class="form-group">
                <label>Sexe</label>
                <select class="form-control @error('editUser.sexe') is-ivalid @enderror" wire:model="editUser.sexe">
                    <option>------------</option>
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
                @error("editUser.sexe")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Adresse</label>
                <input type="text" class="form-control @error('editUser.adresse') is-ivalid @enderror" wire:model="editUser.adresse">
                @error("editUser.adresse")
                <span class="text-danger">{{ $message }}</span>
                @enderror
             </div>
            <div class="d-flex">
              <div class="form-group flex-grow-1 mr-2">
                <label>Pays</label>
                <input type="text" class="form-control @error('editUser.pays') is-ivalid @enderror"  wire:model="editUser.pays">
                @error("editUser.pays")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group flex-grow-1">
                <label>Ville</label>
                <input type="text" class="form-control @error('editUser.ville') is-ivalid @enderror" wire:model="editUser.ville">
                @error("editUser.ville")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
