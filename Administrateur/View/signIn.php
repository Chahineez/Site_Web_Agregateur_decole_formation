<?php
echo '
  <head> 
  <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
  <script type="text/javascript" src="js/auth.js"></script>
  
  </head>
   <body>
   <div class="container">
   <div class="row">
       <div class="col-lg-4">
   
       </div>
       <div class="col-lg-4">
           <h2 class="text-muted">S\'authentifier</h2>
           <form action="" method="post" id="formSignIn">
               <div class="form-group">
                   <input type="text" name="userName" class="form-control" placeholder="userName">
               </div>
               <div class="form-group">
                   <input type="password" name="password" class="form-control" placeholder="Mot de passe">
               </div>
               <div class="form-group">
                   <input id="signIn" type="submit" class="btn btn-primary" value="S\'authentifier">
               </div>


           </form>
       </div>
   </div>
</div>
</body>';

?>