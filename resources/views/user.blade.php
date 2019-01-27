@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="my-4">Usuários        
      </h1>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Permissão</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user) 
            <tr>              
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->permissao}}</td>
              <td>
                  <a href="{{route('user.edit', $user->id)}}">Editar</a>
              </td>
            </tr>
          @endforeach  
        </tbody>
      </table>
      
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
@endsection