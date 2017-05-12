<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 19:41
 */
class Usuario
{
private $cdUsuario;
private $dsLogin;
private $dsSenha;

    /**
     * @return mixed
     */
    public function getCdUsuario()
    {
        return $this->cdUsuario;
    }

    /**
     * @param mixed $cdUsuario
     * @return Usuario
     */
    public function setCdUsuario($cdUsuario)
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsLogin()
    {
        return $this->dsLogin;
    }

    /**
     * @param mixed $dsLogin
     * @return Usuario
     */
    public function setDsLogin($dsLogin)
    {
        $this->dsLogin = $dsLogin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsSenha()
    {
        return $this->dsSenha;
    }

    /**
     * @param mixed $dsSenha
     * @return Usuario
     */
    public function setDsSenha($dsSenha)
    {
        $this->dsSenha = $dsSenha;
        return $this;
    }


}