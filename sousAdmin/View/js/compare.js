  function TriggerClick1(id_categorie) {
    $("#selector2").empty();
    $("#selector3").empty();
    $('#comment1').remove();
    $('#comment2').remove();
    $("#tbody1").empty();
    $("#tbody2").empty();
    $('')
    $.ajax({
        type: 'post',
        url: '../Controller/readEcoles.php',
        dataType: 'json',
        data:  {"id_categorie" : id_categorie },
        cache :false,
        success: function (data) {
          arr=data;
          for(var x=0 ; x < arr.length ; x++){
                      var id= parseInt (arr[x].id);
                      var nom = arr[x].nom;
                      var option1 = $ ("<option value='"+id+"'>"+nom+"</option>");
                      $("#selector2").append(option1);
                      var option2 = $ ("<option value='"+id+"'>"+nom+"</option>");
                      $("#selector3").append(option2);
                  }

        }
    });
  }


  function TriggerClick2(id_ecole) {
    var Name = $('#selector2').find(":selected").text();
    $("#ecole1").text(Name);
    $("#tbody1").empty();
    $('#comment1').remove();
    $.ajax({
        type: 'post',
        url: '../Controller/readFormations.php',
        dataType: 'json',
        data:  {"id_ecole" : id_ecole },
        cache :false,
        success: function (data) {
          arr=data;
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
                var tr = $("<tr></tr>").append(th , td1, td2, td3 , td4, td5);
                $("#tbody1").append(tr);
                      
              }

        }
    });


    $.ajax({
      type: 'post',
      url: '../Controller/readComments.php',
      dataType: 'json',
      data:  {"id_ecole" : id_ecole },
      cache :false,
      success: function (data) {
          d=data;
          var ul= $('<ul class="media-list"></ul>');
          var tab= $('<div class="tab-content"></div>');
          var h3 = $('<h3>Commentaire des utilisateurs </h3>');
          for(var x=0 ; x < d.length ; x++){
                var date= new Date(d[x].date);
                var comm= $('<li class="media"><div class="media-body"> <div class="well well-lg"><h4 class="media-heading text-uppercase reviews">'+d[x].userName+'</h4> <ul class="media-date text-uppercase reviews list-inline"><li class="dd">'+date.getDay()+'</li><li class="mm">'+date.getMonth()+'</li><li class="aaaa">'+date.getFullYear()+'</li></ul><p class="media-comment">'+d[x].text+'</p></div> </div></li>');
                ul.append(comm);
          }
          var row= $('<div class="row" id="comment1"></div>');
          tab.append(h3,ul);
          row.append(tab);
          $('#containerZone1').append(row);
        
      }

    });

}





function TriggerClick3(id_ecole) {
  var Name = $('#selector3').find(":selected").text();
  $("#ecole2").text(Name);
  $("#tbody2").empty();
  $('#comment2').remove();
  $.ajax({
      type: 'post',
      url: '../Controller/readFormations.php',
      dataType: 'json',
      data:  {"id_ecole" : id_ecole },
      cache :false,
      success: function (data) {
        arr=data;
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
              var tr = $("<tr></tr>").append(th , td1, td2, td3 , td4, td5);
              $("#tbody2").append(tr);
                    
            }

      }
  });


  $.ajax({
    type: 'post',
    url: '../Controller/readComments.php',
    dataType: 'json',
    data:  {"id_ecole" : id_ecole },
    cache :false,
    success: function (data) {
        d=data;
        var ul= $('<ul class="media-list"></ul>');
        var tab= $('<div class="tab-content"></div>');
        var h3 = $('<h3>Commentaire des utilisateurs </h3>');
        for(var x=0 ; x < d.length ; x++){
              var date= new Date(d[x].date);
              var comm= $('<li class="media"><div class="media-body"> <div class="well well-lg"><h4 class="media-heading text-uppercase reviews">'+d[x].text+'</h4> <ul class="media-date text-uppercase reviews list-inline"><li class="dd">'+date.getDay()+'</li><li class="mm">'+date.getMonth()+'</li><li class="aaaa">'+date.getFullYear()+'</li></ul><p class="media-comment">'+d[x].userName+'</p></div> </div></li>');
              ul.append(comm);
        }
        var row= $('<div class="row" id="comment2"></div>');
        tab.append(h3,ul);
        row.append(tab);
        $('#containerZone2').append(row);
      
    }

  });

}
