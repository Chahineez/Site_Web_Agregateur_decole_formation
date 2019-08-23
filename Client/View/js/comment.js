$(document).ready(function(){

     //$("[data-toggle=tooltip]").tooltip();
        $('#formComment').on('submit', function (e) {
            e.preventDefault();
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    cache :false,
                    url: '../Controller/AjoutCommentaire.php',
                    data:  $('#formComment').serialize(),
                    success: function(data, status){
                        d=data;
                        alert('commentaire inséré');
                        var date= new Date(d[0].date);
                        var ul= $('.media-list');
                        var comm= $('<li class="media"><div class="media-body"> <div class="well well-lg"><h4 class="media-heading text-uppercase reviews">'+d[0].userName+'</h4> <ul class="media-date text-uppercase reviews list-inline"><li class="dd">'+date.getDay()+'</li><li class="mm">'+date.getMonth()+'</li><li class="aaaa">'+date.getFullYear()+'</li></ul><p class="media-comment">'+d[0].text+'</p></div> </div></li>');
                        ul.append(comm);

                      }

                });
    });
});