<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class imcController extends Controller
{
    public function index() {
        return view('imc.index');
    }

    public function CalcularIMC(){
        $imc = $_POST['peso']/$_POST['altura']**2;

        return round($imc,2);
    }
}
