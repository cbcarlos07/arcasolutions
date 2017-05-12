<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 19:58
 */
class Empresa_CategoriaList
{
    private $_empresa_Categoria;
    private $_empresa_CategoriaCount;

    /**
     * Empresa_CategoriaList constructor.
     * @param $_empresa_Categoria
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getEmpresa_CategoriaCount()
    {
        return $this->_empresa_CategoriaCount;
    }

    /**
     * @param mixed $empresa_CategoriaCount
     * @return Empresa_CategoriaList
     */
    public function setEmpresa_CategoriaCount($newCount)
    {
        $this->_empresa_CategoriaCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmpresa_Categoria($_empresa_CategoriaNumberToGet)
    {
        if((is_numeric($_empresa_CategoriaNumberToGet)) && ($_empresa_CategoriaNumberToGet <= $this->getEmpresa_CategoriaCount())){
            return $this->_empresa_Categoria[$_empresa_CategoriaNumberToGet];
        }else{
            return null;
        }
    }

    public function addEmpresa_Categoria(Empresa_Categoria $_empresa_Categoria_in) {
        $this->setEmpresa_CategoriaCount($this->getEmpresa_CategoriaCount() + 1);
        $this->_empresa_Categoria[$this->getEmpresa_CategoriaCount()] = $_empresa_Categoria_in;
        return $this->getEmpresa_CategoriaCount();
    }
    public function removeEmpresa_Categoria(Empresa_Categoria $_empresa_Categoria_in) {
        $counter = 0;
        while (++$counter <= $this->getEmpresa_CategoriaCount()) {
            if ($_empresa_Categoria_in->getAuthorAndTitle() ==
                $this->_empresa_Categoria[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getEmpresa_CategoriaCount(); $x++) {
                    $this->_empresa_Categoria[$x] = $this->_empresa_Categoria[$x + 1];
                }
                $this->setEmpresa_CategoriaCount($this->getEmpresa_CategoriaCount() - 1);
            }
        }
        return $this->getEmpresa_CategoriaCount();
    }



}