@extends('adminlte::page')

@section('title', 'Professores')

@section('content_header')
    <h1>Professores</h1>
@stop

@section('content')
    <p>Área para gerenciar os Professores.</p>
    <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body" >
              <h5 class="card-title" >Adicionar Professores</h5>
              <p class="card-text">Adicione novos professores.</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Adicionar</button>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body" >
              <h5 class="card-title" >Relacionamento Professor-Curso</h5>
              <p class="card-text">Adicione novos relacionamentos.</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRelationship" data-whatever="@mdo">Adicionar</button>
            </div>
          </div>
        </div>
    </div>
      
    <hr>
    <div class="row">
      <h1>Professores Cadastrados</h1>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Professor</th>
                <th scope="col">Formação</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($teachers as $t)
                <tr>
                  <th scope="row">{{$t->id}}</th>
                  <td>{{$t->name}}</td>
                  <td>{{$t->information}}</td>
                  <td>
                    <a class="btn btn-success"  style="color: #FFF;margin-right:20px "role="button" data-toggle="modal" data-target="#myModal2{{$t->id}}" data-id="{{$t->id}}">Editar</button>
                    <a class="btn btn-danger" style="color: #FFF" role="button" data-toggle="modal" data-target="#myModal3{{$t->id}}" data-id="{{$t->id}}">Excluir</button>
                  </td>
                </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>

    <div class="row">
      <h1>Professores-Cursos</h1>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Professor</th>
                <th scope="col">Curso</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($teacherCourse as $tc)
                <tr>
                  <th scope="row">{{$tc->id_tc}}</th>
                  <td>{{$tc->teacher}}</td>
                  <td>{{$tc->course}}</td>
                  <td>
                    <a class="btn btn-danger" style="color: #FFF" role="button" data-toggle="modal" data-target="#excRelation{{$tc->id_tc}}" data-id="{{$tc->id_tc}}">Excluir</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Professor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form" action="/admin/teachers" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Formação:</label>
            <textarea class="form-control" id="information" name="information"></textarea>
          </div>
          <div class="form-group">
            <label for="image" class="col-form-label">Foto de Perfil:</label>
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


<div class="modal fade" id="modalRelationship" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Relacionamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form" action="/admin/teachers/courses" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Curso:</label>
            <select class="form-control" name="course_id">
              <option value="">Selecione...</option>
              @foreach($courses as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Professor:</label>
            <select class="form-control" name="teacher_id">
              <option value="">Selecione...</option>
              @foreach($teachers as $t)
                <option value="{{$t->id}}">{{$t->name}}</option>
              @endforeach
            </select>
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



@foreach($teachers as $t)
<div class="modal fade" id="myModal2{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Professor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form" action="/admin/teachers/update/{{$t->id}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" {{$t->name}} ? value="{{$t->name}}" : value="" >
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="information" name="information"> {{$t->information}} </textarea>
          </div>
          <div class="form-group">
            <label for="image" class="col-form-label">Imagem:</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" {{$t->image}} ? value="{{$t->image}}" : value=""  />
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

@foreach($teachers as $t)
<div class="modal fade" id="myModal3{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir Professor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form" action="/admin/teachers/delete/{{$t->id}}" method="GET" enctype="multipart/form-data">
          {{ csrf_field() }}
          <p>Tem certeza que deseja excluir esse professor?</p>
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


@foreach($teacherCourse as $tc)
<div class="modal fade" id="excRelation{{$tc->id_tc}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir Relacionamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form" action="/admin/teachers/courses/delete/{{$tc->id_tc}}" method="GET" enctype="multipart/form-data">
          {{ csrf_field() }}
          <p>Tem certeza que deseja excluir esse relacionamento?</p>
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