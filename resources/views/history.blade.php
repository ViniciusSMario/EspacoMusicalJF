@extends('adminlte::page')

@section('title', 'Escola')

@section('content_header')
    <h1>A Escola</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body" >
              <h5 class="card-title" >Adicionar Descrição da Escola</h5><br>
              <button type="button" class="btn btn-primary" @foreach($history as $h) @if($h->id > 0)  disabled  @else enabled @endif @endforeach data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Adicionar</button>
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
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($history as $h)
                <tr>
                  <th scope="row">{{$h->id}}</th>
                  <td>{{$h->history}}</td>
                  <td>
                    <a class="btn btn-success" style="color: #FFF;margin-right:20px" role="button" data-toggle="modal" data-target="#myModal2" data-id="{{$h->id}}">Editar</button>
                    <a class="btn btn-danger" style="color: #FFF;" role="button" data-toggle="modal" data-target="#myModal3{{$h->id}}" data-id="{{$h->id}}">Excluir</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Descrição</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form" action="/admin/school" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
         
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="history" name="history"></textarea>
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

@foreach($history as $h)
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Descrição da escola</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form name="form" action="/admin/school/update/{{$h->id}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
         
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="history" name="history">{{$h->history}}</textarea>
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

@foreach($history as $h)
<div class="modal fade" id="myModal3{{$h->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir Descrição da Escola</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form" action="/admin/school/delete/{{$h->id}}" method="GET" enctype="multipart/form-data">
          {{ csrf_field() }}
          <p>Tem certeza que deseja excluir essa descrição?</p>
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