@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Pagina Principal Tipo de peliculas</h2>
    </div>

  </div>
</div>
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



@endsection