<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 19:58
 */
class CategoriaList
{
    private $_categoria;
    private $_categoriaCount;

    /**
     * CategoriaList constructor.
     * @param $_categoria
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getCategoriaCount()
    {
        return $this->_categoriaCount;
    }

    /**
     * @param mixed $categoriaCount
     * @return CategoriaList
     */
    public function setCategoriaCount($newCount)
    {
        $this->_categoriaCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoria($_categoriaNumberToGet)
    {
        if((is_numeric($_categoriaNumberToGet)) && ($_categoriaNumberToGet <= $this->getCategoriaCount())){
            return $this->_categoria[$_categoriaNumberToGet];
        }else{
            return null;
        }
    }

    public function addCategoria(Categoria $_categoria_in) {
        $this->setCategoriaCount($this->getCategoriaCount() + 1);
        $this->_categoria[$this->getCategoriaCount()] = $_categoria_in;
        return $this->getCategoriaCount();
    }
    public function removeCategoria(Categoria $_categoria_in) {
        $counter = 0;
        while (++$counter <= $this->getCategoriaCount()) {
            if ($_categoria_in->getAuthorAndTitle() ==
                $this->_categoria[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getCategoriaCount(); $x++) {
                    $this->_categoria[$x] = $this->_categoria[$x + 1];
                }
                $this->setCategoriaCount($this->getCategoriaCount() - 1);
            }
        }
        return $this->getCategoriaCount();
    }



}