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



function Rutademejora(){
  _thisrm = this;
}
