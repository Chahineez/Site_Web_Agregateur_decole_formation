
<?php

require '../Controller/gestionFormation.php';

class ViewEcole{

  public $id;
  public $nom_ecole;
  
    // constructor 
    public function __construct($id , $nom){
      $this->id = $id;
      $this->nom_ecole=$nom;
  }

	public function afficherTitre()
	{

		 echo "<center>
	   <h1>".$this->nom_ecole."</h1>
      </center >";

	}

	public function afficherDiapos()
	{
		echo '
		<center>
		<div  class="contener_slideshow">
    	<div  class="contener_slide">
    		<div class="slid_1"><img src="ImagesetVideos/diapo1.jpg" alt="Image accueil" title="Ecole privée ZahraServices"  > </div>
    	    <div class="slid_2"><img  src="ImagesetVideos/diapo2.jpg" alt="Image accueil" title="Ecole privée ZahraServices" > </div>
    	    <div class="slid_3"><img  src="ImagesetVideos/diapo3.jpg" alt="Image accueil" title="Ecole privée ZahraServices" > </div>
    	     <div class="slid_4"><img  src="ImagesetVideos/diapo4.jpg" alt="Image accueil" title="Ecole privée ZahraServices" > </div>
        </div>
       </div>
       </center>';
	}

	public function afficherListe()
	{

    		echo "<br/>
    		<h2>Secteurs d'activité : </h2>
	  		<ul class='menu'>";
            $gestionFormation= new GestionFormations();
            $array= $gestionFormation->readTypesFormations($this->id); 
            foreach ($array as $row => $type) {
                echo'
                 <li class="formation"> 
                     <a href="bureautique.html">'.$type["nom"].'</a>';
                 $arrayFormations= $gestionFormation->readFormations($type["id"]);
                 if(($arrayFormations!=null) && (count($arrayFormations)>0))
                 {
                    echo '<ul>';
                    foreach ($arrayFormations as $key => $formation) {
                        echo '<li><a href="langues.html">'.$formation["nom"].'</a></li>';
                    }
                    echo '</ul>';
              
                 }
                 echo '</li>';
            }

            echo "</ul><br/>";

	}

  public function afficherVideo()
  {

     echo ' <br><center>';
     echo '<video src="ImagesetVideos/Video accueil.mp4" width="80%" height="400" preload="auto" controls/>';
     echo '</center>';
  }

  public function afficherFormations()
  {
     echo '<br/>
          <h2>Nos formations</h2>
          <br/>
          <br/>
          <center>       
        <table border="1" class="tableau">
        <thead>
            <tr>
                <th scope="col">Type Formation</th>
          <th scope="col">Formation</th>
                <th scope="col">Volume Horaire</th>
                <th scope="col">Prix HT</th>
                <th scope="col">Taux </th>
                <th scope="col">Prix TTC</th>
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
                <td class="TTC"></td> </tr>';
            }
          } 
        }
      }
     
     echo '</tbody>
          </table>
          </center>
          <br>
          <br>';

  }

  
  public function head()
  {
    echo '<head>
    <title>agence zahra</title>
<meta http-equiv="Pragma" content="no-cache">
<meta name="keywords" content="école, privé,
formation, bureautique ,services,infographie,management,comptabilité" />
<meta name="description" content="Application web su l\'école privée zahra services" />
<meta name="author" content="Chabane Chaouch Zahra" />
<link href="css/external.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/Jquery1.js"></script>
</head>';
  }

  public function footer()
  {
    echo '
    <footer>
       <p class="lien"><a href="fz_chabanechaouch@esi.dz">Contactez-nous</a></p>
    </footer>';
  }
  
  public function getPage()
  {
      $this->head();
      echo '<body>';  
      $this->afficherTitre();
      $this->afficherDiapos();
      $this->afficherListe();
      $this->afficherFormations();
      $this->afficherVideo();
      $this->afficherAuth();
      echo '</body>';
      $this->footer();
  }

}
?>