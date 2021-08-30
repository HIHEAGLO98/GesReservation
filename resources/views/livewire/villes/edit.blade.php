<div class="row  p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de modification d'une ville</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" wire:submit.prevent="updateVille()">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label> Ville</label>
                <input type="text" class="form-control @error('editVille.nom_ville') is-ivalid @enderror" wire:model="editVille.nom_ville">
               @error("editVille.nom_ville")
                   <span class="text-danger">{{ $message }}</span>
               @enderror
              </div>
            
           
              <div class="form-group">
                <label>Pays</label>
                <select class="form-control @error('editVille.pays_id') is-ivalid @enderror" wire:model="editVille.pays_id">
                   @foreach ($pays as $pays)
                   <option ></option>
                   <option value="{{ $pays->id }}">{{ $pays->nom_pays }}</option>
                   @endforeach
                </select>
                @error("editVille.pays_id")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>   
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Mettre à jour</button>
              <button type="button" wire:click="goToListVille()" class="btn btn-danger">Retourner à la liste des villes</button>
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