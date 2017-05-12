<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 20:02
 */
class CategoriaDAO
{
    private $connection = null;

    public function insert (Categoria $categoria){
        $this->connection =  null;
        $teste = 0;

        $this->connection = new ConnectionFactory();
        $this->connection->beginTransaction();
        try{
            $query = "INSERT INTO categoria 
                       (CD_CATEGORIA, DS_CATEGORIA) 
                       VALUES 
                       (NULL, :categoria)";


            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":categoria", $categoria->getDsCategoria(), PDO::PARAM_STR);


            $stmt->execute();
            $teste =  $this->connection->lastInsertId();
            $this->connection->commit();


            $this->connection =  null;
        }catch(PDOException $exception){
            echo "Erro: ".$exception->getMessage();
        }
        return $teste;
    }

    public function update (Categoria $categoria){
        $this->connection =  null;
        $teste = false;

        $this->connection = new ConnectionFactory();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE categoria SET 
                       DS_CATEGORIA = :categoria
                       WHERE CD_CATEGORIA = :codigo";

            // echo "Nome do categoria: ".$categoria->getNmCategoria();
            $stmt = $this->connection->prepare($query);
            // echo "Cd zona: ".$categoria->getZona()->getCdZona();
            $stmt->bindValue(":categoria", $categoria->getDsCategoria(), PDO::PARAM_STR);
            $stmt->bindValue(":zona",$categoria->getCdCategoria(), PDO::PARAM_INT);

            $stmt->execute();
            //
            //
            $this->connection->commit();
            $teste =  true;
            //  print_r($stmt);

            $this->connection =  null;
        }catch(PDOException $exception){
            echo "Erro: ".$exception->getMessage();
        }
        return $teste;
    }

    public function delete ($codigo){
        $this->connection =  null;
        $teste = false;
        $this->connection = new     ConnectionFactory();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM categoria WHERE CD_CATEGORIA = :codigo";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":codigo", $codigo, PDO::PARAM_INT);
            $stmt->execute();
            $this->connection->commit();
            $teste =  true;

            $this->connection =  null;
        }catch(PDOException $exception){
            echo "Erro: ".$exception->getMessage();
        }
        return $teste;
    }

    public function getListCategoria(){
        require_once ("services/CategoriaList.class.php");
        require_once ("beans/Categoria.class.php");

        $this->connection = null;

        $this->connection = new ConnectionFactory();

        $categoriaList = new CategoriaList();

        try {

            $sql = "SELECT `B`.`CD_CATEGORIA`
                              ,`B`.`DS_CATEGORIA`
                        FROM `categoria` `B`";
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

    public function getCategoria($codigo){
        $categoria = null;
        $this->connection = null;
        $this->connection =  new ConnectionFactory();
        $sql = "SELECT `B`.`CD_CATEGORIA`
                              ,`B`.`DS_CATEGORIA`
                        FROM `categoria` `B`
                    WHERE `CD_CATEGORIA` = :codigo";

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(":codigo", $codigo, PDO::PARAM_INT);
            $stmt->execute();
            if($row =  $stmt->fetch(PDO::FETCH_ASSOC)){
                $categoria = new Categoria();
                $categoria->setCdCategoria($row['CD_CATEGORIA']);
                $categoria->setDsCategoria($row['DS_CATEGORIA']);
            }
            $this->connection = null;
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $categoria;
    }





    public function getTotalCategorias(){
        $categoria = 0;
        $this->connection = null;
        $this->connection =  new ConnectionFactory();
        $sql = "SELECT COUNT(*) TOTAL FROM categoria";

        try {
            $stmt = $this->connection->prepare($sql);

            $stmt->execute();
            if($row =  $stmt->fetch(PDO::FETCH_ASSOC)){
                $categoria = $row['TOTAL'];
            }
            $this->connection = null;
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $categoria;
    }
}