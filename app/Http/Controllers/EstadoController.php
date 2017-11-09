<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Estado;

class EstadoController extends Controller
{
    public function getEstados(  ){

        $estado = Estado::all();
        //var_dump( $estado );
        $dados =  json_encode(  $estado );
        return $dados;

    }
}
