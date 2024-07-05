<?php

namespace App\Http\Controllers;

use App\Models\ImcModel;
use Illuminate\Http\Request;

class imcController extends Controller
{
    public function index(){

        $resultado = [
            "imc" => "",
            "faixa" => ""
        ];
        return view('imc.index')->with('resultado', $resultado);
  
    }


    public function calcular(Request $request){

        $data = $request->all();

        $peso = $data["peso"];
        $altura=$data["altura"];

        $imc = $peso / ($altura ** 2);

        $resultado["imc"] = round($imc, 2);


        switch (true) {
            case ($imc < 18.5):
                $resultado["faixa"] = "Abaixo do peso";
                break;
            case ($imc >= 18.5 && $imc < 25):
                $resultado["faixa"] = "Peso normal";
                break;
            case ($imc >= 25 && $imc < 30):
                $resultado["faixa"] = "Sobrepeso";
                break;
            default:
                $resultado["faixa"] = "Obesidade";
        }

        return view("imc.index", compact('resultado'));

    }

    public function store(Request $request){

        $data = $request->all();

        $peso = $data['peso'];
        $altura = $data['altura'];
        $nome = $data['nome'];

        $imc = new ImcModel();
        $imc->nome = $nome;
        $imc->altura = $altura;
        $imc->peso = $peso;

        $imc->save();

        return redirect()->route("imc.calcular", $data);
    }

    public function show(Request $request){
        $showImc = ImcModel::orderBy("id","asc")->get();

        return view('imc.show')->with('showImc', $showImc);
    }


    public function destroy(Request $request, $id){
        $deleteImc = ImcModel::findOrFail($id);
        $deleteImc->delete();

        return redirect('/imc/show');
    }

    public function update(Request $request, $id){
        $updateIMC = ImcModel::findOrFail($id);

        $updateIMC->nome = $request->novo_nome;
        $updateIMC->peso = $request->novo_peso;
        $updateIMC->altura = $request->novo_altura;

        $updateIMC->save();

        return redirect('/imc/show');
    }
}