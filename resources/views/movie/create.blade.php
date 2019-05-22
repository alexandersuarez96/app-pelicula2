@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Añadir Nueva Pelicula</h2>
        </div>

    </div>
</div>
<div class="col-lg-8 col-md-8 col-xs-12">
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
    @if(Session::has('success'))
    <div class="alert alert-info">
        {{Session::get('success')}}
    </div>
    @endif
    <div class="panel-heading">
        <h3 class="panel-title"></h3>
    </div>
    <form method="POST" action="{{ route('movie.store') }}" role="form">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="form-group">
                    <strong>nombre:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Nombre">
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
        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-12 control-label"></label>
            <div class="pull-left">
                <button movie="submit" vaue="Guardar" class="btn btn-success">Guardar</button>
                <a href="{{ route('movie.index') }}" class="btn btn-danger">Atras</a>
            </div>
        </div>
    </form>

</div>

@endsection