<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Telemática</title>
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css" />
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 10;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                xdisplay: flex;
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
              margin-top: 10px;
                font-size: 38px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 5px;
                font-size: 13px;
                font-weight: 10;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
</head>
<body>
  <div class="container">
      <div class="flex-center position-ref full-height">
          @if (Route::has('login'))
              <div class="top-right links">
                  @auth
                      <a href="{{ url('/home') }}">Home</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                  @else
                      <a href="{{ route('login') }}">Login</a>

                      @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                      @endif
                  @endauth
              </div>
              
          @endif
  
          <div class="content">
              <div class="title m-b-md">
                  @auth
                      Bem vindo a prova Telemática, {{ Auth::user()->name}}!
                      <div class="links">
                          <a href="../users">Usuarios</a>
                          <a href="../clientes">Clientes</a>
                          <a href="../estados">Estados</a>
                      </div>
                  @else
                      Prova Telemática! Para acessar, registre-se.
                  @endauth
              </div>
          </div>
  
    @yield('main')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>