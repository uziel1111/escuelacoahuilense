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


            $("#nav-avances-tab").click(function(){

              $("#nav-avances").empty();
              $.ajax({
              url: base_url+'rutademejora/get_avance',
              type: 'POST',
              dataType: 'JSON',
              data: {'x':'x'},
              beforeSend: function(xhr) {
                    Notification.loading("");
                },
            })
            .done(function(result) {
              swal.close();
              // console.log(result.srt_html);
              $("#nav-avances").html(result.srt_html);


            })
            .fail(function(e) {
              console.error("Error in get avance()"); console.table(e);
            })
            .always(function() {
                  // swal.close();
            })

            });

$("#btn_get_reporte").click(function(){
    obj_rm.get_reporte(obj.id_tprioritario);
});


function Rutademejora(){
  _thisrm = this;
}

Rutademejora.prototype.get_reporte = function(id_tprioritario){
  $.ajax({
     url:base_url+"reporte/get_reporte",
     method:"POST",
     data:{"id_tprioritario":id_tprioritario},
     success:function(data){
      var pathname = window.location;
      alert(pathname);
     },
     error: function(error){
       console.log(error);
     }
 });
}
