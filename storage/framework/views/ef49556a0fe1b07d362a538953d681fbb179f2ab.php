<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Blog Home - Start Bootstrap Template</title>
        
    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/blog-home.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

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
          <?php if(auth()->guard()->guest()): ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo e(route('login')); ?>">Login
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php if(Route::has('register')): ?>
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('register')); ?>">Registrar
                  <span class="sr-only">(current)</span>
                </a>
              </li>
            <?php endif; ?>
            <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('publicacao.index')); ?>">Inicio</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('publicacao.create')); ?>">Nova Publicação</a>
            </li>

            <?php if(auth()->user()->permissao = 'administrador'): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('user.index')); ?>">Usuários</a>
              </li>
            <?php endif; ?>
            

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">                
                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        <?php echo e(__('Logout')); ?>

                    </a>
                                        
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </li>
          <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>  

    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
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