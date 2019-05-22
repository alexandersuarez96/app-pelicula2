<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use\App\Models\TypeMovie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies=Movie::orderBy('id','ASC')->paginate(6);
        return view('movie.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies=Movie::orderBy('id','ASC')->get();
        $type_movies=TypeMovie::All();
        return view('movie.create',compact('movies','type_movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required',
            'type_movies_id'=>'required'
            ],
            [
            'name.required'=>'El campo nombre es obligatorio',
            'type_movies_id.required'=>'El campo id tipo de peliculas es obligatorio'
            
            ]);
        Movie::create($request->all());
        $request->session()->flash('success','Registro satisfactorio');
        return redirect()->route('movie.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movies=Movie::find($id);
        return  view('movie.show',compact('movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie=Movie::find($id);
        $type_movies=TypeMovie::all();
        return view('movie.edit',compact('movie','type_movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            
            'name'=>'required',
            'type_movies_id'=>'required'
           ]);
           Movie::find($id)->update($request->all());
           return redirect()->route('movie.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::find($id)->delete();
      
        return redirect()->route('movie.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
