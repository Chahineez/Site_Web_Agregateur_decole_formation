$(function calculTTc(){
	var arr = $("tr");
	for(x=1 ; x <  arr.length ; x++)
	{
		ht =parseInt (arr.eq(x).children().eq(3).text());
		taux = parseInt(arr.eq(x).children().eq(4).text());
		ttc = ht +ht*taux/100;
		arr.eq(x).children().eq(5).text(ttc + " DA");
	}
     
}); 
  

