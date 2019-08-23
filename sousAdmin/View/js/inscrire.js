$(document).ready(function() {
	$('#signUp').click(function(e) {
	   e.preventDefault();
	   $.ajax({
            type: 'post',
            url: '../Controller/gestionInscription.php',
            data:  $('#formSignUp').serialize(),
            success: function(data, status){
				id=data;
			    alert("Inscription réussie : vous êtes désormais membre");
			}
          });
	});
    
});
