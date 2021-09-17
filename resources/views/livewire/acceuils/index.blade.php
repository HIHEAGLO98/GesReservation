<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($images as $image )
        <div class="col">
            <div class="card card-info card-outline">
                <a href="#" class="thumb-link">
                <img class="card-img-top" src="{{ asset('/storage/'.$image->path) }}" alt="Photo de couverture" style="height:24rem;">
                </a>
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

<script>
    window.addEventListener("ShowSuccessMessage", event=>{
        Swal.fire({
            position : 'top-end',
            icon: 'success',
            toast:true,
            title:event.detail.message || 'Opération effecctuée avec succès!!',
            showConfirmButton: false,
            timer: 3000
        })
    })
</script>
