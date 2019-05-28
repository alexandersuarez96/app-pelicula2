@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">
  <h3 class="panel-title">Pagina Principal Tipo de peliculas</h3>

  </div>
  <div class="cars-body">
  <div class="col-lg-12 col-md-12 col-xs-12">
  <div class="pull-right">
    <a class="btn btn-success" href="{{ route('type_movie.create') }}"> Crear Nuevo tipo de pelicula</a>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <table class="table table-bordered">
    <tr>
      <th>id</th>
      <th>Nombre</th>
      <th width="280px">Action</th>
    </tr>
    @foreach($type_movies as $type_movie)
    <tr>
      <td>{{$type_movie->id}}</td>
      <td>{{$type_movie->name}}</td>
      <td>
        <form action="{{ action('TypeMovieController@destroy',$type_movie->id) }}" method="POST">
          {{csrf_field()}}
          <a class="btn btn-primary" href="{{ route('type_movie.edit',$type_movie->id) }}">Editar</a>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>

  </table>

  {{ $type_movies->links() }}
</div>
  </div>
</div>




@endsection