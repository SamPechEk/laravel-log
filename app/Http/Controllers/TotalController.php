<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Confirmado;
use App\Models\Negativo;
use App\Models\Defuncion;
use App\Models\Sospechoso;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
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
        $datos['datos'] = [
            [
                "tipo" => "Confirmados",
                "cantidad" => $datos['confirmadosTotales'],
            ],
            [
                "tipo" => "Negativos",
                "cantidad" => $datos['negativosTotales'],
            ],
            [
                "tipo" => "Defunciones",
                "cantidad" => $datos['defuncionesTotales'],
            ],
            [
                "tipo" => "Sospechosos",
                "cantidad" => $datos['sospechososTotales'],
            ],
        ];
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
        $datos['datos'] = [
            [
                "tipo" => "Confirmados",
                "cantidad" => $datos['confirmadosTotales'],
            ],
            [
                "tipo" => "Negativos",
                "cantidad" => $datos['negativosTotales'],
            ],
            [
                "tipo" => "Defunciones",
                "cantidad" => $datos['defuncionesTotales'],
            ],
            [
                "tipo" => "Sospechosos",
                "cantidad" => $datos['sospechososTotales'],
            ],
        ];
        $datos['id']=$id;
        return view('total')->with($datos);
        
    }

    public function indexMonth() {

        // Obtener los 5 estados con más casos confirmados en el mes
        $estadosMasCasosConfirmados = Confirmado::join('upload_estados_20230919201321', 'upload_confirmados_20230919201140.estado_id', '=', 'upload_estados_20230919201321.id')
            ->groupBy('upload_confirmados_20230919201140.estado_id', 'upload_estados_20230919201321.nombre')
            ->select('upload_confirmados_20230919201140.estado_id', 'upload_estados_20230919201321.nombre', \DB::raw('SUM(upload_confirmados_20230919201140.casos) as totalCasos'))
            ->orderBy('totalCasos', 'desc')
            ->take(5)
            ->get();

        // Obtener los 5 estados con más casos negativos en el mes
        $estadosMasCasosNegativos = Negativo::join('upload_estados_20230919201321', 'upload_negativos_20230919201405.estado_id', '=', 'upload_estados_20230919201321.id')
            ->groupBy('upload_negativos_20230919201405.estado_id', 'upload_estados_20230919201321.nombre')
            ->select('upload_negativos_20230919201405.estado_id', 'upload_estados_20230919201321.nombre', \DB::raw('SUM(upload_negativos_20230919201405.casos) as totalCasos'))
            ->orderBy('totalCasos', 'desc')
            ->take(5)
            ->get();

        // Obtener los 5 estados con más casos de defunciones en el mes
        $estadosMasCasosDefunciones = Defuncion::join('upload_estados_20230919201321', 'upload_defunciones_20230919201302.estado_id', '=', 'upload_estados_20230919201321.id')
            ->groupBy('upload_defunciones_20230919201302.estado_id', 'upload_estados_20230919201321.nombre')
            ->select('upload_defunciones_20230919201302.estado_id', 'upload_estados_20230919201321.nombre', \DB::raw('SUM(upload_defunciones_20230919201302.casos) as totalCasos'))
            ->orderBy('totalCasos', 'desc')
            ->take(5)
            ->get();

        // Obtener los 5 estados con más casos sospechosos en el mes
        $estadosMasCasosSospechosos = Sospechoso::join('upload_estados_20230919201321', 'upload_sospechosos_20230919201422.estado_id', '=', 'upload_estados_20230919201321.id')
            ->groupBy('upload_sospechosos_20230919201422.estado_id', 'upload_estados_20230919201321.nombre')
            ->select('upload_sospechosos_20230919201422.estado_id', 'upload_estados_20230919201321.nombre', \DB::raw('SUM(upload_sospechosos_20230919201422.casos) as totalCasos'))
            ->orderBy('totalCasos', 'desc')
            ->take(5)
            ->get();

        $meses = [
            ['id' => 1, 'nombre' => 'Enero', 'selected' => false],
            ['id' => 2, 'nombre' => 'Febrero', 'selected' => false],
            ['id' => 3, 'nombre' => 'Marzo', 'selected' => false],
            ['id' => 4, 'nombre' => 'Abril', 'selected' => false],
            ['id' => 5, 'nombre' => 'Mayo', 'selected' => false],
            ['id' => 6, 'nombre' => 'Junio', 'selected' => false],
            ['id' => 7, 'nombre' => 'Julio', 'selected' => false],
            ['id' => 8, 'nombre' => 'Agosto', 'selected' => false],
            ['id' => 9, 'nombre' => 'Septiembre', 'selected' => false],
            ['id' => 10, 'nombre' => 'Octubre', 'selected' => false],
            ['id' => 11, 'nombre' => 'Noviembre', 'selected' => false],
            ['id' => 12, 'nombre' => 'Diciembre', 'selected' => false],
        ];
        $datos['estadosMasCasosConfirmados'] = $estadosMasCasosConfirmados;
        $datos['estadosMasCasosDefunciones'] = $estadosMasCasosDefunciones;
        $datos['estadosMasCasosNegativos'] = $estadosMasCasosNegativos;
        $datos['estadosMasCasosSospechosos'] = $estadosMasCasosSospechosos;
        $datos['meses'] = $meses;
        $datos['mes']=0;
        return view('totalMonth')->with($datos);
    }


    public function filterMonth($mes) {
        if ($mes==0) {
            return redirect()->route('totalMonth');
        }
    
       // Obtener los 5 estados con más casos confirmados en el mes
        $estadosMasCasosConfirmados = Confirmado::whereMonth('fecha', $mes)
            ->join('upload_estados_20230919201321', 'upload_confirmados_20230919201140.estado_id', '=', 'upload_estados_20230919201321.id')
            ->groupBy('upload_confirmados_20230919201140.estado_id', 'upload_estados_20230919201321.nombre')
            ->select('upload_confirmados_20230919201140.estado_id', 'upload_estados_20230919201321.nombre', \DB::raw('SUM(upload_confirmados_20230919201140.casos) as totalCasos'))
            ->orderBy('totalCasos', 'desc')
            ->take(5)
            ->get();

        // Obtener los 5 estados con más casos negativos en el mes
        $estadosMasCasosNegativos = Negativo::whereMonth('fecha', $mes)
            ->join('upload_estados_20230919201321', 'upload_negativos_20230919201405.estado_id', '=', 'upload_estados_20230919201321.id')
            ->groupBy('upload_negativos_20230919201405.estado_id', 'upload_estados_20230919201321.nombre')
            ->select('upload_negativos_20230919201405.estado_id', 'upload_estados_20230919201321.nombre', \DB::raw('SUM(upload_negativos_20230919201405.casos) as totalCasos'))
            ->orderBy('totalCasos', 'desc')
            ->take(5)
            ->get();

        // Obtener los 5 estados con más casos de defunciones en el mes
        $estadosMasCasosDefunciones = Defuncion::whereMonth('fecha', $mes)
            ->join('upload_estados_20230919201321', 'upload_defunciones_20230919201302.estado_id', '=', 'upload_estados_20230919201321.id')
            ->groupBy('upload_defunciones_20230919201302.estado_id', 'upload_estados_20230919201321.nombre')
            ->select('upload_defunciones_20230919201302.estado_id', 'upload_estados_20230919201321.nombre', \DB::raw('SUM(upload_defunciones_20230919201302.casos) as totalCasos'))
            ->orderBy('totalCasos', 'desc')
            ->take(5)
            ->get();

        // Obtener los 5 estados con más casos sospechosos en el mes
        $estadosMasCasosSospechosos = Sospechoso::whereMonth('fecha', $mes)
            ->join('upload_estados_20230919201321', 'upload_sospechosos_20230919201422.estado_id', '=', 'upload_estados_20230919201321.id')
            ->groupBy('upload_sospechosos_20230919201422.estado_id', 'upload_estados_20230919201321.nombre')
            ->select('upload_sospechosos_20230919201422.estado_id', 'upload_estados_20230919201321.nombre', \DB::raw('SUM(upload_sospechosos_20230919201422.casos) as totalCasos'))
            ->orderBy('totalCasos', 'desc')
            ->take(5)
            ->get();
    
        $datos['estadosMasCasosConfirmados'] = $estadosMasCasosConfirmados;
        $datos['estadosMasCasosDefunciones'] = $estadosMasCasosDefunciones;
        $datos['estadosMasCasosNegativos'] = $estadosMasCasosNegativos;
        $datos['estadosMasCasosSospechosos'] = $estadosMasCasosSospechosos;
        $datos['mes']=$mes;
        $meses = [
            ['id' => 1, 'nombre' => 'Enero', 'selected' => false],
            ['id' => 2, 'nombre' => 'Febrero', 'selected' => false],
            ['id' => 3, 'nombre' => 'Marzo', 'selected' => false],
            ['id' => 4, 'nombre' => 'Abril', 'selected' => false],
            ['id' => 5, 'nombre' => 'Mayo', 'selected' => false],
            ['id' => 6, 'nombre' => 'Junio', 'selected' => false],
            ['id' => 7, 'nombre' => 'Julio', 'selected' => false],
            ['id' => 8, 'nombre' => 'Agosto', 'selected' => false],
            ['id' => 9, 'nombre' => 'Septiembre', 'selected' => false],
            ['id' => 10, 'nombre' => 'Octubre', 'selected' => false],
            ['id' => 11, 'nombre' => 'Noviembre', 'selected' => false],
            ['id' => 12, 'nombre' => 'Diciembre', 'selected' => false],
        ];
        $datos['meses'] = $meses;
    
        return view('totalMonth')->with($datos);
    }    
}
