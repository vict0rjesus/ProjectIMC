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

        return redirect('/imc/calcularImc');
    }
}