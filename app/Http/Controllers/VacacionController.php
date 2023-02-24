<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacacion;

class VacacionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-vacacion|crear-vacacion|editar-vacacion|borrar-vacacion')->only('index');
        $this->middleware('permission:crear-vacacion', ['only' =>['create','store']]);
        $this->middleware('permission:editar-vacacion', ['only' =>['edit','update']]);
        $this->middleware('permission:borrar-vacacion', ['only' =>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacaciones = Vacacion::paginate(5);
        return view('vacaciones.index', compact('vacaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacaciones.crear');
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
            'days_taken' => 'required',
            'observations' => 'required',
            'date_init' => 'required',
        ]);

        Vacacion::create($request->all());
        return redirect()->route('vacaciones.index');

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
    public function edit(Vacacion $vacacion)
    {
        return view('vacaciones.editar', compact('vacacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Vacacion $vacacion)
    {
        request()->validate([
            'name' => 'required',
            'days_taken' => 'required',
            'observations' => 'required',
            'date_init' => 'required',
        ]);


        $vacacion->update($request->all());
        return redirect()->route('vacaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacacion $vacacion)
    {
        $vacacion->delete();
        return redirect()->route('vacaciones.index');
    }
}
