$(document).ready(function() {
$('#form2').on('submit', function (e) {
    e.preventDefault();
    val= $("#form2 input").eq(3).attr('value');
    if(val=='Submit')
    {
        $.ajax({
            type: 'post',
            url: '../Controller/AjoutFormation.php',
            data:  $('#form2').serialize(),
            success: function(data, status){
                 var ligne =JSON.parse(data);
        var id = parseInt(ligne[0].id);
        var type = ligne[0].type;
        var volume = parseInt (ligne[0].heure);
        var ht =  parseInt (ligne[0].ht);
        var taux = parseInt (ligne[0].taux);
        var formation = ligne[0].nom;
        var ttc =  ht + ht * taux / 100 ;
        var th = $ ("<th scope='row'>" + type +"</td>");
        var td1 = $ ("<td>" + formation +"</td>");
        var td2 = $ ("<td>" + volume +" H</td>");
        var td3 = $ ("<td>"+ ht +" DA</td>");
        var td4 = $ ("<td>"+ taux +"</td>");
        var td5 = $ ("<td>"+ ttc+" DA</td>");
        var supp = $("<td><input class='supp' id='"+id+"' type='button' value='supprimer'></td>");
        var modif = $("<td><input class='modif' id='"+id+"' type='button' value='modifier'></td>");
        var tr = $("<tr></tr>").append(th , td1, td2, td3 , td4,td5, supp, modif);
        $("tbody").append(tr);
            }
          });
    }
    else
    {
        var id= parseInt($("#form2 input").eq(2).val());
        $.ajax({
            type: 'post',
            url: '../Controller/ChangeFormation.php',
            data:  $('#form2').serialize(),
            success: function(data, status){
                alert('Formation '+data+' modifiée');
            }
        });

        var arr =$("#form2 input");
        arr.eq(0).val("");
        arr.eq(1).val("");
        arr.eq(1).attr('type', 'text');
        arr.eq(3).attr('value',"Submit");
        var arr =$("#form1 input");
        arr.eq(0).val("");
        arr.eq(1).val("");
        arr.eq(2).val("");
        arr.eq(3).val("");
        arr.eq(4).val("");
        arr.eq(4).attr('type', 'text');
        arr.eq(6).attr('value',"Submit");   
    }


});
});

