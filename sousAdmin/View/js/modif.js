$(document).ready(function() {
    $(".modif").on("click", function() {
    var idform = this.id; 
    var type=$("tbody #"+idform+"").parent().parent().children().eq(0).text();
    var formation=$("tbody #"+idform+"").parent().parent().children().eq(1).text();
    var heure=$("#"+idform+"").parent().parent().children().eq(2).text();
    var ht=$("#"+idform+"").parent().parent().children().eq(3).text();
    var taux=$("#"+idform+"").parent().parent().children().eq(4).text();
    var id=$("tbody #"+idform+"").parent().parent().children().eq(6).children().eq(0).attr("id");
    var arr =$("#form2 input");
    arr.eq(0).val(formation);
    arr.eq(1).attr('type', 'hidden');
    arr.eq(2).val(parseInt(id));
    arr.eq(3).attr('value',"modifier");
    var arr =$("#form1 input");
    arr.eq(0).val(type);
    arr.eq(1).val(parseInt(heure));
    arr.eq(2).val(parseInt(ht));
    arr.eq(3).val(parseInt(taux));
    arr.eq(4).attr('type', 'hidden');
    arr.eq(5).val(parseInt(id));
    arr.eq(7).attr('value',"modifier");

  });

    
});
    
