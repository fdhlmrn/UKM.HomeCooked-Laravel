<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mums Cook') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script
      src="https://code.jquery.com/jquery-1.12.4.min.js"
      integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
      crossorigin="anonymous">

    </script>

    <script >
          $( document ).ready(function() {
          $( "#states" ).change(function(e){
            console.log(e);
            // alert( "Handler for .change() called." );
              var state_id = e.target.value;
      //ajax
        $.get('/ajax-district?state_id=' + state_id, function(data){
            //success data
            $('#district').empty();
            $.each(data, function(index, districtObj){

              $('#district').append('<option value="' + districtObj.id+ '"> '+ districtObj.name + '</option>');

            });

        });
        });

      });
    </script>
        <script >
          $( document ).ready(function() {
          $( "#district" ).change(function(e){
            console.log(e);
            // alert( "Handler for .change() called." );
              var district_id = e.target.value;
      //ajax
        $.get('/ajax-subdistrict?district_id=' + district_id, function(data){
            //success data
            $('#subdistrict').empty();
            $.each(data, function(index, subdistrictObj){

              $('#subdistrict').append('<option value="' + subdistrictObj.id+ '"> '+ subdistrictObj.name + '</option>');

            });

        });
        });

      });
    </script>



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Mums Cook') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <li><a href="{{url('foods')}}">Jualan</a></li>
                        <li><a href="{{url('search')}}">Cari Makanan</a></li>
                        <li><a href="{{url('orders')}}">Pesan Makanan</a></li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
          <div class="row">
            <div class="col-md-12">
              @if (session()->has('message'))
                <div class="alert alert-success">
                  {{ session()->get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              @if (isset($errors))
                @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              @yield('content')
            </div>
          </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
      $(document).on("click", "#confirm-modal", function(e) {
      window.console&&console.log('foo');
      var url = $(this).attr("href");
      window.console&&console.log(url);
      e.preventDefault();

      $('#destroy-form').attr('action', url);
      $('#destroy-modal').modal({ show: true });
      });

    </script>


</body>
</html>
