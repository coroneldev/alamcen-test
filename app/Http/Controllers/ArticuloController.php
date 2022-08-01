<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Articulo;
class ArticuloController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-articulo|crear-articulo|editar-articulo|borrar-articulo')->only('index');
         $this->middleware('permission:crear-articulo', ['only' => ['create','store']]);
         $this->middleware('permission:editar-articulo', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-articulo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::paginate(5);
        return view('articulos.index',compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.crear');
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
            'precio' => 'required',
            'stock_fisico' => 'required',
            'stock_virtual' => 'required',
        ]);
    
        Articulo::create($request->all());
    
        return redirect()->route('articulos.index');
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
    public function edit(Articulo $articulo)
    {
        return view('articulos.editar',compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        request()->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'stock_fisico' => 'required',
            'stock_virtual' => 'required',
        ]);
    
        $articulo->update($request->all());
    
        return redirect()->route('articulos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulos.index');
    }
}
