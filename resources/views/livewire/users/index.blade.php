<section class="content">
    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row"> 
        @foreach ($users as $user )
        @if ($user->role =="participant" || $user->role == "organisateur")     
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
              <div class="card-header text-muted border-bottom-0">
                <b>About: </b>
                {{ $user->role}}
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead text-primary"><b>{{ $user->name }}</b></h2>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Adresse: {{ $user->adresse }}</li><br/>
       
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Pays: {{ $user->pays }}</li><br/>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Ville: {{ $user->ville }}</li><br/>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> {{ $user->email }}</li><br/>
                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    @if ($user->sexe == "F")
                     <img src="{{ asset('images/woman.png') }}" class="img-circle img-fluid" width="120"/>
                   @else
                     <img  src="{{ asset('images/man.png') }}" class="img-circle img-fluid" width="120"/>
                   @endif
                   {{--   <img src="{{ asset('images/vale.jpg') }}" alt="user-avatar" class="img-circle img-fluid">--}}
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                    <button class="btn btn-link"><i class="far fa-edit" ></i> </button>
                    <button class="btn btn-link" 
                        wire:click="confirmDelete('{{ $user->name}}', {{$user->id }})">
                        <i class="far fa-trash-alt" ></i>
                    </button>
                </div>
              </div>
            </div>
          </div>
        @endif
        @endforeach
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        </div class="float-right">
            {{ $users->links() }}
        </div>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>

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
