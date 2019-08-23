$(document).ready(function(){

    $('#formEcole1').on('submit', function (e) {
        e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../Controller/AddEcole.php',
                data:  $('#formEcole1').serialize(),
                success: function(data, status){
                    d= data;
                    //document.location.href = "admin.php";
                    history.go(-1);

                }
            });
});
});