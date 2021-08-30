<div class="card-body">
    <div class="">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-list-ul"></i> Formulaire d'ajout d'un nouvel événement</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form  method="POST" role="form" wire:submit.prevent="AddEvent()" enctype="multipart/form-data">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Nom de l'événement</label>
                <input type="text" value="{{ old('nom') }}" class="form-control @error('newEvenement.nom') is-ivalid @enderror" wire:model="newEvenement.nom">
               @error("newEvenement.nom")
                   <span class="text-danger"><strong>Ce champ est requis</strong></span>
               @enderror
              </div>
              <div class="form-group">
                <label>Adresse</label>
                <input type="text" value="{{ old('adresse') }}" class="form-control @error('newEvenement.adresse') is-ivalid @enderror" wire:model="newEvenement.adresse">
                @error("newEvenement.adresse")
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>

              <div class="form-group">
                <label>Description</label>
                <input type="text" value="{{ old('description') }}" class="form-control @error('newEvenement.description') is-ivalid @enderror" wire:model="newEvenement.description">
                @error("newEvenement.description")
                <span class="text-danger">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group flex-grow-1 mr-2">
                <label>Nombre de place</label>
                <input type="number" value="{{ old('nombre_place') }}" class="form-control @error('newEvenement.nombre_place') is-ivalid @enderror"  wire:model="newEvenement.nombre_place">
                @error("newEvenement.nombre_place")
                <span class="text-danger">veuillez remplir ce champ</span>
                @enderror
            </div>

            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label>Date Début</label>
                    <input type="date" value="{{ old('datedebut') }}" class="form-control @error('newEvenement.datedebut') is-ivalid @enderror" wire:model="newEvenement.datedebut">
                    @error("newEvenement.datedebut")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group flex-grow-1">
                    <label>Date Fin</label>
                    <input type="date" value="{{ old('datefin') }}" class="form-control @error('newEvenement.datefin') is-ivalid @enderror" wire:model="newEvenement.datefin">
                    @error("newEvenement.datefin")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label>Heure Début</label>
                    <input type="time" value="{{ old('heuredebut') }}" class="form-control @error('newEvenement.heuredebut') is-ivalid @enderror" wire:model="newEvenement.heuredebut">
                    @error("newEvenement.heuredebut")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group flex-grow-1">
                    <label>Heure Fin</label>
                    <input type="time" value="{{ old('heurefin') }}" class="form-control @error('newEvenement.heurefin') is-ivalid @enderror" wire:model="newEvenement.heurefin">
                    @error("newEvenement.heurefin")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Salle</label>
                <select value="{{ old('salle_id') }}" class="form-control @error('newEvenement.salle_id') is-ivalid @enderror" wire:model="newEvenement.salle_id">
                    <option>------------</option>
                    @foreach ($salles as $salle)
                    <option value="{{ $salle->id }}">{{ $salle->libelle_salle }} ({{ $salle->ville->pays->nom_pays }})</option>
                    @endforeach
                </select>
                @error("newEvenement.salle_id")
                <span class="text-danger">ce champ est requis</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Type Evenement</label>
                <select value="{{ old('type_evenement_id') }}" class="form-control @error('newEvenement.type_evenement_id') is-ivalid @enderror" wire:model="newEvenement.type_evenement_id">
                    <option>------------</option>
                    @foreach ($type_evenements as $type_evenement)
                    <option value="{{ $type_evenement->id  }}">{{ $type_evenement->libelle_type_ev }}</option>
                    @endforeach
                </select>
                @error("newEvenement.type_evenement_id")
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Organisateur</label>
                <select class="form-control @error('newEvenement.organisateur_id') is-ivalid @enderror" wire:model="newEvenement.organisateur_id">
                    <option>------------</option>
                    @foreach ($organisateurs as $organisateur)
                    <option value="{{ $organisateur->id  }}">{{ $organisateur->nom }}</option>
                    @endforeach
                </select>
                @error("newEvenement.organisateur_id")
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo">Images</label>
                <input type="file" class="form-control-file" id="photo" name ="photo" wire:model="photo">
                @error('photo')
                <span class="error">{{ $message }}</span>
                 @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              <button type="button" wire:click="goToListEvent()" class="btn btn-danger">Retourner à la liste des événements</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
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
