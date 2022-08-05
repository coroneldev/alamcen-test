<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
class AlmacenController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-almacen|crear-almacen|editar-almacen|borrar-almacen')->only('index');
         $this->middleware('permission:crear-almacen', ['only' => ['create','store']]);
         $this->middleware('permission:editar-almacen', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-almacen', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacenes = Almacen::paginate(5);
        return view('almacenes.index',compact('almacenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacenes.crear');
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
            'nombre' => 'required',
            'tipo' => 'required',
            'estado' => 'required',
        ]);
    
        Almacen::create($request->all());
    
        return redirect()->route('almacenes.index');
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
    public function edit(Almacen $almacen)
    {
        return view('almacenes.editar',compact('almacen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Almacen $almacen)
    {
        request()->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'estado' => 'required',
        ]);
    
        $almacen->update($request->all());
    
        return redirect()->route('almacenes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Almacen $almacen)
    {
        $almacen->delete();
        return redirect()->route('almacenes.index');
    }
}
