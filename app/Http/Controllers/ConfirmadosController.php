<?php

namespace App\Http\Controllers;
use App\Models\Confirmado;
use Illuminate\Http\Request;

class ConfirmadosController extends Controller
{
    public function show(string $id): View{
       
        dd(Confirmado::all());
    }
}
