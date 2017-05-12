<?php

/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 12/05/2017
 * Time: 09:43
 */
class EmpresaCategoriaController
{
    public function insert (Empresa_Categoria $categoria){
        require_once "../model/EmpresaCategoriaDAO.class.php";
        $ecDao = new EmpresaCategoriaDAO();
        $teste = $ecDao->insert($categoria);
        return $teste;
    }


}