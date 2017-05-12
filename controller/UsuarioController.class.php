<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 22:33
 */
class UsuarioController
{
    public function snLogar($login, $senha){
        require_once "../model/UsuarioDAO.class.php";
        $usuarioDAO = new UsuarioDAO();
        $teste = $usuarioDAO->snLogar($login, $senha);
        return $teste;
    }
}