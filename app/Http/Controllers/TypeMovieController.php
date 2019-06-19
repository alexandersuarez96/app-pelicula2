<?php

namespace App\Http\Controllers;

use App\Models\TypeMovie;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
class TypeMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_movies=TypeMovie::orderBy('id','ASC')->paginate(6);
        return view('type_movie.index',compact('type_movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_movies=TypeMovie::orderBy('id','ASC')->get();
        return view('type_movie.create',compact('type_movies'));
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
            
            ],
            [
            'name.required'=>'El campo URL es obligatorio',
            
            ]);
        TypeMovie::create($request->all());
        $request->session()->flash('success','Registro satisfactorio');
        return redirect()->route('type_movie.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeMovie  $typeMovie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type_movies=TypeMovie::find($id);
        return  view('type_movie.show',compact('type_movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeMovie  $typeMovie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type_movie=TypeMovie::find($id);
        return view('type_movie.edit',compact('type_movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeMovie  $typeMovie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            
            'name'=>'required',
           ]);
           TypeMovie::find($id)->update($request->all());
           return redirect()->route('type_movie.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeMovie  $typeMovie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypeMovie::find($id)->delete();
      
        return redirect()->route('type_movie.index')->with('success','Registro eliminado satisfactoriamente');
    }
    public function pdf()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
       $type_movies= TypeMovie::all(); 
       
       $pdf =PDF::loadView('type_movie.pdf',compact('type_movies'));
       return $pdf->download('listado generos.pdf');
    }
}
