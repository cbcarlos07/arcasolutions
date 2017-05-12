<?php
$_pesqu = $_POST['find'];

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

$empresaLista = $empresaController->getListSearchEmpresa($_pesqu);

$empresaListIterator = new EmpresaListIterator($empresaLista);


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
         <h3 style="margin-left: 0px;">Result for "<?php echo $_pesqu; ?>"</h3>
         <br>

         <?php
         while ($empresaListIterator->hasNextEmpresa()){
             $empresa = $empresaListIterator->getNextEmpresa();
             $empresaCategoriaLista = $empresaCategoriaController->getListPesqCategoria($empresa->getCdEmpresa());
             $empresaCategoriaListIterator = new Empresa_CategoriaListIterator($empresaCategoriaLista);
            ?><h3> <?php echo $empresa->getCdEmpresa()." ".  utf8_decode($empresa->getDsTitulo()); ?></h3>
                   <p >in
                      <?php
                      while ($empresaCategoriaListIterator->hasNextEmpresa_Categoria()){
                          $empresaCategoria =  $empresaCategoriaListIterator->getNextEmpresa_Categoria();
                        echo $empresaCategoria->getCategoria()->getDsCategoria()." ";
                      }
                      ?>
                   </p>

             <br>
          <?php

         }
         ?>


     </div>
     <div class="col-lg-1">
         <div style="margin-top: 80px;">
             <a href="admin.php" class="btn btn-default">Manager</a>
         </div>
     </div>

 </div>

 <script src="../js/jquery-3.2.1.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/search.js"></script>

 </body>
</html>