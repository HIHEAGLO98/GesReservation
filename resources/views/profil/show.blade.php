@extends("layouts.master")
@section("contenu")
    @if(session()->has('info'))
    <div class="alert alert-success alert-dismissible fade show text-center d-flex justify-content-between" role="alert">
        <p class="text-center">{{ session()->get('info') }}</p>
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></button>
      </div>
    @endif
<div class="card bg-light d-flex flex-fill">
    <div class="card-body pt-0">
      <div class="row">
        <div class="col-7">
          <h2 class="lead text-primary"><b>{{ Auth::user()->name }}</b></h2>
          <p class="text-muted text-sm"><b>About: </b> {{ Auth::user()->role }} </p>
          <ul class="ml-4 mb-0 fa-ul text-muted">
            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Adresse: {{Auth::user()->adresse}}</li><br/>
            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Pays: {{Auth::user()->pays}}</li><br/>
            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Ville: {{Auth::user()->ville}}</li><br/>
            <li class="small"><span class="fa-li"><i class="fas fa-lg fas fa-envelope"></i></span> Mail: {{ Auth::user()->email }}
           </li>
          </ul>
        </div>
        <div class="col-5 text-center">
          <img src="{{asset('images/vale.jpg')}}" alt="user-avatar" class="img-size-100 img-circle img-fluid">
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="text-right">
        <a href="#" class="btn btn-sm bg-teal">
          <i class="fas fa-comments"></i>
        </a>
        <a href="{{ route('profil.edit', ['profil' => Auth::user()->id]) }}" class="btn btn-sm btn-primary">
          <i class="fas fa-user"></i> Edit Profil
        </a>
      </div>
    </div>
  </div>

@endsection
