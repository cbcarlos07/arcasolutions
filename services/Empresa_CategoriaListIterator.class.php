<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 20:00
 */
class Empresa_CategoriaListIterator
{
    protected $empresa_CategoriaList;
    protected $currentEmpresa_Categoria = 0;

    public function __construct(Empresa_CategoriaList $empresa_CategoriaList_in) {
        $this->empresa_CategoriaList = $empresa_CategoriaList_in;
    }
    public function getCurrentEmpresa_Categoria() {
        if (($this->currentEmpresa_Categoria > 0) &&
            ($this->empresa_CategoriaList->getEmpresa_CategoriaCount() >= $this->currentEmpresa_Categoria)) {
            return $this->empresa_CategoriaList->getEmpresa_Categoria($this->currentEmpresa_Categoria);
        }
    }
    public function getNextEmpresa_Categoria() {
        if ($this->hasNextEmpresa_Categoria()) {
            return $this->empresa_CategoriaList->getEmpresa_Categoria(++$this->currentEmpresa_Categoria);
        } else {
            return NULL;
        }
    }
    public function hasNextEmpresa_Categoria() {
        if ($this->empresa_CategoriaList->getEmpresa_CategoriaCount() > $this->currentEmpresa_Categoria) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}