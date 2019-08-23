<?php

include_once '../Controller/gestionCategories.php';
include_once '../Controller/gestionFormation.php';
class View{

public $arr;
public $id_ecole1;
public $id_ecole2;
public $id_categorie;
public $nom_categorie;

  // constructor 


  public function __construct($id , $nom){
    $this->id_categorie = $id;
    $this->nom_categorie=$nom;
}
  
  public function head()
  {
    echo '<head>
    <title>Site comparatif des écoles de formation</title>
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="keywords" content="école, privé,
    formation" />
    <meta name="description" content="Application web pour comparer les prix des écoles de formation" />
    <meta name="author" content="Chabane Chaouch Zahra" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/JqueryCarousel.js"></script>
    <script type="text/javascript" src="js/media.js"></script>
    <script type="text/javascript" src="js/filter.js"></script>
    <script type="text/javascript" src="js/compare.js"></script>
    <script src="js/tri/stupidtable.min.js"></script>
    <link href="css/styleCarousel.css" rel="stylesheet" type="text/css" />
    <link href="css/styleLogo.css" rel="stylesheet" type="text/css" />
    <link href="css/styleHome.css" rel="stylesheet" type="text/css" />
    <link href="css/styleMenu.css" rel="stylesheet" type="text/css" />
    <link href="css/styleMedia.css" rel="stylesheet" type="text/css" />
    <link href="css/styleCategories.css" rel="stylesheet" type="text/css" />
    <link href="css/styleFooter.css" rel="stylesheet" type="text/css" />
    <link href="css/styleEcoles.css" rel="stylesheet" type="text/css" />  
    <link href="css/styleCompare.css" rel="stylesheet" type="text/css" />
    <link href="css/comment.css" rel="stylesheet" type="text/css" />
   
        </head>';
  }



  public function diaporamma()
  {
    echo '
    <div class="container" id="containerSlider">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
         <div class="item active">
          <img src="ImagesetVideos/img1.jpg">
           <div class="carousel-caption">
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="ImagesetVideos/img2.png">
           <div class="carousel-caption">
           </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="ImagesetVideos/img3.jpg">
           <div class="carousel-caption">
          </div>
        </div><!-- End Item -->
                
      </div><!-- End Carousel Inner -->


    	<ul class="nav nav-pills nav-justified" id="nav1">
          <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">Université</a></li>
          <li data-target="#myCarousel" data-slide-to="1"><a href="#">Professionelle</a></li>
          <li data-target="#myCarousel" data-slide-to="2"><a href="#">Education</a></li>
        </ul>


    </div><!-- End Carousel -->
</div>
    ';
  }


  public function logo()
  {
    echo '
    <div class="container" id="containerLogo">
          <img src="ImagesetVideos/logo.png"> 
    </div>
    ';
  }
  public function menu()
  {

    $gestion1= new GestionCategories();
    $array= $gestion1->readCategories();
     echo '
    <div class="container" id="containerMenu">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="index.php"><i class="fa fa-home fa-fw"></i>Accueil</a></li>
                <li><a href="apropos.php.php"><i class="fa fa-list-alt fa-fw"></i>A propos</a></li>
                <li><a href="compare.php"><i class="fa fa-list-alt fa-fw"></i>Comparer les écoles</a></li>';
    foreach ($array as $row => $categorie)
    {
        echo '<li><a href="categorie.php?id_categorie='.$categorie["id"]; echo '&nom_categorie='.$categorie["nom_categorie"].'"><i class="fa fa-list-alt fa-fw"></i>'.$categorie["nom_categorie"].'</a></li>';
    }           
         echo '       
            </ul>
</div> ';
  }


 public function categories()
 {
  $gestion1= new GestionCategories();
  $array= $gestion1->readCategories();
  echo '<div id="containerCategories">';
  foreach ($array as $row => $categorie)
    {
         echo '
          <div class="container">
          <div class="list-group">
            <a href="categorie.php?id_categorie='.$categorie["id"]; echo '&nom_categorie='.$categorie["nom_categorie"].'" class="list-group-item clearfix">
              <span class="glyphicon glyphicon-th-large"></span>
              '.$categorie["nom_categorie"].'
              <span class="pull-right">
              </span>
            </a>
          </div>
        </div>
          ';
    }   
   echo '</div>';
 }

public function body()
{
      echo "<body>";
      if(session_status() == PHP_SESSION_NONE){
        //session has not started
        session_start();
      }
      echo '<center><h1>Site Administrateur</h1></center>';
      if (isset($_SESSION['admin']))
      {
        $this->logo();
        $this->diaporamma();
        echo '<div id="container1">
        <div id="containerZone" class="row"> ';
        $this->menu();
        $this->categories();
        echo '</div>';
        $this->logOut();
        echo '</div><br>';
        echo "</body>";
        $this->footer();
      }
      else
      {
        echo '<br><br>';
        echo '<center><h4>Veuillez vous connecter avec un compte administrateur</h4></center>';
        $this->signIn();
        echo "</body>";

      }

    
      
}


public function signIn()
{
  if (isset($_SESSION['mail']) && isset($_SESSION['pwd']))
  {
    echo '<div class="row" id="auth">
    <a href="logOut.php"><input id="logOut" type="submit" class="btn btn-primary" value="Se déconnecter" ></a>
    
    </div>
    ';
  }
  else
  {
  echo '<div class="row" id="auth">
           <a href="signIn.php"><input id="SignIn" type="submit" class="btn btn-primary" value="S\'authentifier" ></a>
           </div>
           ';
  }
  
}


public function logOut()
{

    echo '<div class="row" id="auth">
    <a href="logOut.php"><input id="logOut" type="submit" class="btn btn-primary" value="Se déconnecter" ></a>
    
    </div>
    ';
  
}



public function pageCommune($categorie)
{
      echo "<body>";
      if(session_status() == PHP_SESSION_NONE){
        //session has not started
        session_start();
      }
      echo '<div id="container1">
      <div id="containerZone" class="row"> ';
      $this->menu();
      $this->afficherEcoles($categorie);
      echo '</div>';
      $this->logOut();
      echo '</div>';
      echo "</body>";
}




public function afficherEcoles($categorie)
{
  $gestion1= new GestionCategories();
  $array= $gestion1->readEcoles($categorie);
  echo '
  <script>
  $(document).ready(function($) { 
   $("#tableEcoles").stupidtable();
  }); 
 </script> 
  <div id="containerEcoles">
  <input id="myInput" type="text" placeholder="Search..">
  <br><br>
  <table id="tableEcoles"  class="table table-striped custab">
    <thead>
    <a href="formulaire2.php?id='.$this->id_categorie.'" class="btn btn-primary btn-xs pull-right"><b>+</b> Ajouter une école</a>
      <tr>
        <th data-sort="string">Nom<i class="fa fa-sort"></i></th>
        <th data-sort="string">Domaine</th>
        <th data-sort="string">Wilaya</i></th>
        <th data-sort="string">Commune</i></th>
        <th data-sort="string">Address</th>
        <th data-sort="string">Tel</th>
        <th data-sort="string">Fax</th>
        <th class="text-center">commentaire</th>
        <th class="text-center">Action</th>
        <th class="text-center">gérer</th>
      </tr>
    </thead>
    <tbody id="myTable">';
    foreach ($array as $row => $ecole)
    {
         echo '
          <tr>
               <td><a href= "ecole.php?id='.$ecole["id"]; echo'&nom='.$ecole["nom"].'">'.$ecole["nom"].'</a></td>
               <td>'.$ecole["domaine"]. '</td>
               <td>'.$ecole["wilaya"]. '</td>
               <td>'.$ecole["commune"]. '</td>
               <td>'.$ecole["addresse"]. '</td>
               <td>'.$ecole["tel"]. '</td>
               <td>'.$ecole["fax"]. '</td>
               <td class="text-center"><a class="btn btn-info btn-xs" href="formulaire.php?id_ecole='.$ecole["id"];echo '&nom_ecole='.$ecole["nom"].'"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="../Controller/removeEcole.php?id='.$ecole["id"].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
               <td class="text-center"><a class="btn btn-info btn-xs" href="commentaire.php?id_ecole='.$ecole["id"];echo '&nom_ecole='.$ecole["nom"].'"><span class="glyphicon glyphicon-comment"></span>Commenter</a></td>
               <td class="text-center"><a class="btn btn-info btn-xs" href="siteAdmin.php?id='.$ecole["id"].'"><span class="glyphicon glyphicon-edit"></span>gérer</a></td>
            </tr>
         ';
    }
    echo '
    </tbody>
  </table>
  </div>';
}

public function compare()
{
 
  $gestion1= new GestionCategories();
  $array= $gestion1->readCategories();
   echo '
   
   <div class="container row" id="containerCompare">
    <h4 class="page-header">Comparer les écoles </h4>
    <div class="row">
    <div class="col-sm-3">
      <select  id="selector1" class="form-control" onchange="TriggerClick1(this.value)">';
      foreach ($array as $row => $cat)
      {
        echo ' <option value="'.$cat["id"].'">'.$cat["nom_categorie"].'</option>';
      }
      echo '
      </select>
    </div>';
  echo '
   <div class="col-sm-3">
     <select class="form-control" id="selector2" onchange="TriggerClick2(this.value)">>
     </select>
   </div>';

 echo '

  <div class="col-sm-3">
    <select class="form-control" id="selector3" onchange="TriggerClick3(this.value)">>
    </select>
  </div>';
  echo '
</div>
</div>
<br />
   ';
}


public function zoneCompare1()
{
     echo '<script>
     $(document).ready(function($) { 
     $("#table-a-trier1").stupidtable();
     }); 
   </script> ';
     echo '
     <div class="container row" id="containerZone1"> 
     <div class="row">
          <h2 id="ecole1"></h2>
          <br/>
          <br/>
          <center>       
        <table border="1" class="tableau" id="table-a-trier1">
        <thead>
            <tr>
                <th data-sort="string" scope="col">Type Formation<i class="fa fa-sort"></i></th>
                <th data-sort="string" scope="col">Formation<i class="fa fa-sort"></i></th>
                <th data-sort="string" scope="col">Volume Horaire<i class="fa fa-sort"></i></th>
                <th data-sort="string" scope="col">Prix HT<i class="fa fa-sort"></i></th>
                <th  data-sort="string" scope="col">Taux <i class="fa fa-sort"></i></th>
                <th data-sort="string" scope="col">Prix TTC<i class="fa fa-sort"></i></th>
            </tr>   
        </thead>
        <tbody id= "tbody1"></tbody>
          </table>
          </center>
          </div>
          </div>';

}


public function zoneCompare2()
{
     echo '<script>
     $(document).ready(function($) { 
     $("#table-a-trier2").stupidtable();
     }); 
   </script> ';
     echo '
     <div class="container row" id="containerZone2"> 
     <div class="row">
          <h2 id="ecole2"></h2>
          <br/>
          <br/>
          <center>       
        <table border="1" class="tableau" id="table-a-trier2">
        <thead>
            <tr>
                <th data-sort="string" scope="col">Type Formation<i class="fa fa-sort"></i></th>
                <th data-sort="string" scope="col">Formation<i class="fa fa-sort"></i></th>
                <th data-sort="string" scope="col">Volume Horaire<i class="fa fa-sort"></i></th>
                <th data-sort="string" scope="col">Prix HT<i class="fa fa-sort"></i></th>
                <th  data-sort="string" scope="col">Taux <i class="fa fa-sort"></i></th>
                <th data-sort="string" scope="col">Prix TTC<i class="fa fa-sort"></i></th>
            </tr>   
        </thead>
        <tbody id="tbody2"></tbody>
          </table>
          </center>
          </div>
          </div>';

}


public function footer()
{

  $gestion1= new GestionCategories();
  $array= $gestion1->readCategories();
  $this->arr= $array;
  $i=2; $j=0;
  echo '
  <footer>
  <section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>liens</h5>
          <ul class="list-unstyled quick-links">';
          foreach ($array as $row => $categorie)
          {
            if($j==0)
            {
              $j=1;
              echo '<li><a href="index.php"><i class="fa fa-angle-double-right"></i>Accueil</a></li>';
              echo '<li><a href="apropos.php"><i class="fa fa-angle-double-right"></i>A propos de nous </a></li>';
            }
             if($i++==3)
             { 
               $i=1;
               echo '
               </ul>
				      </div>
               <div class="col-xs-12 col-sm-4 col-md-4">
                  <h5>liens</h5>
                  <ul class="list-unstyled quick-links">';
             }
             echo '<li><a href="'.$categorie["lien"].'"><i class="fa fa-angle-double-right"></i>'.$categorie["nom_categorie"].'</a></li>';
          }
      
   echo '			
					</ul>
				</div>
				
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				</hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u><a href="index.php">Site compartive Zahra Pro</a></u> vous trouverez dans ce site tous ce qui concerne les formation en Algérie</p>
					<p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="#" target="_blank">Zahra Chabane</a></p>
				</div>
				</hr>
			</div>	
		</div>
  </section>
  <footer>
	<!-- ./Footer -->
  ';
}



}
?>
