<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajador;


class TrabajadorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-trabajador|crear-trabajador|editar-trabajador|borrar-trabajador')->only('index');
        $this->middleware('permission:crear-trabajador', ['only' =>['create','store']]);
        $this->middleware('permission:editar-trabajador', ['only' =>['edit','update']]);
        $this->middleware('permission:borrar-trabajador', ['only' =>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajadores = Trabajador::paginate(5);
        return view('trabajadores.index', compact('trabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajadores.crear');
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
            'name' => 'required',
            'ci' => 'required',
            'cellphone' => 'required',
            'photo' => 'required',
            'date_in' => 'required',
            'position' => 'required',
            'email' => 'required',
        ]);


        Trabajador::create($request->all());
        return redirect()->route('trabajadores.index');

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
    public function edit(Trabajador $trabajador)
    {
        return view('trabajadores.editar', compact('trabajador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajador $trabajador)
    {
        request()->validate([
            'name' => 'required',
            'ci' => 'required',
            'cellphone' => 'required',
            'photo' => 'required',
            'date_in' => 'required',
            'position' => 'required',
            'email' => 'required',
        ]);

        $trabajador->update($request->all());
        return redirect()->route('trabajadores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajador $trabajador)
    {
        $trabajador->delete();
        return redirect()->route('trabajadores.index');
    }
}
