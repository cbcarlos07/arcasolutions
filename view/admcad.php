<?php
include "../function/error.php";
?>
<html>
 <head>
     <title>Business Finder</title>
     <link href="../css/bootstrap.css" type="text/css" rel="stylesheet"/>
     <link href="../css/style.css" type="text/css" rel="stylesheet"/>
     <link href="../css/bootstrap-multiselect.css" type="text/css" rel="stylesheet"/>

 </head>
 <body>

 <div class="container">

     <div class="col-lg-1"></div>
     <div class="col-lg-10 center">
         <h3 style="font-weight: bold">Business Finder Admin</h3>
         <br>
         <h4>Add Business</h4>

         <div class="col-lg-12">
           <div class="col-lg-6">
             <form id="business" method="post">
                 <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" id="title">
                 </div>
                 <div class="row"></div>
                 <div class="form-group">
                     <label for="title">Phone</label>
                     <input class="form-control" id="title">
                 </div>
                 <div class="row"></div>
                 <div class="form-group">
                     <label for="title">Address</label>
                     <input class="form-control" id="title">
                 </div>
                 <div class="row"></div>
                 <div class="form-group">
                     <label for="title">ZipCode</label>
                     <input class="form-control" id="title">
                 </div>
                 <div class="row"></div>
                 <div class="form-group">

                     <select class="form-control" id="title">
                         <option>City</option>
                     </select>
                 </div>
                 <div class="row"></div>
                 <div class="form-group">

                     <select class="form-control" id="title">
                         <option>State</option>
                     </select>
                 </div>
                 <div class="row"></div>
                 <div class="form-group">
                     <label for="title">Description</label>
                     <textarea class="form-control" id="title" rows="5"></textarea>
                 </div>
                 <div class="row"></div>
                 <select id="category" class="form-control" multiple="multiple">
                     <option value="0">Category</option>
                 <?php
                   include_once "../controller/CategoriaController.class.php";
                   include_once "../services/CategoriaListIterator.class.php";
                   include_once "../beans/Categoria.class.php";
                   $categoriaController  = new CategoriaController();
                   $categoria = new Categoria();

                   $lista = $categoriaController->getListCategoria();
                   $categoriaListaIterator = new CategoriaListIterator($lista);

                   while ($categoriaListaIterator->hasNextCategoria()){
                       $categoria = $categoriaListaIterator->getNextCategoria();
                    ?>
                       <option value="<?php  echo $categoria->getCdCategoria(); ?>"><?php echo $categoria->getDsCategoria();  ?></option>
                  <?php
                   }
                 ?>
                 </select>

             </form>
           </div>
         </div>

     </div>
     <div class="col-lg-1">

     </div>

 </div>

 <script src="../js/jquery-3.2.1.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/bootstrap-multiselect.js"></script>
 <script src="../js/business.js"></script>

 </body>
</html>