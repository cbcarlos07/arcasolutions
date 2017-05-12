<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 20:00
 */
class EmpresaListIterator
{
    protected $empresaList;
    protected $currentEmpresa = 0;

    public function __construct(EmpresaList $empresaList_in) {
        $this->empresaList = $empresaList_in;
    }
    public function getCurrentEmpresa() {
        if (($this->currentEmpresa > 0) &&
            ($this->empresaList->getEmpresaCount() >= $this->currentEmpresa)) {
            return $this->empresaList->getEmpresa($this->currentEmpresa);
        }
    }
    public function getNextEmpresa() {
        if ($this->hasNextEmpresa()) {
            return $this->empresaList->getEmpresa(++$this->currentEmpresa);
        } else {
            return NULL;
        }
    }
    public function hasNextEmpresa() {
        if ($this->empresaList->getEmpresaCount() > $this->currentEmpresa) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}