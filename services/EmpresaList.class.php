<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 19:58
 */
class EmpresaList
{
    private $_empresa;
    private $_empresaCount;

    /**
     * EmpresaList constructor.
     * @param $_empresa
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getEmpresaCount()
    {
        return $this->_empresaCount;
    }

    /**
     * @param mixed $empresaCount
     * @return EmpresaList
     */
    public function setEmpresaCount($newCount)
    {
        $this->_empresaCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmpresa($_empresaNumberToGet)
    {
        if((is_numeric($_empresaNumberToGet)) && ($_empresaNumberToGet <= $this->getEmpresaCount())){
            return $this->_empresa[$_empresaNumberToGet];
        }else{
            return null;
        }
    }

    public function addEmpresa(Empresa $_empresa_in) {
        $this->setEmpresaCount($this->getEmpresaCount() + 1);
        $this->_empresa[$this->getEmpresaCount()] = $_empresa_in;
        return $this->getEmpresaCount();
    }
    public function removeEmpresa(Empresa $_empresa_in) {
        $counter = 0;
        while (++$counter <= $this->getEmpresaCount()) {
            if ($_empresa_in->getAuthorAndTitle() ==
                $this->_empresa[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getEmpresaCount(); $x++) {
                    $this->_empresa[$x] = $this->_empresa[$x + 1];
                }
                $this->setEmpresaCount($this->getEmpresaCount() - 1);
            }
        }
        return $this->getEmpresaCount();
    }



}