
function fetchdata(){
    $.ajax({
  type: 'post',
  url: '../Controller/readFormations.php',
  dataType: 'json',
  cache :false,
  success: function (arr) {
    $('tbody').empty();
    for(var x=0 ; x < arr.length ; x++){
                var id= parseInt (arr[x].id);
                var ht = parseInt (arr[x].ht);
                var taux = parseInt (arr[x].taux);
                var heure = arr[x].heure;
                var nom = arr[x].nom;
                var type = arr[x].type;
                var ttc =  ht + ht * taux / 100 ;
                var th = $ ("<th scope='row'>" + type +"</th>");
                var td1 = $ ("<td>" + nom +"</td>");
                var td2 = $ ("<td>" + heure +" H</td>");
                var td3 = $ ("<td>"+ ht +" DA</td>");
                var td4 = $ ("<td>"+ taux +"</td>");
                var td5 = $ ("<td>"+ ttc+" DA</td>");
                //var tr = $("<tr><th scope='row'>"+ formation +"</th><td> " + volume + " H</td><td>" + ht + " DA </td><td>"+ taux+"</td><td>" + ttc + " DA</td></tr>");
                var tr = $("<tr></tr>").append(th , td1, td2, td3 , td4, td5);
                $("tbody").append(tr);
            }
  }
  });
            
        
}


$(document).ready(function(){
 setInterval(fetchdata,5000);
});