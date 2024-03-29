<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
class EmpresaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-empresa|crear-empresa|editar-empresa|borrar-empresa')->only('index');
         $this->middleware('permission:crear-empresa', ['only' => ['create','store']]);
         $this->middleware('permission:editar-empresa', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-empresa', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::paginate(5);
        return view('empresas.index',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.crear');
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
            'ciudad' => 'required',
            'provincia' => 'required',
        ]);
    
        Empresa::create($request->all());
    
        return redirect()->route('empresas.index');
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
    public function edit(Empresa $empresa)
    {
        return view('empresas.editar',compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        request()->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'provincia' => 'required',
        ]);
    
        $empresa->update($request->all());
    
        return redirect()->route('empresas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas.index');
        
    }
}
