<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 20:00
 */
class CategoriaListIterator
{
    protected $categoriaList;
    protected $currentCategoria = 0;

    public function __construct(CategoriaList $categoriaList_in) {
        $this->categoriaList = $categoriaList_in;
    }
    public function getCurrentCategoria() {
        if (($this->currentCategoria > 0) &&
            ($this->categoriaList->getCategoriaCount() >= $this->currentCategoria)) {
            return $this->categoriaList->getCategoria($this->currentCategoria);
        }
    }
    public function getNextCategoria() {
        if ($this->hasNextCategoria()) {
            return $this->categoriaList->getCategoria(++$this->currentCategoria);
        } else {
            return NULL;
        }
    }
    public function hasNextCategoria() {
        if ($this->categoriaList->getCategoriaCount() > $this->currentCategoria) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}