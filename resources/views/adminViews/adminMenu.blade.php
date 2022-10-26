    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AdminMenu</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/adminStyles.css') }}" rel="stylesheet">
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
          <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


    </head>
    <body>
        <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'SalesIn') }}
                </a>
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
            <div class="content">
                <div class="title-m-b-md">
                    <h3>Usuarios</h3>
                    <hr width = 400>
                </div>
                <!-- <div class="links">
                    <a href="{{ route('login') }}">{{ __('Activar') }}</a>
                    <a href="{{ route('login') }}">{{ __('Desactivar') }}</a>  
                    <a href="{{ route('login') }}">{{ __('Borrar') }}</a> 
                    <a href="{{ route('adminUpdate') }}">{{ __('Editar') }}</a>
                </div> -->
                @forelse($users as $user)
	            <div class="panel panel-default">
	                <div class="panel-heading">
	            	    <a id = "Name" > {{ $user->name }} ----</a>
                        <a id="Button" href="{{ route('login') }}">{{ __('Activar') }}</a>
                        <a id="Button" href="{{ route('login') }}">{{ __('Desactivar') }}</a>  
                        <a id="Button" href="{{ route('login') }}">{{ __('Borrar') }}</a> 
                        <a id="Button" href="{{ route('adminUpdate') }}">{{ __('Editar') }}</a>
                        <br>
                        <br>
                        <hr width = 400>
                        <br>
	                </div>
                </div>
                @empty  
	            <div class="alert alert-danger">
	                {{ __("No hay usuarios en este momento") }}
	            </div>

                @endforelse
            </div>
        </div>
    </body>
