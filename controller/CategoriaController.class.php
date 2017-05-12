<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 22:22
 */
class CategoriaController
{


    public function getListCategoria(){
        require_once "../model/CategoriaDAO.class.php";
        $categoriaDao = new CategoriaDAO();
        $teste = $categoriaDao->getListCategoria();
        return $teste;
    }
}