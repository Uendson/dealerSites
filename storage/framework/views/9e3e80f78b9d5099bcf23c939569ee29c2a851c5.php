<?php $__env->startSection('content'); ?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
      
      <?php if($publi == null): ?>    
      <h1 class="my-4">Nova Publicação        
      </h1>  
      <?php echo Form::open(['route' => 'publicacao.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>             
        <!-- Blog Post -->
        <div class="card mb-4">                    
          <div class="card-body">
              <div class="form-group">
                <label for="titulo">Título</label>
                <?php echo Form::text('titulo',null,['class' => 'form-control', 'placeholder' => "Título", 'required']); ?>

              </div>

              <div class="form-group">
                <label for="texto">Texto</label>
                <?php echo Form::textarea('conteudo',null,['class' => 'form-control', 'placeholder' => "Texto", 'required']); ?>

              </div>

              <div class="form-group">
                <label for="imgPubli">Imagem</label>
                <?php echo Form::file('imgPubli',null,['class' => 'form-control', 'placeholder' => "Imagem"]); ?>

              </div>

              <?php echo Form::submit('Salvar Publicação',['class' => 'btn btn-lg btn-primary btn-block']); ?>

          </div>        
        </div>             
      <!--</form>-->
      <?php echo Form::close(); ?>      
      <?php else: ?>  
      <h1 class="my-4">Editar Publicação        
      </h1>
      
      <?php echo Form::model($publi, ['route' => ['publicacao.update', $publi->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']); ?>             
        <!-- Blog Post -->
        <div class="card mb-4">                    
          <div class="card-body">
              
              <div class="form-group">
                <label for="titulo">Título</label>
                <?php echo Form::text('titulo',old($publi->titulo),['class' => 'form-control', 'placeholder' => "Título", 'required']); ?>

              </div>

              <div class="form-group">
                <label for="titulo">Título</label>
                <?php echo Form::textarea('conteudo',old($publi->conteudo),['class' => 'form-control', 'placeholder' => "Texto", 'required']); ?>

              </div>

              <div class="form-group">
                <label for="imgPubli">Imagem</label>
                <?php echo Form::file('imgPubli',null,['class' => 'form-control', 'placeholder' => "Imagem"]); ?>

              </div>

              <?php echo Form::submit('Salvar Publicação',['class' => 'btn btn-lg btn-primary btn-block']); ?>

          </div>        
        </div>             
      <!--</form>-->
      <?php echo Form::close(); ?> 
      <?php endif; ?>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>