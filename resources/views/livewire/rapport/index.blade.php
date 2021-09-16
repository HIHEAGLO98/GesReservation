<div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rapport</font></font></h1>
            </div><!-- /.col -->
           <!-- /.col -->
       </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-bell"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Evénements</font></font></span>
              <span class="info-box-number"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                {{ $event }}
                 </font></font><small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Réservations</font></font></span>
              <span class="info-box-number"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $reservation }}</font></font></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ventes Tickets</font></font></span>
              <span class="info-box-number"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $ticket }}</font></font></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nouveaux membres</font></font></span>
              <span class="info-box-number"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $nombre }}</font></font></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rapport récapitulatif mensuel</font></font></h5>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-wrench"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <a href="#" class="dropdown-item">Action</a>
                    <a href="#" class="dropdown-item">Another action</a>
                    <a href="#" class="dropdown-item">Something else here</a>
                    <a class="dropdown-divider"></a>
                    <a href="#" class="dropdown-item">Separated link</a>
                  </div>
                </div>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ventes&nbsp;: 25 Août. 2021 - 25 Sept. 2021</font></font></strong>
                  </p>

                  <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" height="360" style="height: 180px; display: block; width: 329px;" width="658" class="chartjs-render-monitor"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Achèvement de l'objectif</font></font></strong>
                  </p>

                  <div class="progress-group"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Finalisation des reservations
                    </font></font><span class="float-right"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">160</font></font></b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> /200</font></font></span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-primary" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->

                  <div class="progress-group"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Finaliser l'achat des tickets
                    </font></font><span class="float-right"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">310</font></font></b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> /400</font></font></span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-danger" style="width: 75%"></div>
                    </div>
                  </div>

                  <!-- /.progress-group -->
                  <!-- /.progress-group -->
                  <div class="progress-group"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Envoyer des Tickets
                    </font></font><span class="float-right"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">250</font></font></b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> /500</font></font></span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-warning" style="width: 50%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./card-body -->
            <div class="card-footer">
              <div class="row">
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->

                  <!-- /.description-block -->
                </div>

              <!-- /.row -->
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->

          <!-- /.card -->

          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dernières réservations</font></font></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                  <tr>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Utlisateur</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Evénement</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ajouté</font></font></th>
                  </tr>
                  </thead>
                  <tbody>
                 @foreach($bookings as $booking)
                  <tr>

                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$booking->participant->nom}}</font></font></td>
                        <td><span class="badge badge-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $booking->evenement->nom }}</font></font></span></td>
                        <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> {{$booking->created_at->diffForHumans()}}</font></font></div>
                        </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info float-left"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Passer une nouvelle réservation</font></font></a>
              <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Voir toutes les réservations</font></font></a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-tag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inventaire</font></font></span>
              <span class="info-box-number"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 200</font></font></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Votes</font></font></span>
              <span class="info-box-number"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">92 050</font></font></span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
