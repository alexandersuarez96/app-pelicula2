@extends('layouts.app')
@section('content')
<h1></h1>
<div class="container">
<div class="card text-white bg-primary mb-3" style="">
  <div class="card-header"><h2>Editar Tipo de peliculas</h2></div>
  <div class="card-body">
  @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hubo algunos problemas con el ingreso de datos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('type_movie.update',$type_movie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nombre:</strong>
                    <input type="text" name="name" class="form-control" placeholder="nombre" value="{{$type_movie->name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="pull-right">
                    <button type="submit" vaue="Guardar" class="btn btn-success">Guardar</button>
                    <a href="{{ route('type_movie.index') }}" class="btn btn-danger">Atras</a>
                </div>
            </div>
        </div>

    </form>
  </div>
</div>
</div>


@endsection