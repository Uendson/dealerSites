<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Blog Home - Start Bootstrap Template</title>
        
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/blog-home.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Dealer Sites</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          @guest
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('login') }}">Login
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('register') }}">Registrar
                  <span class="sr-only">(current)</span>
                </a>
              </li>
            @endif
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('publicacao.index') }}">Inicio</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('publicacao.create') }}">Nova Publicação</a>
            </li>

            @if(auth()->user()->permissao = 'administrador')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">Usuários</a>
              </li>
            @endif
            

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

    <!-- Footer -->
    <footer class="fixed-bottom py-2 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>