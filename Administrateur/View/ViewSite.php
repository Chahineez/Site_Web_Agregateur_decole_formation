
<?php

require '../Controller/gestionFormation.php';
class ViewSite{

  public $id;
  public $nom;
  
    // constructor 
    public function __construct($id){
      $this->id = $id;
  }

	public function afficherTitre()
	{
		   echo "<center>
      </center >";

	}

 public function afficherFormations()
 {
  echo '<br/>
    <center>
        
      <table border="1" class="tableau">
      <thead>
        <tr>
          <th scope="col">Type Formation</th>
          <th scope="col">Nom Formation</th>
          <th scope="col">Volume Horaire</th>
          <th scope="col">Prix HT</th>
          <th scope="col">Taux </th>
          <th scope="col">Prix TTC</th>
          <th scope="col"> </th>
          <th scope="col"></th>
        </tr> 
      </thead>
        <tbody>';
        $gestion= new GestionFormations();
        $array= $gestion->readTypesFormations($this->id);
        if(($array!=null) && (count($array)>0))
        {
        foreach ($array as $row => $type) {
             $array2= $gestion->readFormations($type["id"]);
             if (is_array($array2) || is_object($array2)){
                foreach ($array2 as $row => $formation) {
                  echo '<tr>
                <th scope="row">'.$type["nom"].'</th>
                <td >'.$formation["nom"].'</td> 
                <td>'.$type["heure"].' h</td>
                <td class="HT">'.$type["ht"].' DA</td>
                <td class="taux">'.$type["taux"].'</td>
                <td class="TTC"></td>
                <td><input id ="'.$formation["id"].'" class="supp" type="button" value="supprimer"></td>
                <td><input id ="'.$formation["id"].'" class="modif" type="button" value="modifier"></td>

            </tr>';
          }
        }
         } 
       }
         
      echo '</tbody>
            </table>
            </center>';
  }

  public function afficherForm1()
  {
     echo' <h3>Ajouter Type de Formation </h3>
    <form id="form1">
         Type de Formation:<br>
        <input type="text" name="type"><br>
         Volume horaire:<br>
        <input type="text" name="volume"><br>
         Prix HT:<br>
        <input type="text" name="ht"><br>
         Taux :<br>
        <input type="text" name="taux"><br>
        Formation:<br>
        <input type="text" name="formation"><br>
        <input name="id" type="hidden" value="">
        <input name="id_ecole" type="hidden" value="'.$this->id.'">
        <input type="submit" name="submit" value="Submit" class="sub">
    </form>';
  }

  public function afficherForm2()
  {
    echo '<h3>Ajouter Formation </h3>
    <form id="form2">
        Formation:<br>
        <input type="text" name="nomFormation"><br>
         type:<br>
        <input type="text" name="typeFormation"><br>
        <input name="id" type="hidden" value="">
        <input type="submit" name="submit" value="Submit" class="sub">
        <input name="id_ecole" type="hidden" value="'.$this->id.'">

    </form>';
  }


public function afficherFooter()
{
  echo '<footer>
  <a href="logout.php" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">Déconnection</a>
  </footer>';
}

public function afficherPanel()
{
     echo' 
          <h3> Modifier le thème de la page </h3>
          <center>
          <div class="formulaire">
           <form id="form3">
           Nom du thème:<br>
           <input type="text" class="form-control" name="nom"><br>
           Titre:<br>
           <input type="text" class="form-control" name="titre"><br>
           Titre:<br>
           <input type="color" class="form-control" name="color" /><br>
           <input type="submit" name="submit" value="Submit" class="sub">
           </form>
           </div>
           </center>';
    }

    public function header()
    {
      echo '<head>
        <title>agence zahra</title>
        <meta http-equiv="Pragma" content="no-cache">
        <meta name="keywords" content="école, privé,
        formation, bureautique ,services,infographie,management,comptabilité" />
        <meta name="description" content="Application web su l\'école privée zahra services" />
        <meta name="author" content="Chabane Chaouch Zahra" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/external.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/Jquery1.js"></script>
        <script type="text/javascript" src="js/create.js"></script>
        <script type="text/javascript" src="js/createFormation.js"></script>
        <script type="text/javascript" src="js/remove.js"></script>
        <script type="text/javascript" src="js/modif.js"></script>
        <script type="text/javascript" src="js/theme.js"></script>
    </head>';
    }

    public function getPage()
    {
      $this->header();
      echo '<body>';
      if(session_status() == PHP_SESSION_NONE){
        //session has not started
        session_start();
      }
      if (isset($_SESSION['admin']))
      {
          if(($_SESSION['admin']==$this->id) || ($_SESSION['admin']==0) )
          {
            echo '<h1>Page Sous Administrateur </h1>
            <br>
            <center>
            <div class="formulaire">';
            $this->afficherForm1(); 
            echo '<br>';
            $this->afficherForm2();
            echo '<br>
            </div>
            </center>
            <br>';
            $this->afficherFormations();
            echo '<br>';
            $this->afficherPanel();
            echo '</body>';
          }
          else
          {
            echo '<h1>Vous n\'étes pas autorisé à gérer ce site</h1>';
          }
        }
    }
}
?>