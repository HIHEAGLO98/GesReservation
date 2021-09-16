<div class="row p-4 pt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="fas fa-list-ul"></i> Liste des Lieux</h3>

          <div class="card-tools d-flex align-items-center">
              <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddSalle()"><i class="fas fa-user-plus"></i>
                  Nouveau Lieu</a>
            <div class="input-group input-group-md" style="width: 250px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search" wire:model.debounce.500ms="search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 table-stripe" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th style="width: 5%;"></th>
                <th style="width: 20%;">Lieu</th>
                <th style="width:20;">Ville</th>
                <th style="width: 20%;" class="text-center">Ajouté</th>
                <th style="width: 35%;" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($salles as $salle)
              <tr>
                <td> 
                </td>
                <td>{{ $salle->libelle_salle }}</td>
                <td>{{ $salle->ville->nom_ville }}</td>
                <td class="text-center"><span class="tag tag-success">{{$salle->created_at->diffForHumans()}}</span></td>
                <td class="text-center">
                    <button class="btn btn-link"><i class="far fa-edit" ></i> </button>
                    <button class="btn btn-link" wire:click="confirmDelete('{{ $salle->libelle_salle}}', {{$salle->id }})"><i class="far fa-trash-alt" ></i> </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
         </div class="float-right">
              {{ $salles->links() }}
         </div>
      </div>
      <!-- /.card -->
  </div>
  </div>
  <script>
    window.addEventListener("ShowConfirmMessage", event=>{
        Swal.fire({
            title : event.detail.message.title,
            text: event.detail.message.text,
            icon: event.detail.message.type,
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText:'Continuer',
            canceluttonText: 'Annuler'
        }).then((result) => {
            if(result.isConfirmed){
                @this.deleteSalle(event.detail.message.data.salle_id)

        }
        })
        window.addEventListener("ShowSuccessMessage", event=>{
        Swal.fire({
            position : 'top-end',
            icon: 'success',
            toast:true,
            title:event.detail.message || 'Opération effecctuée avec succès!!',
            showConfirmButton: false,
            timer: 3000
            }
        )
    })
    })
</script>