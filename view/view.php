<?php
$_id = $_POST['id'];

include_once "../beans/Empresa.class.php";
include_once "../beans/Empresa_Categoria.class.php";
include_once "../controller/EmpresaController.class.php";
include_once "../controller/EmpresaCategoriaController.class.php";
include_once "../services/EmpresaListIterator.class.php";
include_once "../services/Empresa_CategoriaListIterator.class.php";

$empresa = new Empresa();
$empresaController  = new EmpresaController();

$empresaCategoria = new Empresa_Categoria();
$empresaCategoriaController = new EmpresaCategoriaController();

$empresa = $empresaController->getEmpresa($_id);




?>
<html>

 <head>
     <title>Business Finder</title>
     <link href="../css/bootstrap.css" type="text/css" rel="stylesheet"/>
     <link href="../css/style.css" type="text/css" rel="stylesheet"/>

 </head>
 <body>

 <div class="container">

     <div class="col-lg-1"></div>
     <div class="col-lg-10 center">
         <h2>Business Finder</h2>
         <br>
         <br>
         <h3><b><?php echo $empresa->getDsTitulo()?></b></h3>
         <span>In
            <?php
            $empresaCategoriaLista = $empresaCategoriaController->getListPesqCategoria($empresa->getCdEmpresa());
            $empresaCategoriaListIterator = new Empresa_CategoriaListIterator($empresaCategoriaLista);
            while ($empresaCategoriaListIterator->hasNextEmpresa_Categoria()){
                $empresaCategoria =  $empresaCategoriaListIterator->getNextEmpresa_Categoria();
                echo $empresaCategoria->getCategoria()->getDsCategoria()." ";
            }
            ?>
         </span>
         <br>
         <h3><b>About</b></h3>
         <span><?php echo utf8_decode($empresa->getDsDesricao()); ?></span><br>
         <span>Address: <?php echo utf8_decode($empresa->getDsEndereco()).",  ".$empresa->getDsCidade()." - ".$empresa->getDsEstado().", ".$empresa->getNrCep() ;  ?></span><br />
         <span>Phone: <?php echo $empresa->getNrTelefone(); ?></span>


     </div>
     <div class="col-lg-1">

     </div>

 </div>

 <script src="../js/jquery-3.2.1.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/search.js"></script>

 </body>
</html>