
<div class="row p-4 pt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="far fa-circle"></i> Liste des Reservations</h3>

          <div class="card-tools d-flex align-items-center">
              <a class="btn btn-link text-white mr-4 d-block">
             </a>
            <div class="input-group input-group-md" style="width: 250px;">
              <input type="text" name="table_search" class="form-control float-right">

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
                <th style="width: 30%;">Utilisateurs</th>
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
                  <td class="text-center"><span class="tag tag-success">{{date('j/m/y',strtotime($booking->created_at))}}</span></td>
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
        <div class="card-footer">
        </div class="float-right">
            {{--   {{ $bookings->links() }} --}}
        </div>
        <div class="text-right">
            <a href="/bookingPDF" class="btn btn-success">Export PDF</a>
        </div>
      <!-- /.card -->
  </div>
  </div>

 
