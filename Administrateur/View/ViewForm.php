<?php

require '../Controller/gestionEcoles.php';

class ViewForm{

    public $id_ecole;
    public $nom_ecole;
    public $id_categorie;



public function head()
{
    echo '
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <script type="text/javascript" src="js/editEcole.js"></script>
    <script type="text/javascript" src="js/addEcole.js"></script>';
}
public function AjouterEcole()
{

     echo' 
        <body>
        <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
         <h2 class="text-muted">Ajouter une école</h2>
         <form action="" method="post" id="formEcole1">
             <input type="hidden" name="id_categorie" value="'.$this->id_categorie.'">
            <div class="form-group">
                <input type="text" name="nom_ecole" class="form-control" placeholder=" Nom de l\'école">
            </div>
            <div class="form-group">
                <input type="text" name="domaine" class="form-control" placeholder="Domaine">
            </div>
            <div class="form-group">
                <input type="text" name="wilaya" class="form-control" placeholder="Wilaya">
            </div>
            <div class="form-group">
                <input type="text" name="commune" class="form-control" placeholder="Commune">
            </div>
            <div class="form-group">
                <input type="text" name="addresse" class="form-control" placeholder="Adresse">
            </div>
            <div class="form-group">
                <input type="text" name="tel" class="form-control" placeholder="Téléphone">
            </div>
            <div class="form-group">
                <input type="text" name="fax" class="form-control" placeholder="Fax">
            </div>
            <div class="form-group">
                 <input id="ajoutEcole" type="submit" class="btn btn-primary" value="Sauvegarder">
            </div>
        </form>
        </div>
        </div>
        </body>';
}



public function ModifierEcole()
{

    $gestion =new GestionEcoles();
    $array= $gestion->getEcole($this->id_ecole);
    
     echo' 
        <body>
        <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
         <h2 class="text-muted">Modifier les informations d\'une école</h2>
         <form action="" method="post" id="formEcole2">
            <input type="hidden" name="id_ecole" value="'.$this->id_ecole.'">
            <div class="form-group">
                <input type="text" name="nom_ecole" class="form-control" placeholder=" Nom de l\'école" value = "'.$array["nom_ecole"].'">
            </div>
            <div class="form-group">
                <input type="text" name="domaine" class="form-control" placeholder="Domaine" value = "'.$array["domaine"].'">
            </div>
            <div class="form-group">
                <input type="text" name="wilaya" class="form-control" placeholder="Wilaya" value = "'.$array["wilaya"].'">
            </div>
            <div class="form-group">
                <input type="text" name="commune" class="form-control" placeholder="Commune" value = "'.$array["commune"].'">
            </div>
            <div class="form-group">
                <input type="text" name="addresse" class="form-control" placeholder="Adresse" value = "'.$array["addresse"].'">
            </div>
            <div class="form-group">
                <input type="text" name="tel" class="form-control" placeholder="Téléphone" value = "'.$array["tel"].'">
            </div>
            <div class="form-group">
                <input type="text" name="fax" class="form-control" placeholder="Fax" value = "'.$array["fax"].'">
            </div>
            <div class="form-group">
                 <input id="ajoutEcole" type="submit" class="btn btn-primary" value="Sauvegarder">
            </div>
        </form>
        </div>
        </div>
        </body>';
}


}
?>