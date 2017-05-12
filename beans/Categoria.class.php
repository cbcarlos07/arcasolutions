<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 19:31
 */
class Categoria
{
   private $cdCategoria;
   private $dsCategoria;

    /**
     * @return mixed
     */
    public function getCdCategoria()
    {
        return $this->cdCategoria;
    }

    /**
     * @param mixed $cdCategoria
     * @return Categoria
     */
    public function setCdCategoria($cdCategoria)
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsCategoria()
    {
        return $this->dsCategoria;
    }

    /**
     * @param mixed $dsCategoria
     * @return Categoria
     */
    public function setDsCategoria($dsCategoria)
    {
        $this->dsCategoria = $dsCategoria;
        return $this;
    }


}