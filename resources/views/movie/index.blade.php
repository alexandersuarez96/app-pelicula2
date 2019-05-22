@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Pagina Principal Peliculas</h2>
    </div>

  </div>
</div>

<div class="col-lg-12 col-md-12 col-xs-12">
  <div class="pull-right">
    <a class="btn btn-success" href="{{ route('movie.create') }}"> Nueva Pelicula</a>
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
    <th>Id peliculas</th>
    <th width="280px">Action</th>
  </tr>


  @foreach($movies as $movie)
  <tr>
    <td>{{$movie->id}}</td>
    <td>{{$movie->name}}</td>
    <td>{{$movie->type_movies_id}}</td>
    <td>
      <form action="{{ action('MovieController@destroy',$movie->id) }}" method="POST">
        {{csrf_field()}}



        <a class="btn btn-primary" href="{{ route('movie.edit',$movie->id) }}">Editar</a>


        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

</table>

{{ $movies->links() }}
</div>
</div>
</div>

@endsection