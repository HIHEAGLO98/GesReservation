<div class="card-body">
    <div class="">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'ajout d'un Type</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" wire:submit.prevent="addType()">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Type d'événement</label>
                <input type="text" class="form-control @error('newTypes.libelle_type_ev') is-ivalid @enderror" wire:model="newTypes.libelle_type_ev">
               @error("newTypes.libelle_type_ev")
                   <span class="text-danger">{{ $message }}</span>
               @enderror
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              <button type="button" wire:click="goToListType()" class="btn btn-danger">Retourner à la liste des Types</button>
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