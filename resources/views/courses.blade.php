@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    <h1>Cursos</h1>
@stop

@section('content')
    <p>Área para gerenciar os cursos.</p>
    <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body" >
              <h5 class="card-title" >Adicionar Cursos</h5>
              <p class="card-text">Adicione novos cursos.</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Adicionar</button>
            </div>
          </div>
        </div>       
    </div>
    <hr>
    <div class="row">

        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Curso</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($courses as $c)
                <tr>
                  <th scope="row">{{$c->id}}</th>
                  <td>{{$c->name}}</td>
                  <td>{{$c->description}}</td>
                  <td>
                    <a class="btn btn-success" style="color: #FFF;margin-right:20px " role="button" data-toggle="modal" data-target="#myModal2{{$c->id}}" data-id="{{$c->id}}">Editar</button>
                    <a class="btn btn-danger" style="color: #FFF" role="button" data-toggle="modal" data-target="#myModal3{{$c->id}}" data-id="{{$c->id}}">Excluir</button>
                  </td>
                </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form" action="/admin/courses" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
          <div class="form-group">
            <label for="image" class="col-form-label">Imagem:</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*"/>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-primary" value="Adicionar">
      </div>
    </form>

    </div>
  </div>
</div>
@foreach($courses as $c)
<div class="modal fade" id="myModal2{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form name="form" action="/admin/courses/update/{{$c->id}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" {{$c->name}} ? value="{{$c->name}}" : value="" >
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="description" name="description">{{$c->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="image" class="col-form-label">Imagem:</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" {{$c->image}} ? value="{{$c->image}}" : value=""  />
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-primary" value="Alterar">
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

@foreach($courses as $c)
<div class="modal fade" id="myModal3{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form name="form" action="/admin/courses/delete/{{$c->id}}" method="GET" enctype="multipart/form-data">
          {{ csrf_field() }}
         <p>Tem certeza que deseja excluir esse curso?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-danger" value="Excluir">
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop