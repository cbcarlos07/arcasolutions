<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 22:22
 */
class EmpresaController
{



    public function insert (Empresa $empresa){
        require_once "../model/EmpresaDAO.class.php";
        $empresaDao = new EmpresaDAO();
        $teste = $empresaDao->insert($empresa);
        return $teste;
    }

    public function update (Empresa $empresa){
        require_once "../model/EmpresaDAO.class.php";
        $empresaDao = new EmpresaDAO();
        $teste = $empresaDao->update($empresa);
        return $teste;
    }
    public function getListEmpresa($inicio, $limite){
        require_once "../model/EmpresaDAO.class.php";
        $empresaDao = new EmpresaDAO();
        $teste = $empresaDao->getListEmpresa($inicio, $limite);
        return $teste;
    }

    public function getListSearchEmpresa($busca){
        require_once "../model/EmpresaDAO.class.php";
        $empresaDao = new EmpresaDAO();
        $teste = $empresaDao->getListSearchEmpresa( $busca );
        return $teste;
    }

    public function getEmpresa($codigo){
        require_once "../model/EmpresaDAO.class.php";
        $empresaDao = new EmpresaDAO();
        $teste = $empresaDao->getEmpresa( $codigo );
        return $teste;
    }

    public function getTotalEmpresas(){
        require_once "../model/EmpresaDAO.class.php";
        $empresaDao = new EmpresaDAO();
        $teste = $empresaDao->getTotalEmpresas(  );
        return $teste;
    }
}