$(document).ready(function() {
    $('#form1').on('submit', function (e) {
        var id;
        e.preventDefault();
        val= $("#form1 input").eq(7).attr('value');
        if(val=='Submit')
        {
        $.ajax({
            type: 'post',
            url: '../Controller/AjoutTypeFormation.php',
            data:  $('#form1').serialize(),
            success: function(data, status){
                id=data;
            }
          });
        var arr =$("#form1 input");
        var type = arr.eq(0).val();
        var volume = arr.eq(1).val();
        var ht =  parseInt(arr.eq(2).val());
        var taux = parseInt(arr.eq(3).val());
        var formation = arr.eq(4).val();
        var ttc =  ht + ht * taux / 100 ;
        var th = $ ("<th scope='row'>" + type +"</td>");
        var td1 = $ ("<td>" + formation +"</td>");
        var td2 = $ ("<td>" + volume +" H</td>");
        var td3 = $ ("<td>"+ ht +" DA</td>");
        var td4 = $ ("<td>"+ taux +"</td>");
        var td5 = $ ("<td>"+ ttc+" DA</td>");
        var supp = $("<td><input class='supp' id='"+id+"' type='button' value='supprimer'></td>");
        var modif = $("<td><input class='modif' id='"+id+"' type='button' value='modifier'></td>");
        var tr = $("<tr></tr>").append(th , td1, td2, td3 , td4,td5, supp , modif);
        $("tbody").append(tr);
    }
    else
    {
        $.ajax({
            type: 'post',
            url: '../Controller/ChangeTypeFormation.php',
            data:  $('#form1').serialize(),
            success: function(data, status){
                alert('Type '+ data+ ' modifié');
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
        

