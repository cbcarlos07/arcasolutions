<?php
/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 12/05/2017
 * Time: 09:32
 */

$title     = $_POST['title'];
$phone     = $_POST['phone'];
$address   = $_POST['address'];
$zipcode   = $_POST['zipcode'];
$city      = $_POST['city'];
$state     = $_POST['state'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];


cadastrar($title, $phone, $address, $zipcode, $city, $state, $descricao, $categoria);


function cadastrar($title, $phone, $address, $zipcode, $city, $state, $descricao, $categoria){
    include_once "../controller/EmpresaController.class.php";
    include_once "../controller/EmpresaCategoriaController.class.php";
    include_once "../beans/Empresa_Categoria.class.php";
    include_once "../beans/Empresa.class.php";
    include_once "../beans/Categoria.class.php";

    $empresa = new Empresa();
    $empresaCategoria =  new Empresa_Categoria();

    $empresaController = new EmpresaController();
    $empresaCategoriaController = new EmpresaCategoriaController();

    $empresa->setDsTitulo($title);
    $empresa->setNrTelefone($phone);
    $empresa->setDsEndereco($address);
    $empresa->setNrCep($zipcode);
    $empresa->setDsCidade($city);
    $empresa->setDsEstado($state);
    $empresa->setDsDesricao($descricao);

    $bool = $empresaController->insert($empresa);


    $array = json_decode($categoria);

    if($bool > 0){
        foreach ($array as $item => $value){
            $empresaCategoria->setEmpresa(new Empresa());
            $empresaCategoria->getEmpresa()->setCdEmpresa($bool);

            $empresaCategoria->setCategoria(new Categoria());
            $empresaCategoria->getCategoria()->setCdCategoria($value->{'id'});

            $teste = $empresaCategoriaController->insert($empresaCategoria);


        }

        echo json_encode(array("retorno"  => "1"));
    }else{
        echo json_encode(array("retorno"  => "2"));
    }





}