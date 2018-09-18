$(function() {
    obj_rm = new Rutademejora();
});
$("#slc_pa").change(function(){
              var texto="";
              $("#slc_pa option:selected").each(function() {
                texto += $(this).val() + ",";
               });
               paputilizadas = texto.split(",");
               var i = paputilizadas.indexOf("");
               paputilizadas.splice( i, 1 );
               // alert(texto);
               if( texto.indexOf("0,") > -1){
               document.getElementById('txt_rm_otropa').removeAttribute("hidden");
             }
             else{
                document.getElementById('txt_rm_otropa').setAttribute("hidden", true);
              }

            });
$("#slc_apoyoreq").change(function(){
              var texto="";
              $("#slc_apoyoreq option:selected").each(function() {
                texto += $(this).val() + ",";
               });
               paputilizadas = texto.split(",");
               var i = paputilizadas.indexOf("");
               paputilizadas.splice( i, 1 );
               // alert(texto);
               if( texto.indexOf("0,") > -1){
               document.getElementById('txt_rm_otroapoyreq').removeAttribute("hidden");
             }
             else{
                document.getElementById('txt_rm_otroapoyreq').setAttribute("hidden", true);
              }

            });



function Rutademejora(){
  _thisrm = this;
}
