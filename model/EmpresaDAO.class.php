<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 11/05/17
 * Time: 20:02
 */
class EmpresaDAO
{
    private $connection = null;

    public function insert (Empresa $empresa){
        $this->connection =  null;
        $teste = 0;

        $this->connection = new ConnectionFactory();
        $this->connection->beginTransaction();
        try{
            $query = "INSERT INTO empresa 
                       (CD_EMPRESA, DS_TITULO, NR_TELEFONE, DS_ENDERECO, NR_CEP, DS_CIDADE, DS_ESTADO, DS_DESCRICAO) 
                       VALUES 
                       (NULL, :titulo, : telefone, :endereco, :cep, :cidade, :estado, :descricao)";


            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":titulo", $empresa->getDsTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":telefone", $empresa->getNrTelefone(), PDO::PARAM_STR);
            $stmt->bindValue(":endereco", $empresa->getDsEndereco(), PDO::PARAM_STR);
            $stmt->bindValue(":cep", $empresa->getNrCep(), PDO::PARAM_STR);
            $stmt->bindValue(":cidade", $empresa->getDsCidade(), PDO::PARAM_STR);
            $stmt->bindValue(":estado", $empresa->getDsEstado(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $empresa->getDsDesricao(), PDO::PARAM_STR);


            $stmt->execute();
            $teste =  $this->connection->lastInsertId();
            $this->connection->commit();


            $this->connection =  null;
        }catch(PDOException $exception){
            echo "Erro: ".$exception->getMessage();
        }
        return $teste;
    }

    public function update (Empresa $empresa){
        $this->connection =  null;
        $teste = false;

        $this->connection = new ConnectionFactory();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE empresa SET 
                       DS_TITULO = : titulo, NR_TELEFONE = :telefone, DS_ENDERECO = :endereco, 
                       NR_CEP = :cep, DS_CIDADE = :cidade, DS_ESTADO = :estado, DS_DESCRICAO = :descricao
                       WHERE CD_EMPRESA = :codigo";

            // echo "Nome do empresa: ".$empresa->getNmEmpresa();
            $stmt = $this->connection->prepare($query);
            // echo "Cd zona: ".$empresa->getZona()->getCdZona();
            $stmt->bindValue(":titulo", $empresa->getDsTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":telefone", $empresa->getNrTelefone(), PDO::PARAM_STR);
            $stmt->bindValue(":endereco", $empresa->getDsEndereco(), PDO::PARAM_STR);
            $stmt->bindValue(":cep", $empresa->getNrCep(), PDO::PARAM_STR);
            $stmt->bindValue(":cidade", $empresa->getDsCidade(), PDO::PARAM_STR);
            $stmt->bindValue(":estado", $empresa->getDsEstado(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $empresa->getDsDesricao(), PDO::PARAM_STR);
            $stmt->bindValue(":codigo", $empresa->getCdEmpresa(), PDO::PARAM_INT);

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
            $query = "DELETE FROM empresa WHERE CD_EMPRESA = :codigo";
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

    public function getListEmpresa( $inicio, $limite){
        require_once ("services/EmpresaList.class.php");
        require_once ("beans/Empresa.class.php");

        $this->connection = null;

        $this->connection = new ConnectionFactory();

        $empresaList = new EmpresaList();

        try {

            $sql = "SELECT `B`.`CD_EMPRESA`
                              ,`B`.`DS_TITULO`
                        FROM `empresa` `B`
                        ORDER BY B.CD_EMPRESA
                        LIMIT :inicio, :limite";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(":inicio", $inicio, PDO::PARAM_INT);
            $stmt->bindValue(":limite", $limite, PDO::PARAM_INT);

            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $empresa = new Empresa();
                $empresa->setCdEmpresa($row['CD_EMPRESA']);
                $empresa->setDsTitulo($row['DS_TITULO']);;

                $empresaList->addEmpresa($empresa);
            }
            $this->connection = null;
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $empresaList;
    }

    public function getListSearchEmpresa($busca){
        require_once ("services/EmpresaList.class.php");
        require_once ("beans/Empresa.class.php");

        $this->connection = null;

        $this->connection = new ConnectionFactory();

        $empresaList = new EmpresaList();

        try {

            $sql = "SELECT *
                      FROM empresa E
                      INNER JOIN empresa_categoria EC ON EC.CD_EMPRESA = E.CD_EMPRESA
                      INNER JOIN categoria C ON C.CD_CATEGORIA = EC.CD_CATEGORIA
                     WHERE 
                       (E.DS_TITULO LIKE :busca OR
                         (E.DS_ENDERECO LIKE :busca OR 
                          ( E.NR_CEP LIKE :busca OR (E.DS_CIDADE LIKE :busca OR (C.DS_CATEGORIA LIKE :busca )))))";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(":busca", "%$busca%", PDO::PARAM_INT);

            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $empresa = new Empresa();
                $empresa->setCdEmpresa($row['CD_EMPRESA']);
                $empresa->setDsTitulo($row['DS_TITULO']);

                $empresaList->addEmpresa($empresa);
            }
            $this->connection = null;
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $empresaList;
    }

    public function getEmpresa($codigo){
        $empresa = null;
        $this->connection = null;
        $this->connection =  new ConnectionFactory();
        $sql = "SELECT `B`.`CD_EMPRESA`
                      ,`B`.`DS_TITULO`
                      ,B.NR_TELEFONE
                      ,B.DS_ENDERECO
                      ,B.NR_CEP
                      ,B.DS_CIDADE
                      ,B.DS_ESTADO
                      ,B.DS_DESCRICAO
                        FROM `empresa` `B`
                    WHERE `CD_EMPRESA` = :codigo";

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(":codigo", $codigo, PDO::PARAM_INT);
            $stmt->execute();
            if($row =  $stmt->fetch(PDO::FETCH_ASSOC)){
                $empresa = new Empresa();
                $empresa->setCdEmpresa($row['CD_EMPRESA']);
                $empresa->setDsTitulo($row['DS_TITULO']);
                $empresa->setNrTelefone($row['NR_TELEFONE']);
                $empresa->setDsEndereco($row['DS_ENDERECO']);
                $empresa->setNrCep($row['NR_CEP']);
                $empresa->setDsCidade($row['DS_CIDADE']);
                $empresa->setDsEstado($row['DS_ESTADO']);
                $empresa->setDsDesricao($row['DS_DESCRICAO']);
            }
            $this->connection = null;
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $empresa;
    }





    public function getTotalEmpresas(){
        $empresa = 0;
        $this->connection = null;
        $this->connection =  new ConnectionFactory();
        $sql = "SELECT COUNT(*) TOTAL FROM empresa";

        try {
            $stmt = $this->connection->prepare($sql);

            $stmt->execute();
            if($row =  $stmt->fetch(PDO::FETCH_ASSOC)){
                $empresa = $row['TOTAL'];
            }
            $this->connection = null;
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $empresa;
    }
}