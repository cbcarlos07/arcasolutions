<?php
include "../function/error.php";
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
         <h1 style="font-weight: bold">Business Finder Admin</h1>
         <br>
         <h3 style="margin-left: 0px;">Businesses</h3>
        <br>
         <div class="col-lg-12">
             <?php

               $pagina = (isset($_POST['pagina'])) ? $_POST['pagina'] : 1;

               include_once "../controller/EmpresaController.class.php";
               include_once "../services/EmpresaListIterator.class.php";

               $empresaController = new EmpresaController();
               $totalEmprea = $empresaController->getTotalEmpresas();

               $registros = 10;

               $numeroDePaginas = ceil($totalEmprea / $registros);

               //variavel para calcular o início da visualização com base na página atual
               $begin = ($registros * $pagina) - $registros;

               $empresaLista = $empresaController->getListEmpresa($begin, $registros);

               $empresaListIterator = new EmpresaListIterator($empresaLista);

               while ($empresaListIterator->hasNextEmpresa()){
                   $empresa = $empresaListIterator->getNextEmpresa();
                   echo "<h3>".$empresa->getCdEmpresa().". ".utf8_decode($empresa->getDsTitulo())."</h3>";
                   echo "<br>";
               }


             ?>
             <div class="row"></div>
             <!-- INICIO DA PAGINAÇÃO -->


             <div id="buttom" class="row">
                 <div class="col-md-12">
                     <ul class="pagination">
                         <?php

                         if($pagina == 1){
                             ?>
                             <li class="disabled">
                                 <a href="#"
                                    data-url="<?php echo $_SERVER['PHP_SELF']; ?>"
                                    data-page="">&lt; Anterior</a>
                             </li>
                             <?php
                         }else{
                             ?>
                             <li class="page-item">  <a href="#"
                                                        data-url="<?php echo $_SERVER['PHP_SELF']; ?>"
                                                        data-page="<?php echo $pagina-1; ?>"
                                                        class="btn-page">&lt; Anterior</a>
                             </li>
                             <?php
                         }

                         for($i = 1; $i < $numeroDePaginas + 1; $i++){
                             $disabled = "";

                             if($pagina == $i){
                                 $disabled = "active";
                             }
                             ?>

                             <li class="<?php echo $disabled; ?>">
                                 <a href="#"
                                    data-url="<?php echo $_SERVER['PHP_SELF']; ?>"
                                    data-page="<?php echo $i; ?>"
                                    class="btn-page"
                                 ><?php echo $i; ?>
                                 </a>
                             </li>

                             <?php
                         }
                         ?>
                         <?php
                         if($numeroDePaginas > 1){
                             ?>
                             <?php
                             if($pagina == $numeroDePaginas){
                                 ?>
                                 <li class="disabled"><a href="#"
                                                         data-url="<?php echo $_SERVER['PHP_SELF']; ?>"
                                                         data-page="<?php echo $pagina + 1; ?>"
                                     >Pr&oacute;ximo &gt; </a>
                                 </li>
                                 <?php
                             }else {
                                 ?>
                                 <li class="next"><a href="#"
                                                     data-url="<?php echo $_SERVER['PHP_SELF']; ?>"
                                                     data-page="<?php echo $pagina + 1; ?>"
                                                     class="btn-page">Pr&oacute;ximo &gt; </a>
                                 </li>
                                 <?php
                             }
                         }
                         ?>

                     </ul>
                 </div>


             </div>
             <!-- FIM DA PAGINAÇÃO -->
         </div>

     </div>
     <div class="col-lg-1">
         <div style="margin-top: 80px;">
            <a href="admcad.php" class="btn btn-default">Add business</a>
         </div>
     </div>

 </div>

 <script src="../js/jquery-3.2.1.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/search.js"></script>
 <script>
     $('.btn-page').on('click', function(){
         //alert('Pagina');
         var url      = $(this).data('url');
         var pagina   = $(this).data('page');
         var form     = $('<form action="'+url+'" method="post">'+
             '<input type="hidden" name="pagina" value="'+pagina+'">'+
             '</form>');
         $('body').append(form);
         form.submit();

     });


 </script>

 </body>
</html>