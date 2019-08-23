$(document).ready(function(){

       $('#formEcole2').on('submit', function (e) {
           e.preventDefault();
               $.ajax({
                   type: 'post',
                   url: '../Controller/EditEcole.php',
                   data:  $('#formEcole2').serialize(),
                   success: function(data, status){
                       d= data;
                       //document.location.href = "admin.php";
                       history.go(-1);

                   }
               });
   });
});