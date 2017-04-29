<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HomeCooked') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> --}}

    {!! Charts::assets() !!}

    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <!-- Scripts -->

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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

    {{-- styles --}}
{{--       <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 70%;
        width: 70%;
        display: block;
        margin: 0 auto;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        overflow-y:hidden !important;

        padding: 0;
      }

      .divider{
        margin: 10px;
      }       
    </style> --}}


    <script >
          $( document ).ready(function() {
          $( "#states" ).change(function(e){
            console.log(e);
            // alert( "Handler for .change() called." );
              var state_id = e.target.value;
      //ajax
        $.get('/ajax-district?state_id=' + state_id, function(data){
            //success data
            // $('#district').empty();
            $('#district').find("option:not(:first)").remove();
            $.each(data, function(index, districtObj){

              $('#district').append('<option value="' + districtObj.id+ '"> '+ districtObj.name + '</option>');

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
                        {{ config('app.name', 'HomeCooked') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <li><a href="{{url('foods')}}">Jualan</a></li>
                        <li><a href="{{url('search')}}">Cari Makanan</a></li>
                        <li><a href="{{url('orders')}}">Pesan Makanan</a></li>
                        <li><a href="{{url('profiles')}}">Profile</a></li>

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
