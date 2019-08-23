<?php


require '../Controller/gestionCommentaire.php';

class ViewCommentaire{

    public $id_ecole;
    public $nom_ecole;



       // constructor 
    public function __construct($id , $nom){
        $this->id_ecole = $id;
        $this->nom_ecole=$nom;
    }
public function header()
{
    echo '
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/comment.js"></script>
    <link href="css/comment.css" rel="stylesheet" type="text/css" />
    ';
}


public function lastComments()
{

    $gestion= new GestionCommentaire();
    $array= $gestion->readComments($this->id_ecole);
    echo '
    <div class="row">
    <div class="tab-content">
    <ul class="media-list">';
    if(($array!=null) && (count($array)>0))
    foreach ($array as $row => $cmt) {
        echo '
        <li class="media">
        <div class="media-body">
            <div class="well well-lg">
                <h4 class="media-heading text-uppercase reviews">'.$cmt["userName"].' </h4>
                <ul class="media-date text-uppercase reviews list-inline">
                <li class="dd">'.date("d",strtotime($cmt["date"])).'</li>
                <li class="mm">'.date("m",strtotime($cmt["date"])).'</li>
                <li class="aaaa">'.date("y",strtotime($cmt["date"])).'</li>
                </ul>
                <p class="media-comment">'.$cmt["text"].'
                </p>
            </div>  
        </div>
        </li>';
    }            
    echo '
    </ul>
    </div>
  </div>
    ';
}


public function title()
{
    echo '
	<div class="row">
		<h3>Commentaires de l\'école ' . $this->nom_ecole .'</h3>
	</div>';
}
public function setTextArea()
{
   echo '
    
    <div class="row">
    
    <div class="col-md-6">
    						<div class="widget-area no-padding blank">
								<div class="status-upload">
									<form id="formComment">
                                        <textarea name="textComment" placeholder="Vous voulez laisser un commentaire?" ></textarea>
                                        <input name="id_ecole" type="hidden" value="' . $this->id_ecole .'"> </input>
                                        <input name="userName" type="hidden" value="' . $_SESSION['userName'] .'"> </input>
										<button type="submit" class="btn btn-primary"><i class="fa fa-share"></i>Commenter</button>
									</form>
								</div><!-- Status Upload  -->
							</div><!-- Widget Area -->
						</div>
        
    </div>
    ';
}




public function signIn()
{

  echo '<div class="row" id="auth">
           <a href="signIn.php"><input id="SignIn" type="submit" class="btn btn-primary" value="S\'authentifier" ></a>
           <a href="signUp.php"><input id="signUp" type="submit" class="btn btn-primary" value="S\'inscrire"></a>
           </div>
           ';

}


}

?>
