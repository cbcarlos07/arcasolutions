<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 19:34
 */
class Empresa
{
private $cdEmpresa;
private $dsTitulo;
private $nrTelefone;
private $dsEndereco;
private $nrCep;
private $dsCidade;
private $dsEstado;
private $dsDesricao;

    /**
     * @return mixed
     */
    public function getCdEmpresa()
    {
        return $this->cdEmpresa;
    }

    /**
     * @param mixed $cdEmpresa
     * @return Empresa
     */
    public function setCdEmpresa($cdEmpresa)
    {
        $this->cdEmpresa = $cdEmpresa;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsTitulo()
    {
        return $this->dsTitulo;
    }

    /**
     * @param mixed $dsTitulo
     * @return Empresa
     */
    public function setDsTitulo($dsTitulo)
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNrTelefone()
    {
        return $this->nrTelefone;
    }

    /**
     * @param mixed $nrTelefone
     * @return Empresa
     */
    public function setNrTelefone($nrTelefone)
    {
        $this->nrTelefone = $nrTelefone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsEndereco()
    {
        return $this->dsEndereco;
    }

    /**
     * @param mixed $dsEndereco
     * @return Empresa
     */
    public function setDsEndereco($dsEndereco)
    {
        $this->dsEndereco = $dsEndereco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNrCep()
    {
        return $this->nrCep;
    }

    /**
     * @param mixed $nrCep
     * @return Empresa
     */
    public function setNrCep($nrCep)
    {
        $this->nrCep = $nrCep;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsCidade()
    {
        return $this->dsCidade;
    }

    /**
     * @param mixed $dsCidade
     * @return Empresa
     */
    public function setDsCidade($dsCidade)
    {
        $this->dsCidade = $dsCidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsEstado()
    {
        return $this->dsEstado;
    }

    /**
     * @param mixed $dsEstado
     * @return Empresa
     */
    public function setDsEstado($dsEstado)
    {
        $this->dsEstado = $dsEstado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsDesricao()
    {
        return $this->dsDesricao;
    }

    /**
     * @param mixed $dsDesricao
     * @return Empresa
     */
    public function setDsDesricao($dsDesricao)
    {
        $this->dsDesricao = $dsDesricao;
        return $this;
    }


}