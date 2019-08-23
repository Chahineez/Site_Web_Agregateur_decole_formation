<?php

include_once '../Controller/gestionCategories.php';
include_once '../Controller/gestionFormation.php';
class ViewGlobale{

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
      if (isset($_SESSION['admin']))
      {
        echo '<center><h1>Site Administrateur du site</h1></center>';
        echo '<div id="container1">
        <div id="containerZone" class="row"> ';
        $this->menu();
        $this->categories();
        echo '</div>';
        $this->logOut();
        echo '</div>';
        echo "</body>";
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
   $("#table-a-trier").stupidtable();
  }); 
 </script> 
  <div id="containerEcoles">
  <input id="myInput" type="text" placeholder="Search..">
  <br><br>
  <table id="tableEcoles"  class="table table-striped custab">
    <thead>
      <tr>
        <th data-sort="string">Nom</th>
        <th data-sort="string">Domaine</th>
        <th data-sort="string">Wilaya</th>
        <th data-sort="string">Commune</th>
        <th data-sort="string">Address</th>
        <th data-sort="string">Tel</th>
        <th data-sort="string">Fax</th>
        <th class="text-center">gestion</th>
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
               <td class="text-center"><a class="btn btn-info btn-xs" href="admin.php?id='.$ecole["id"].'"><span class="glyphicon glyphicon-edit"></span>gérer</a></td>
          </tr>
         ';
    }
    echo '
    </tbody>
  </table>
  </div>';
}




}
?>
