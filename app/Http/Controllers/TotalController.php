<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Confirmado;
use App\Models\Negativo;
use App\Models\Defuncion;
use App\Models\Sospechoso;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Http\Request;

class TotalController extends Controller
{
    public function index() {
        $datos['estados'] = Estado::all();
       
        $confirmados = Confirmado::all();
        $acumulado = 0;
        foreach ($confirmados as $key) {
            $acumulado+=$key->casos;
        }
        $datos['confirmadosTotales']=$acumulado;

        $negativos = Negativo::all();
        $acumulado = 0;
        foreach ($negativos as $key) {
            $acumulado+=$key->casos;
        }
        $datos['negativosTotales']=$acumulado;

        $defunciones = Defuncion::all();
        $acumulado = 0;
        foreach ($defunciones as $key) {
            $acumulado+=$key->casos;
        }
        $datos['defuncionesTotales']=$acumulado;
        $datos['estados'] = Estado::all();

        $sospechoso = Sospechoso::all();
        $acumulado = 0;
        foreach ($sospechoso as $key) {
            $acumulado+=$key->casos;
        }
        $datos['sospechososTotales']=$acumulado;
        $datos['id'] = 0;
        return view('total')->with($datos);
    }
    
    public function filter($id) {
        if ($id==0) {
            return redirect()->route('total');
        }
        $confirmados = Confirmado::where('estado_id',$id)->get();
        $acumulado = 0;
        foreach ($confirmados as $key) {
            $acumulado+=$key->casos;
        }
        $datos['confirmadosTotales']=$acumulado;

        $negativos = Negativo::where('estado_id',$id)->get();
        $acumulado = 0;
        foreach ($negativos as $key) {
            $acumulado+=$key->casos;

        }
        $datos['negativosTotales']=$acumulado;

        $defunciones = Defuncion::where('estado_id',$id)->get();
        $acumulado = 0;
        foreach ($defunciones as $key) {
            $acumulado+=$key->casos;
        }
        $datos['defuncionesTotales']=$acumulado;
        $datos['estados'] = Estado::all();

        $sospechoso = Sospechoso::where('estado_id',$id)->get();
        $acumulado = 0;
        foreach ($sospechoso as $key) {
            $acumulado+=$key->casos;
        }
        $datos['sospechososTotales']=$acumulado;

        $datos['id']=$id;
        return view('total')->with($datos);
        
    }
}
