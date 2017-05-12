<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 20:02
 */
class EmpresaCategoriaDAO
{
    private $connection = null;

    public function insert (Empresa_Categoria $categoria){
        $this->connection =  null;
        $teste = 0;

        $this->connection = new ConnectionFactory();
        $this->connection->beginTransaction();
        try{
            $query = "INSERT INTO empresa_categoria 
                       (CD_EMPRESA, CD_CATEGORIA) 
                       VALUES 
                       (:empresa, :categoria)";


            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":empresa", $categoria->getEmpresa()->getCdEmpresa(), PDO::PARAM_INT);
            $stmt->bindValue(":categoria", $categoria->getCategoria()->getCdCategoria(), PDO::PARAM_STR);


            $stmt->execute();
            $teste =  $this->connection->lastInsertId();
            $this->connection->commit();


            $this->connection =  null;
        }catch(PDOException $exception){
            echo "Erro: ".$exception->getMessage();
        }
        return $teste;
    }
    public function delete ($codigo, $empresa){
        $this->connection =  null;
        $teste = false;
        $this->connection = new     ConnectionFactory();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM empresa_categoria WHERE CD_CATEGORIA = :codigo AND CD_EMPRESA = :empresa";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":codigo", $codigo, PDO::PARAM_INT);
            $stmt->bindValue(":empresa", $empresa, PDO::PARAM_INT);
            $stmt->execute();
            $this->connection->commit();
            $teste =  true;

            $this->connection =  null;
        }catch(PDOException $exception){
            echo "Erro: ".$exception->getMessage();
        }
        return $teste;
    }

    public function getListSearchCategoria($nome, $inicio, $limite){
    require_once ("../services/CategoriaList.class.php");
    require_once ("../beans/Categoria.class.php");

    $this->connection = null;

    $this->connection = new ConnectionFactory();

    $categoriaList = new CategoriaList();

    try {

        $sql = "SELECT *
                        FROM `empresa_categoria` `B`
                        INNER JOIN categoria C ON B.CD_CATEGORIA = C.CD_CATEGORIA
                        WHERE `B`.CD_EMPRESA = :empresa 
                        LIMIT :inicio, :limite";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":empresa", $nome, PDO::PARAM_INT);
        $stmt->bindValue(":inicio", $inicio, PDO::PARAM_INT);
        $stmt->bindValue(":limite", $limite, PDO::PARAM_INT);

        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $categoria = new Categoria();
            $categoria->setCdCategoria($row['CD_CATEGORIA']);
            $categoria->setDsCategoria($row['DS_CATEGORIA']);;

            $categoriaList->addCategoria($categoria);
        }
        $this->connection = null;
    } catch (PDOException $ex) {
        echo "Erro: ".$ex->getMessage();
    }
    return $categoriaList;
}

    public function getListPesqCategoria($empresa){
        require_once ("../services/Empresa_CategoriaList.class.php");
        require_once ("../beans/Categoria.class.php");
        require_once ("../beans/Empresa_Categoria.class.php");

        $this->connection = null;

        $this->connection = new ConnectionFactory();

        $categoriaList = new Empresa_CategoriaList();

        try {

            $sql = "SELECT *
                        FROM `empresa_categoria` `B`
                        INNER JOIN categoria C ON B.CD_CATEGORIA = C.CD_CATEGORIA
                        WHERE `B`.CD_EMPRESA = :empresa ";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(":empresa", $empresa, PDO::PARAM_INT);

            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $categoria = new Empresa_Categoria();
                $categoria->setCategoria(new Categoria());
                $categoria->getCategoria()->setCdCategoria($row['CD_CATEGORIA']);
                $categoria->getCategoria()->setDsCategoria($row['DS_CATEGORIA']);;

                $categoriaList->addEmpresa_Categoria($categoria);
            }
            $this->connection = null;
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $categoriaList;
    }

    public function getListCategoria(){
        require_once ("services/CategoriaList.class.php");
        require_once ("beans/Categoria.class.php");

        $this->connection = null;

        $this->connection = new ConnectionFactory();

        $categoriaList = new CategoriaList();

        try {

            $sql = "SELECT *
                        FROM categoria C";
            $stmt = $this->connection->prepare($sql);

            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $categoria = new Categoria();
                $categoria->setCdCategoria($row['CD_CATEGORIA']);
                $categoria->setDsCategoria($row['DS_CATEGORIA']);;

                $categoriaList->addCategoria($categoria);
            }
            $this->connection = null;
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $categoriaList;
    }

}