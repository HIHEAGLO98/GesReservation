@extends("layouts.master")
@section("contenu")
<div class="card-body">
    <div class="">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i>Profil</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{ route('profil.update', ['profil' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              @php
                $user = Auth::user();
              @endphp
            <div class="card-body">
              <div class="form-group">
                <label>Nom Complet</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-ivalid @enderror">
               @error("name")
                   <span class="text-danger">{{ $message }}</span>
               @enderror
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-ivalid @enderror">
                @error("email")
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <div class="form-group">
                <label>Sexe</label>
                <select name="sexe" class="form-control @error('sexe') is-ivalid @enderror">
                    <option>------------</option>
                    @if ($user->sexe=="F")
                    <option value="H">Homme</option>
                    <option value="F" selected>Femme</option>
                    @else
                    <option value="H" selected>Homme</option>
                    <option value="F" >Femme</option>
                    @endif
                    
                </select>
                @error("sexe")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              
              <div class="form-group">
                <label>Adresse</label>
                <input name="adresse" type="text"  value="{{ $user->adresse }}" class="form-control @error('adresse') is-ivalid @enderror">
                @error("adresse")
                <span class="text-danger">{{ $message }}</span>
                @enderror
             </div>
            <div class="d-flex">
              <div class="form-group flex-grow-1 mr-2">
                <label>Pays</label>
                <input name="pays" type="text" value="{{ $user->pays }}" class="form-control @error('pays') is-ivalid @enderror">
                @error("pays")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group flex-grow-1">
                <label>Ville</label>
                <input name="ville" type="text" value="{{ $user->ville }}" class="form-control @error('ville') is-ivalid @enderror">
                @error("ville")
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>  
           
              <div class="form-group">
                <label  >Password</label>
                <input name="password" type="password" class="form-control"  disabled placeholder="Password">
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection