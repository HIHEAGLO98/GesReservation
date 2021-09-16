<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Booking Event</title>
        <link rel="icon" type="image/x-icon" href="image/favicon.ico" />
        <link rel="stylesheet" href="{{mix("css/app.css")}}" />
        <!-- Styles -->
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
       {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="/accueil" class="text-sm text-gray-700 underline">..</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Se Connecter</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">S'Inscrire</a>
                        @endif
                    @endauth
                </div>
            @endif  
        </div>  --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand text-primary" href="/"> <i class="fas fa-calendar-week"></i> BOOKING EVENT</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                      
                    <a class="nav-link active" aria-current="page" href="/">  <i class="nav-icon fas fa-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i> Se Connecter</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="fas fa-user-plus"></i> S'Inscrire</a>
                  </li>
                </ul>
              </div>
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </nav>
        <div class="container">
            
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($images as $image )
                <div class="col">
                    <div class="card card-info card-outline">
                        <img class="card-img-top" src="{{ asset('/storage/'.$image->path) }}" alt="Photo de couverture" style="height:24rem;">
                        <div class="card-body ">
                        <h4 class="card-title mb-1 text-primary"><strong>{{ $image->evenement->nom }}</strong></h4>
                        <p class="card-text text-muted mb-3">{{ $image->evenement->description }}</p>
                        <p class="card-text"><i class="far fa-calendar-minus text-info"></i>  Du <b>{{ $image->evenement->datedebut }}</b> au <b>{{ $image->evenement->datefin }}</b></p>
                        <p class="card-text"><i class="far fa-clock text-success"></i>  De {{ $image->evenement->heuredebut }} à {{ $image->evenement->heurefin }}</p>
                        <p class="card-text"><i class="fas fa-map-marker-alt text-danger"></i> {{$image->evenement->adresse}}</p>
                        @can("participant")
                        <div class="bg-none text-right">
                            <a href="#" class="btn btn-outline-info rounded-pill font-weight-bold" wire:click="booking('{{ $image->evenement->id}}', {{$participant}})">
                                    <i class="fas fa-circle rounded-circle text-secondary" style="size: 10px"></i>      
                                   <b>Réserver</b>  
                            </a>
                        </div>
                        @endcan 
                        </div>
                    </div>
                </div>
                @endforeach
        
            </div>
            <div class="card-footer">
            </div class="float-right">
                {{ $images->links() }}
            </div>
        
        </div>
 <!-- footer ================================================== -->
 <div class="relative flex justify-center">
    <footer class="s-footer">

        <div class="s-footer__main">

            <div class="row">

                <div class="column large-3 medium-6 tab-12 s-footer__info">

                    <h5>A propos du Site</h5>

                    <p>
                    <strong>
                    Ce site permet de faire des<br>
                    Réservations pour des différents événements<br>
                    Payer des tickets pour participer a un événement....<br>
                    Pour réserver un événement, vous devenez vous connecter </strong>
                    </p>

                </div> <!-- end s-footer__info -->

                <div class="column large-3 medium-3 tab-6 s-footer__site-links">

                    <h5>Liens Utiles</h5>


                    <ul>
                        <li><a href="#0">About Us</a></li>
                        <li><a href="#0">Blog</a></li>
                        <li><a href="#0">FAQ</a></li>
                        <li><a href="#0">Terms</a></li>
                        <li><a href="#0">Privacy Policy</a></li>
                    </ul>

                </div> <!-- end s-footer__site-links -->

                <div class="column large-3 medium-3 tab-6 s-footer__social-links">

                    <h5>Nous Suivre</h5>

                    <ul>
                        <li><a href="#0">Twitter</a></li>
                        <li><a href="#0">Facebook</a></li>
                        <li><a href="#0">Tic Tok</a></li>
                        <li><a href="#0">Pinterest</a></li>
                        <li><a href="#0">Instagram</a></li>
                    </ul>

                </div> <!-- end s-footer__social links -->
                
                
                <!-- end s-footer__subscribe -->

            </div> <!-- end row -->

        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom text-center">
            <div class="row">
                <div class="column">
                    <div class="ss-copyright">
                        <span class="text-success">© Copyright BOOKING EVENT 2021</span>
                        <span  class="text-success">Design by <a href="https://github.com/HIHEAGLO98">Ghust H</a></span>
                    </div> <!-- end ss-copyright -->
                </div>
            </div>

            <!-- end ss-go-top -->
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->
</div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
