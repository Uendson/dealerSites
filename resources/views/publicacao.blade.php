@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
      
      @if($publi == null)    
      <h1 class="my-4">Nova Publicação        
      </h1>  
      {!! Form::open(['route' => 'publicacao.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}             
        <!-- Blog Post -->
        <div class="card mb-4">                    
          <div class="card-body">
              <div class="form-group">
                <label for="titulo">Título</label>
                {!! Form::text('titulo',null,['class' => 'form-control', 'placeholder' => "Título", 'required']) !!}
              </div>

              <div class="form-group">
                <label for="texto">Texto</label>
                {!! Form::textarea('conteudo',null,['class' => 'form-control', 'placeholder' => "Texto", 'required']) !!}
              </div>

              <div class="form-group">
                <label for="imgPubli">Imagem</label>
                {!! Form::file('imgPubli',null,['class' => 'form-control', 'placeholder' => "Imagem"]) !!}
              </div>

              {!! Form::submit('Salvar Publicação',['class' => 'btn btn-lg btn-primary btn-block']) !!}
          </div>        
        </div>             
      <!--</form>-->
      {!! Form::close() !!}      
      @else  
      <h1 class="my-4">Editar Publicação        
      </h1>
      
      {!! Form::model($publi, ['route' => ['publicacao.update', $publi->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}             
        <!-- Blog Post -->
        <div class="card mb-4">                    
          <div class="card-body">
              
              <div class="form-group">
                <label for="titulo">Título</label>
                {!! Form::text('titulo',old($publi->titulo),['class' => 'form-control', 'placeholder' => "Título", 'required']) !!}
              </div>

              <div class="form-group">
                <label for="titulo">Título</label>
                {!! Form::textarea('conteudo',old($publi->conteudo),['class' => 'form-control', 'placeholder' => "Texto", 'required']) !!}
              </div>

              <div class="form-group">
                <label for="imgPubli">Imagem</label>
                {!! Form::file('imgPubli',null,['class' => 'form-control', 'placeholder' => "Imagem"]) !!}
              </div>

              {!! Form::submit('Salvar Publicação',['class' => 'btn btn-lg btn-primary btn-block']) !!}
          </div>        
        </div>             
      <!--</form>-->
      {!! Form::close() !!} 
      @endif
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
@endsection