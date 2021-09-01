@extends('layouts.auth')

@section('container')
<div class="login-box " style="width: 700px" >
  <div class="login-logo" style="width: 700px">
    <a href="#" style="color: #b3b6b9; font-size: 1.8em;"><b style="font-weight:bold;">BOOKING</b>CORPORATE</a>
    <hr/>
  </div>
  <!-- /.login-logo -->
  <div class="card bg-dark">
    <div class="card-body bg-dark login-card-body">

      <form method="POST" action="{{ route('login') }}">
          @csrf

        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror"
            placeholder="Email" name="email" id="email"
            value="{{ old('email') }}"
            required autocomplete="email"
            autofocus>
            <div class="input-group-append">
                <div class="input-group-text text-white">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
            placeholder="Password" id="password">
            <div class="input-group-append">
                <div class="input-group-text text-white">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
          @enderror
        </div>
     
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ ('Connexion') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ ('Mot de passe oublié?') }}
                    </a>
                @endif
            </div>
            <br>
        </div> 
     </form>
    </div>
  
       <div class="row mb-3">
           <div class="col">
              <button type="submit" class="btn btn-secondary btn-block"><a class="text-white" href="{{ route('register') }}">S'inscrire</a></button>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
