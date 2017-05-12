<?php
session_start();
if(!isset($_SESSION['login'])){
    header('location: admin.php');
}
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
 <!-- Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Choose Category </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 Please, choose one or more categories
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

             </div>
         </div>
     </div>
 </div>


 <div class="container">

     <div class="col-lg-1"></div>
     <div class="col-lg-10 center">
         <h3 style="font-weight: bold">Business Finder Admin</h3>
         <br>
         <h4>Add Business</h4>

         <div class="col-lg-12">
           <div class="col-lg-6">
             <form id="business" method="post">

                 <div class="mensagem alert"></div>
                 <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" id="title" required="">
                 </div>
                 <div class="row"></div>
                 <div class="form-group">
                     <label for="phone">Phone</label>
                     <input class="form-control" id="phone" required="">
                 </div>
                 <div class="row"></div>
                 <div class="form-group">
                     <label for="address">Address</label>
                     <input class="form-control" id="address" required="" data-toggle="tooltip" title="Voc&ecirc; pode digitar o cep para carregar os dados do endere&ccedil;o!" />
                 </div>
                 <div class="row"></div>
                 <div class="form-group">
                     <label for="zipcode">ZipCode</label>
                     <input class="form-control" id="zipcode" required="">
                 </div>
                 <div class="row"></div>
                 <div class="form-group">

                     <select class="form-control" id="city" >
                         <option>City</option>
                     </select>
                 </div>
                 <div class="row"></div>
                 <div class="form-group">

                     <select class="form-control" id="state">
                         <option>State</option>
                     </select>
                 </div>
                 <div class="row"></div>
                 <div class="form-group">
                     <label for="descricao">Description</label>
                     <textarea id="descricao" class="form-control" id="title" rows="5" required=""></textarea>
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
                 <br />
                 <br />
                 <div style="text-align: center"><button type="submit" class="btn btn-default btn-save">Save </button></div>
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
 <script src="../js/jquery.mask.js"></script>
 <script src="../js/business.js"></script>

 <script>
     $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip();
     });
 </script>

 </body>
</html>