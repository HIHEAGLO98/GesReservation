<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }}</title>
  {{-- <link rel="icon" type="image/x-icon" href="image/favicon.ico" /> --}}
    <link rel="stylesheet" href="{{mix("css/app.css")}}" />

    <!-- favicons ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">

    @livewireStyles

</head>
<body class="hold-transition sidebar-mini ">
<div class="wrapper">
    <!-- Navbar -->
    <x-topnav />

      <!-- /.navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <span class="brand-text font-weight-bold text-primary" style="font-size: 1.3em;"><b>BOOKING</b> EVENT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
              <img src="{{asset('images/vale.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
        </div>
        <div class="info">
          <a href="{{ route('profil.show', Auth::user()->id) }}" class="d-block"><strong> {{ Auth::user()->name }}</strong> </a>
        </div>

      </div>
      <!-- Sidebar Menu -->
      <x-menu/>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
            @yield("contenu")
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
    <!-- /.content -->
  </div>

  <x-sidebar/>
</div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      <strong class="text-primary">BOOKING_EVENT</strong>
    </div>
    <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copyright &copy; 2021 <a target="blank" href="https://github.com/HIHEAGLO98">Ghust H</a>.</strong> Touts droits reservés.
  </footer>

    <script src="{{ mix('js/app.js') }}"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    @livewireScripts

</body>
</html>
