<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('icons/jn50.png')}}">
  <!-- loader-->
  <link href="{{asset('admin/css/pace.min.css')}}" rel="stylesheet" />
  <script src="{{asset('admin/js/pace.min.js')}}"></script>

  <!--plugins-->


  <link href="{{asset('admin/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/plugins/notifications/css/lobibox.min.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/plugins/input-tags/css/tagsinput.css')}}" rel="stylesheet" />


  <!-- CSS Files -->
  <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/bootstrap-extended.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="{{asset('admin/css/dark-theme.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/css/semi-dark.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/css/header-colors.css')}}" rel="stylesheet" />

   @yield('styles')
  {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}

  {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div> --}}
{{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
  <title>Jn | Dashboard</title>
</head>
<body>
    @if (empty(Auth::user()->name))
        <div class="login-bg-overlay au-sign-in-basic"></div>
    @endif

    <div class="wrapper">
        @if (!empty(Auth::user()->name))
            @if (Auth::user()->is_admin == 1)
                @include('layouts.parts.navbar')
            @endif
            @if (Auth::user()->is_admin==0)
                @include('layouts.parts.nav')
            @endif
        @else
            @include('layouts.parts.nav')
        @endif
        @yield('content')
    </div>

  <!-- JS Files-->
  <script src="{{asset('admin/js/jquery.min.js')}}"></script>
  <script src="{{asset('admin/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{asset('admin/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <!--plugins-->
  <script src="{{asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('admin/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
  <script src="{{asset('admin/plugins/chartjs/chart.min.js')}}"></script>

  <script src="{{asset('admin/js/index.js')}}"></script>
  <script src="{{asset('admin/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
  <script src="{{asset('admin/js/table-datatable.js')}}"></script>
  <script src="{{asset('admin/plugins/notifications/js/lobibox.min.js')}}"></script>
  <script src="{{asset('admin/plugins/notifications/js/notifications.min.js')}}"></script>
  <script src="{{asset('admin/plugins/notifications/js/notification-custom-script.j')}}s"></script>
  <script src="{{asset('admin/plugins/input-tags/js/tagsinput.js')}}"></script>
  <script src="{{asset('admin/plugins/select2/js/select2.min.js')}}"></script>
  <script src="{{asset('admin/js/form-select2.js')}}"></script>

  <!-- Main JS-->
  <script src="{{asset('admin/js/main.js')}}"></script>
 @yield('scripts')
</body>
</html>
