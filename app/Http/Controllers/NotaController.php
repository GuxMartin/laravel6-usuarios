<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;

class NotaController extends Controller{

    public function index(Request $request){
      if($request->ajax()){
        return Nota::where('user_id', \Auth::user()->id)->get();
      }
      else{
        return view('notas');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request){
      if($request->nombre == "a"){
        return response()->json(["errores" => ["Error 1", "Error 2"]], 422);
      }
      $nota = new Nota();
      $nota->nombre = $request->nombre;
      $nota->descripcion = $request->descripcion;
      $nota->user_id = auth()->id();
      $nota->save();
      return $nota;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id){
      $nota = Nota::find($id);
      $nota->nombre = $request->nombre;
      $nota->descripcion = $request->descripcion;
      $nota->save();
      return $nota;
    }


    public function destroy($id){
      $nota = Nota::find($id);
      $nota->delete();
    }
}