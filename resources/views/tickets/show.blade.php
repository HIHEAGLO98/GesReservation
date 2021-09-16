@extends("layouts.master")
@section("contenu")
<h1 class="text-primary text-center">Les Tickets</h1>
<div class="container " >
    <div class="row row-cols-1 row-cols-md-3 g-4">
     @foreach ($tickets as $ticket )
        @if($ticket->evenement->organisateur->user_id == Auth::user()->id)
            <div class="col">
                <div class="card card-info card-outline card">
                <div class="card-img-overlay ">
                    <h4 class="card-title mb-1 text-primary">Evénement: <strong>{{ $ticket->evenement->nom }}</strong></h4>
                    <p class="card-text text-muted mb-3">Lieu: {{ $ticket->evenement->salle->libelle_salle }}</p>
                    <p class="card-text text-muted mb-3">Participant: {{ $ticket->participant->nom }}</p>
                    <p class="card-text"><i class="far fa-calendar-minus text-info"></i>  Du <b>{{ $ticket->evenement->datedebut }}</b> au <b>{{ $ticket->evenement->datefin }}</b></p>
                    <p class="card-text"><i class="far fa-clock text-success"></i>  De {{ $ticket->evenement->heuredebut }} à {{ $ticket->evenement->heurefin }}</p>
                    <p class="card-text"><i class="fas fa-map-marker-alt text-danger"></i> {{$ticket->evenement->adresse}}</p>
                    <h4 class="card-title mb-1 text-primary">Prix: <strong>{{ $ticket->type_ticket->libelle_tiket }} FCFA</strong></h4>   
                </div>
                </div>
            </div>
        @endif
        
     @endforeach
    </div>
    <div class="card-footer">
      {{--  {{ $tickets->links() }} --}}
    </div>
</div>
@endsection