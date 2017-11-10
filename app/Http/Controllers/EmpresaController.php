<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Empresa;
use Validator;
use App\Estado;
use App\Cidade;
use App\Categoria;
use App\EmpresaCategoria;

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

            //$empresa = Empresa::with([ 'city','category' ])->select('*')->where('id','=',1)->get();
             $empresa = Empresa::with([ 'city','category' ])
                 ->where('title','like','%'.$pesquisa.'%')
                 ->orWhere('endereco','like','%'.$pesquisa.'%')
                 ->orWhere('cep','like', '%'.$pesquisa.'%')
                 ->orWhereHas( 'city', function ($query){
                     $query->where('descricao','like','%'.\Request::input('search').'%');
                 } )
                 ->orWhereHas('category', function ($query){
                     $query->where('descricao','like','%'.\Request::input('search').'%');
                 })
                 ->get();
             return view( 'result' )->with( ['parameter' => $pesquisa, 'empresa' => $empresa] );
         }

    }

    public function lista(  ){

            //$empresa = Empresa::with([ 'city','category' ])->select('*')->where('id','=',1)->get();
            $empresa = Empresa::with([ 'city','category', 'state' ])->paginate(15);
            return view( 'list' )->with( 'empresa' , $empresa );


    }


    public function getEmpresa( $pesquisa ){


      //  echo "Pesquisa: ".$pesquisa;


            //$empresa = Empresa::with([ 'city','category' ])->select('*')->where('id','=',1)->get();
            $empresa = Empresa::with([ 'city','category', 'state' ])
                ->find($pesquisa)
                ->get();
          //  return $empresa;
            return view( 'detail' )->with( 'empresa' , $empresa);


    }

    public function searchScreen (){
            return view('search');
    }

    public function addBusiness(){

        $estados = Estado::pluck('descricao', 'sigla');
        $cidades = Cidade::pluck('descricao', 'id');
        $categorias = Categoria::pluck('descricao','id');
        //echo json_encode( $estados );


        return view('addBusiness')->with( ['estados' => $estados, 'cidades' => $cidades, 'categoria' => $categorias ]);
    }

    public function saveBusiness( Request $request ){


        $title       = $request->input('title');
        $phone       = $request->input('phone');
        $address     = $request->input('address');
        $zipcode     = $request->input('zipcode');
        $city        = $request->input('city');
        $state       = $request->input('state');
        $description = $request->input('description');
        $category    = $request->input('category');

        //var_dump($category);

        $fields = array(
            'title'       => $title,
            'phone'       => $phone,
            'address'     => $address,
            'zipcode'     => $zipcode,
            'description' => $description,
            'category'    => $category
        );

        $validator = Validator::make(
            $fields,
            [
                'title'       => 'min:5',
                'phone'       => 'min:10',
                'address'     => 'min:15',
                'zipcode'     => 'min:8',
                'description' => 'min:8',
                'category'    => 'required'
            ]
        );

        if( $validator->fails() ){
            return redirect()->action('EmpresaController@addBusiness' )->withErrors( $validator )->withInput();
        }else{

            $empresa = new Empresa();
            $empresa->title     = $title;
            $empresa->telefone  = $phone;
            $empresa->endereco  = $address;
            $empresa->cep       = $zipcode;
            $empresa->cidade    = $city;
            $empresa->estado    = $state;
            $empresa->descricao = $description;
            $empresa->save();



            foreach ( $category as $value ){
                $empCat = new EmpresaCategoria();
                $empCat->empresa_id   = $empresa->id;
                $empCat->categoria_id = $value;
                $empCat->save();
            }

            return redirect()->action( 'EmpresaController@lista' )->withInput();



        }




    }




}
