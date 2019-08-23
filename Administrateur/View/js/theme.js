$(document).ready(function() {
    $('#form3').on('submit', function (e) {
       e.preventDefault();
        $.ajax({
            type: 'post',
            url: '../Controller/AjoutTheme.php',
            data:  $('#form3').serialize(),
            success: function(data, status){
                alert(data);
            }
          });
   }); 
});
    
