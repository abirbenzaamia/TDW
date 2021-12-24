
$(document).ready(function(){


  let tab = []; 
  let tabs = $.ajax({url:"tabs.json",async:false});
   let arrs = $.parseJSON(tabs.responseText);
   $.each(arrs,function(key,value){
    tab.push(value);
});
  
   //remplir le tableau1
   $.each(tab[0],function(key,value){

     if(value['produtionTotal'] === undefined) 
     {   
      if(value['span'] === undefined){
        $(".tableau1 tbody").append("<tr><th>"+value['culture']+"</th><td>"+value['superficie']+"</td></tr>");}
        else{
          $(".tableau1 tbody").append("<tr><th>"+value['culture']+"</th><td "+value['span']+">"+value['superficie']+"</td></tr>");}
        }        
     else{
       if(value['span'] === undefined){
         console.log(value['produtionTotal']);
        $(".tableau1 tbody").append("<tr><th>"+value['culture']+"</th><td>"+value['superficie']+"</td><td>"+value['produtionTotal']+"</td></tr>");
       }
       else{
        console.log(value['produtionTotal']);
        $(".tableau1 tbody").append("<tr><th>"+value['culture']+"</th><td>"+value['superficie']+"</td><td "+value['span']+">"+value['produtionTotal']+"</td></tr>");
       }


     }
});
// $(".tableau1 tbody").append(tableau1);
//remplir le tableau2
$.each(tab[1],function(key,value){
  // console.log(value['espece']);
  // console.log(value['nbr']);
  if(value['nbr'] === undefined) {
      $(".tableau2 tbody").append("<tr><th>"+value['espece']+"</th></tr>");
    
  }else{
    if(value['span'] === undefined){
      $(".tableau2 tbody").append("<tr><th>"+value['espece']+"</th><td>"+value['nbr']+"</td></tr>");

    }else{
      $(".tableau2 tbody").append("<tr><th>"+value['espece']+"</th><td "+value['span']+">"+value['nbr']+"</td></tr>");

    }

  }

});

  //choisir le premier tableau
    $(".button1").click (function(){ 
       $(".form1").show();
      $(".form2").hide();

    });
    //choisir le deuxieme tableau
    $(".button2").click (function(){ 
      $(".form2").show();
      $(".form1").hide();
    });
    //ajouter une ligne dans tableau1
    $('.form1 button').click(function(){
    let culture = $("#culture").val();
    let superCul = $("#superCul").val();
    let prodTotal=$("#prodTotal").val();
    $(".tableau1 tbody").append("<tr></tr><th>"+culture+"</th><td>"+superCul+"</td><td>"+prodTotal+"</td></tr>");
    $(".tableau1 tfoot").remove();
    CalculSomme1();

    });
    //ajouter une ligne dans tableau2
    $('.form2 button').click(function(){
      let espece = $("#espece").val();
      let  nbr= $("#nbr").val();
      $(".tableau2 tbody").append("<tr></tr><th>"+espece+"</th><td>"+nbr+"</td></tr>");
      $(".tableau2 tfoot").remove();
      CalculSomme2();
      });
      //calcul la somme
      function CalculSomme1(){
        let sumCol1=0 ;
        let sumCol2=0 ;
        $(".tableau1 tbody tr").each(function(){
         let val1 =parseFloat($('td',this).eq(0).text());
         let val2 = parseFloat($('td',this).eq(1).text());
         if(!isNaN(val1)) sumCol1+=val1;
         if(!isNaN(val2)) sumCol2+=val2;
        });
        $(".tableau1").append("<tfoot><th>Somme totale</th><td>"+sumCol1+"</td><td>"+sumCol2+"</td></tfoot>");
 
       }
       function CalculSomme2(){
        let sumCol1=0 ;
        $(".tableau2 tbody tr").each(function(){
 
         let val1 =parseFloat($('td',this).eq(0).text());
         if(!isNaN(val1)) sumCol1+=val1;
         
         
        });
        $(".tableau2").append("<tfoot><th>Somme totale</th><<td>"+sumCol1+"</td></tfoot>");
 
       }
      CalculSomme1();
      CalculSomme2();
  }
);


    










