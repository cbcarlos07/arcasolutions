<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 19:39
 */
class Empresa_Categoria
{
private $empresa;
private $categoria;

    /**
     * @return mixed
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * @param mixed $empresa
     * @return Empresa_Categoria
     */
    public function setEmpresa(Empresa $empresa)
    {
        $this->empresa = $empresa;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     * @return Empresa_Categoria
     */
    public function setCategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }


}