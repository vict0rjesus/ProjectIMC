<?php

namespace App\Http\Controllers;

use App\Models\NotasModel;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function notas() {
        return view('notas.index');
    }

    public function store(Request $request){

        $data = $request->all();

        $nome = $data['nome'];
        $media = $data['media'];
        $status = $data['status'];

        $nota = new NotasModel();
        $nota->nome = $nome;
        $nota->media = $media;
        $nota->status = $status;

        $nota->save();

        return redirect()->route("notas", $data);
    }

    public function show(Request $request){
        $showNotas = NotasModel::orderBy("id","asc")->get();

        return view('notas.show')->with('showNotas', $showNotas);
    }

    public function destroy(Request $request, $id){
        $deleteNotas = NotasModel::findOrFail($id);
        $deleteNotas->delete();

        return redirect('/notas/show');
    }

    public function update(Request $request, $id){
        $updateNotas = NotasModel::findOrFail($id);

        $updateNotas->nome = $request->novo_nome;
        $updateNotas->media = $request->novo_media;
        $updateNotas->status = $request->novo_status;

        $updateNotas->save();

        return redirect('/notas/show');
    }
}