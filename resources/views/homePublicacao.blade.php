@extends('layouts.app')

@section('content')

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
            @foreach($publicacao as $publi)            
            <tr>
            <!-- Blog Post -->                                              
                <div class="card mb-4">                    
                    <img class="card-img-top" src="{{asset('storage/'.$publi->imagem)}}" alt="Card image cap">
                    <div class="card-body">
                      <h2 class="card-title">{{$publi->titulo}}</h2>
                      <p class="card-text">{{str_limit($publi->conteudo,200)}}</p>
                      <a href="{{route('publicacao.show', $publi->id)}}" class="btn btn-primary">Leia Mais &rarr;</a>
                    
                      @if(auth()->user() != null AND (auth()->user()->permissao == 'administrador' OR auth()->user()->id == $publi->idUser))
                        <a href="{{route('publicacao.edit', $publi->id )}}" class="btn btn-primary">Editar &rarr;</a>                                             
                      @endif
                    </div>                  
                    <div class="card-footer text-muted">
                    Postado em {{$publi->created_at->format('d/m/y')}} por {{$publi->name}}                    
                    </div>
                </div>
            </tr>  
            @endforeach          
        </tbody>
    </table>        

      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        {{ $publicacao->links() }}        
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
@endsection