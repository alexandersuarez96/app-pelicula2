@extends('layouts.app')
@section('content')
<div class="container">
    <h1></h1>
    <div class="card text-white bg-primary mb-3" style="">
  <div class="card-header"> <h2>Editar Pelicula</h2></div>
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

            <form action="{{ route('movie.update',$movie->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <div class="form-group">
                            <strong>nombre:</strong>
                            <input type="text" name="name" class="form-control" placeholder="name" value="{{$movie->name}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <div class="form-group">
                            <strong>Tipo de pelicula</strong>
                            <select name="type_movies_id" id="inputtype_movies_id" class="form-control">
                                <option value="">Escoja la categoria</option>
                                @foreach($type_movies as $type_movie)
                                <option value="{{$type_movie['id']}}">{{$type_movie['name']}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="pull-right">
                        <button type="submit" vaue="Guardar" class="btn btn-success">Guardar</button>
                        <a href="{{ route('movie.index') }}" class="btn btn-danger">Atras</a>
                    </div>
                </div>

            </form>
  </div>
    </div>


@endsection