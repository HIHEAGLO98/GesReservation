<div class="card-body">
    <div class="">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'ajout d'un lieu</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" wire:submit.prevent="addSalle()">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Lieu</label>
                <input type="text" class="form-control @error('newSalles.nom_salle') is-ivalid @enderror" wire:model="newSalles.libelle_salle">
               @error("newSalles.libelle_salle")
                   <span class="text-danger">{{ $message }}</span>
               @enderror
              </div>
              <div class="form-group">
                <label>Ville</label>
                <select class="form-control @error('newSalles.ville_id') is-ivalid @enderror" wire:model="newSalles.ville_id">
                    @foreach ($villes as $ville)
                    <option></option>
                    <option value="{{ $ville->id }}">{{ $ville->nom_ville }}</option>
                    @endforeach
                    
                </select>
                @error("newSalles.ville_id")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>  
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              <button type="button" wire:click="goToListSalle()" class="btn btn-danger">Retourner à la liste des salles</button>
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
            timer: 4000
        })
    })
</script>