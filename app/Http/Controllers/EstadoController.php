<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function show(string $id): View{
       
        dd(Estado::find($id));
    }
}
