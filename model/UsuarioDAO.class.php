<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 19:48
 */
class UsuarioDAO
{
    private $conexao;
    public function snLogar($login, $senha){

        require_once 'ConnectionFactory.class.php';

        $teste = 0;
        $usuario = null;
        $conexao = null;


        $this->conexao =  new ConnectionFactory();


        $sql = "SELECT * FROM `usuario` WHERE `DS_LOGIN` = :login AND `DS_SENHA` = MD5(:senha)";

        try {
            $stmt = $this->conexao->prepare($sql);

            $stmt->bindValue(":login", $login, PDO::PARAM_STR);
            $stmt->bindValue(":senha", $senha, PDO::PARAM_STR);
            $stmt->execute();



            if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $teste = 1;


            }

            $this->conexao = null;
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }

        return $teste;
    }
}