<div class="row p-4 pt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des administrateurs</h3>

          <div class="card-tools d-flex align-items-center">
              <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddUser()"><i class="fas fa-user-plus"></i>
                  Nouvel Administrateur</a>
            <div class="input-group input-group-md" style="width: 250px;">
              <input type="text" name="search" class="form-control float-right" placeholder="Search" wire:model.debounce.500ms="search">

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
                <th style="width: 25%;"  class="text-center">Utilisateurs</th>
                <th style="width: 20%;"  class="text-center">Email</th>
                <th style="width: 20%;" class="text-center">Rôle</th>
                <th style="width: 30%;" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              @if ($user->role =="admin")
              <tr>
                <td>
                    @if ($user->sexe == "F")
                        <img src="{{ asset('images/woman.png') }}" width="24"/>
                      @else
                      <img  src="{{ asset('images/man.png') }}" width="24"/>
                    @endif
                </td>
                <td  class="text-center">{{$user->name}}</td>
                <td  class="text-center">{{ $user->email }}</td>
                <td  class="text-center">{{ $user->role }}</td>
                <td class="text-center">
                    <button class="btn btn-link" wire:click="goToEditUser({{ $user->id }})"><i class="far fa-edit" ></i> </button>
                    <button class="btn btn-link" wire:click="confirmDelete('{{ $user->name}}', {{$user->id }})"><i class="far fa-trash-alt" ></i> </button>
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
         </div class="float-right">
             {{ $users->links() }}
         </div>
         <div class="text-right">
          <a href="/usersPDF" class="btn btn-success">Liste des Utilisateurs PDF</a>
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
                @this.deleteUser(event.detail.message.data.user_id)

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
