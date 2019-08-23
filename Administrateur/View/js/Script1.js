function calculTTC ()
{

   var arrHT = document.getElementsByClassName("HT");
   var arrTTC = document.getElementsByClassName("TTC");
   var arrTaux = document.getElementsByClassName("taux");  
   for(var x=0 ; x< arrHT.length; x++)
   {
   	   var HT = parseInt(arrHT[x].innerHTML);
   	   var taux = parseInt(arrTaux[x].innerHTML);
   	   arrTTC[x].innerHTML =  HT + HT*taux /100 + " DA" ;
   }
}