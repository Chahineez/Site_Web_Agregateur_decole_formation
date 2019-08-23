$(document).ready(function() {
	$('#signIn').click(function(e) {
	   e.preventDefault();
	   $.ajax({
            type: 'post',
            url: '../Controller/gestionConnection.php',
            data:  $('#formSignIn').serialize(),
            success: function(data, status){
				id=data;
                if(id!="")
                {
					alert("Vous êtes connecté");
    				document.location.href = "admin.php";
				}
				else
				{
					alert("mail ou mot de passe éronné");
				}
			}
          });
	});
    
});
