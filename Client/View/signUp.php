<?php
echo '
  <head> 
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" src="js/inscrire.js"></script>
  </head>
   <body>
   <div class="container">
   <div class="row">
       <div class="col-lg-4">
   
       </div>
       <div class="col-lg-4">
           <h2 class="text-muted">S\'inscrire</h2>
           <form action="" method="post" id="formSignUp">
               <div class="form-group">
                   <input type="text" name="mail" class="form-control" placeholder="Mail">
               </div>
               <div class="form-group">
                   <input type="text" name="userName" class="form-control" placeholder="Nom utilisateur">
               </div>
               <div class="form-group">
                   <input type="password" name="password" class="form-control" placeholder="Mot de passe">
               </div>
               <div class="form-group">
                   <input id="signUp" type="submit" class="btn btn-primary" value="S\'inscrire">
               </div>


           </form>
       </div>
   </div>
</div>
</body>';

?>