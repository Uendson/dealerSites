<?php $__env->startSection('content'); ?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="my-4">Postages Recentes      
      </h1>

    <table class="table">
        <thead>            
        </thead>
        <tbody>
            <?php $__currentLoopData = $publicacao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
            <tr>
            <!-- Blog Post -->                                              
                <div class="card mb-4">                    
                    <img class="card-img-top" src="<?php echo e(asset('storage/'.$publi->imagem)); ?>" alt="Card image cap">
                    <div class="card-body">
                      <h2 class="card-title"><?php echo e($publi->titulo); ?></h2>
                      <p class="card-text"><?php echo e(str_limit($publi->conteudo,200)); ?></p>
                      <a href="<?php echo e(route('publicacao.show', $publi->id)); ?>" class="btn btn-primary">Leia Mais &rarr;</a>
                    
                      <?php if(auth()->user() != null AND (auth()->user()->permissao == 'administrador' OR auth()->user()->id == $publi->idUser)): ?>
                        <a href="<?php echo e(route('publicacao.edit', $publi->id )); ?>" class="btn btn-primary">Editar &rarr;</a>                                             
                      <?php endif; ?>
                    </div>                  
                    <div class="card-footer text-muted">
                    Postado em <?php echo e($publi->created_at->format('d/m/y')); ?> por <?php echo e($publi->name); ?>                    
                    </div>
                </div>
            </tr>  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
        </tbody>
    </table>        

      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <?php echo e($publicacao->links()); ?>        
      </ul>

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>

      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#">Web Design</a>
                </li>
                <li>
                  <a href="#">HTML</a>
                </li>
                <li>
                  <a href="#">Freebies</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#">JavaScript</a>
                </li>
                <li>
                  <a href="#">CSS</a>
                </li>
                <li>
                  <a href="#">Tutorials</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
          You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
      </div>

    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>