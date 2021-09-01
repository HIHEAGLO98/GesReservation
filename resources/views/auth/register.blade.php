
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
        
      <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="input-group mb-3">
            <input type="name" class="form-control @error('name') is-invalid @enderror"
            placeholder="Name" name="name" id="name"
            value="{{ old('name') }}"
            required autocomplete="name"
            autofocus>
            <div class="input-group-append">
              <div class="input-group-text text-white">
                <span class="fas fa-users"></span>
              </div>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="name" class="form-control @error('adresse') is-invalid @enderror"
            placeholder="adresse" name="adresse" id="adresse"
            value="{{ old('adresse') }}"
            required autocomplete="adresse"
            autofocus>
            <div class="input-group-append">
              <div class="input-group-text text-white">
                <span class="fas fa-building"></span>
              </div>
            </div>
            @error('adresse')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

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
            <select  name="role" class="form-control @error('role') is-invalid @enderror">
                <option>participant</option>
                <option>organisateur</option>
            </select>
          
          @error('role')
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
        <div class="input-group mb-3">
            <input type="password" for="password-confirm" name="password_confirmation" class="form-control"
            required autocomplete="new-password" id="password-confirm" placeholder="Confirmation du password">
            <div class="input-group-append">
              <div class="input-group-text text-white">
                <span class="fas fa-lock"></span>
              </div>
            </div>
        </div>

        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block"> {{ __('Register') }} </button>
          </div>
        </div> <br>

      </form>
      <div class="row mb-3">
        <div class="col">
           <button type="submit" class="btn btn-secondary btn-block"><a class="text-white" href="{{ route('login') }}"> Connexion</a></button>
       </div>
     </div>
    </div>
  </div>
</div>
@endsection


{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}
