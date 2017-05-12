<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 22:07
 */

$usuario = $_POST['username'];
$password = $_POST['password'];

logar($usuario, $password);

function logar($usuario, $password){
  include_once "../controller/UsuarioController.class.php";
  $usuarioController = new UsuarioController();
  $retorno = $usuarioController->snLogar($usuario,$password);


  if($retorno > 0){
      session_start();
      $_SESSION['login'] = 1;
      echo json_encode(array("retorno" => 1));
  }else{
      echo json_encode(array("retorno" => 0));
  }
}