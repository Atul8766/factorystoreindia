<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('public/assets/img/favicon.png') }}">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/fonts/css.css') }}">
  <link href="{{ asset('public/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('public/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
 
  <!-- Material Icons -->
  
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('public/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
  <!-- Nepcha Analytics -->
  
 <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  
<style>
/* fallback */
@font-face {
  font-family: 'Material Icons Round';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/materialiconsround/v108/LDItaoyNOAY6Uewc665JcIzCKsKc_M9flwmP.woff2) format('woff2');
}

.material-icons-round {
  font-family: 'Material Icons Round';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}
</style>

</head>

<body class="g-sidenav-show  bg-gray-200">
 

    
                @include('layouts.admin.sidebar')
            <div class='main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y'>
                @include('layouts.admin.header')
                @yield('content')   
            <div>

              
            </div>

<!-- Core JS Files -->
<script src="{{ asset('public/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('public/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('public/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('public/assets/js/plugins/chartjs.min.js') }}"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>



<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('public/assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>

   
</body>

</html>
