<?php

namespace App\Http\Controllers;

use App\Models\qrvclientes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class qrvclientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = qrvclientes::paginate(5);
        return view('clientes.index')
            ->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'due' => 'required|gte:10'
        ]);
        $client = qrvclientes::create(request()->only('name', 'due', 'comments'));
        Session::flash('mensaje', 'Registro creado con exito');
        return redirect()->route('clientes.index');
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
    public function edit(qrvclientes $client)
    {
        return view('clientes.form')
            ->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,qrvclientes $client)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'due' => 'required|gte:10'
        ]);
        $client->name = $request['name'];
        $client->due = $request['due'];
        $client->comments = $request['comments'];
        $client->save();
        Session::flash('mensaje', 'Registro editado con exito');
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(qrvclientes $client)
    {
        $client->delete();
        Session::flash('mensaje', 'Registro eliminado con exito');
        return redirect()->route('clientes.index');
    }
}
