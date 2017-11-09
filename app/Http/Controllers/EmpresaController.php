<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Empresa;
use Validator;
use App\Estado;
class EmpresaController extends Controller
{
    public function find( Request $request ){
        $pesquisa = $request->input('search');
        $values = array(
            "search" => $pesquisa
        );

         $validator = Validator::make(
             $values,
             [
                 "search" => "required"
             ]

         );
         if( $validator->fails() ){
             return redirect()->action("EmpresaController@searchScreen")->withErrors( $validator )->withInput();
         }else{
           //  return response()->json( array( "retorno" => 'Deu certo' ) );
             echo "Deu certo";
         }

    }

    public function searchScreen (){
            return view('search');
    }

    public function addBusiness(){

        $estados = Estado::pluck('descricao', 'sigla');

        //echo json_encode( $estados );


        return view('addBusiness')->with( 'estados', $estados );
    }




}
