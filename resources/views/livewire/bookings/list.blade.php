<div class="row p-4 pt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des Reservations</h3>

          <div class="card-tools d-flex align-items-center">
              <a class="btn btn-link text-white mr-4 d-block"><i class="fas fa-user-plus"></i>
              </a>
            <div class="input-group input-group-md" style="width: 250px;">
              <input type="text" name="search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 table-stripe" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th style="width: 5%;"></th>
                <th style="width: 25%;">Utilisateurs</th>
                <th style="width: 20%;">Evenement</th>
                <th style="width: 20%;" class="text-center">Ajouté</th>
                <th style="width: 30%;" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($bookings as $booking)
              <tr>
                <td>{{$booking->participant->nom}}</td>
                <td>{{ $booking->evenement->nom }}</td>
                <td class="text-center"><span class="tag tag-success">{{
                $booking->created_at->diffForHumans()}}</span></td>
                <td class="text-center">
                    <button class="btn btn-link"><i class="far fa-edit" ></i> </button>
                    <button class="btn btn-link"><i class="far fa-trash-alt" ></i> </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
     </div>
      <!-- /.card -->
  </div>
  </div>