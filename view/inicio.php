<html>
 <head>
     <title>Business Finder</title>
     <link href="../css/bootstrap.css" type="text/css" rel="stylesheet"/>
     <link href="../css/style.css" type="text/css" rel="stylesheet"/>

 </head>
 <body>
 <!-- Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Empty Field</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 Please type something to search
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

             </div>
         </div>
     </div>
 </div>

 <div class="container">
     <br>
     <br>
     <div class="col-lg-2"></div>
     <div class="col-lg-8 center">
         <h2>Business Finder</h2>
         <br>
         <br>
         <div class="col-lg-2"></div>
         <div class="col-lg-8">
           <input id="find" class="form-control" placeholder="What are you looking for?" />
         </div>
         <div class="col-lg-2"></div>
         <br />
         <br />
         <br>
         <div style="margin-left: 310px;">
         <button class="btn btn-default btn-search">Search</button>
         </div>

     </div>
     <div class="col-lg-2"></div>

 </div>

 <script src="../js/jquery-3.2.1.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/search.js"></script>

 </body>
</html>