$(document).ready(function() {
    $(".supp").on("click", function() {
    var idType = this.id; 
    $.post("../Controller/removeFormation.php",
    {
        id: idType
    },
    function(data, status){
        $("#"+idType+"").parent().parent().empty();
        
    });
   
});
    });
        

        

