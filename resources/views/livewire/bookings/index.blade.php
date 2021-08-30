<div class="container">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($bookings as $booking )
            @if ($booking->participant->user_id == Auth::user()->id)
            <div class="col">
                @foreach ($images as $image)
                    @if ($image->evenement_id == $booking->evenement->id)

                <div class="card card-info card-outline">
                    <img class="card-img-top" src="{{ asset('/storage/'.$image->path) }}" alt="Photo de couverture" style="height:18rem;">
                    @endif
                    @endforeach
                    <div class="card-body ">
                        <h4 class="card-title mb-1 text-primary"><strong>{{ $booking->evenement->nom }}</strong></h4>
                        <p class="card-text text-muted mb-3">{{ $booking->evenement->description }}</p>
                        <p class="card-text"><i class="far fa-calendar-minus text-info"></i>  Du <b>{{ $booking->evenement->datedebut }}</b> au <b>{{ $booking->evenement->datefin }}</b></p>
                        <p class="card-text"><i class="far fa-clock text-success"></i>  De {{ $booking->evenement->heuredebut }} à {{ $booking->evenement->heurefin }}</p>
                        <p class="card-text"><i class="fas fa-map-marker-alt text-danger"></i> {{$booking->evenement->adresse}}</p>
                        <div class="bg-none text-right">
                            <a href="#" class="btn btn-outline-info rounded-pill font-weight-bold">
                                <b>Réserver</b>
                                <i class="fas fa-circle rounded-circle text-success" style="size: 10px"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>

</div>
<div class="card-footer">
    </div class="float-right">
        {{ $bookings->links() }}
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
                @this.deleteBooking(event.detail.message.data.booking_id)

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
