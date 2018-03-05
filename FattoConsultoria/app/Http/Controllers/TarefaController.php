<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\tarefa;
use Illuminate\Support\Facades\DB;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = tarefa::all();
        return view('home',['all' => $all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $all = tarefa::all();

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countordem =  DB::table('tarefas')->count() + 1;
        $tarefa = new tarefa();
        $tarefa->nome = Input::get('nome');
        $tarefa->custo = Input::get('custo');
        $tarefa->datalimite = Input::get('datalimite');
        $tarefa->ordem = $countordem;
        $tarefa->save();
        return redirect()-> route('index');
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $idteste = Input::get('id');
        $tarefa = tarefa::find($idteste);
        $tarefa->nome = Input::get('nome');
        $tarefa->custo = Input::get('custo');
        $tarefa->datalimite = Input::get('datalimite');
        $tarefa->update();
        return redirect()-> route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefa = tarefa::find($id);
        $tarefa ->delete();
        return redirect()->route('home');
    }
}
