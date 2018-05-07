/** Funciones para cargar municipios y ciclos escolares. **/

$(function() {

      $("#LE_busqueda_tipo_2").hide();
      $("#LE_busqueda_tipo_1").hide();
      $("#lb_ciclo_ze").hide();
      $("#div_nivel").hide();
      $("#div_sostenimiento").hide();
      $("#div_modalidad").hide();
      $("#div_ciclo").hide();

      $("#div_sostenimiento_ze").hide();

      $("#div_num_zona_ze").hide();
      $("#div_clv_zona_ze").hide();
      $("#lb_ciclo_ze").hide();
      document.title = 'Estadística e Indicadores';
      swal.close();
      obj_message = new Message();
      obj_estadistica = new EsteIndGen();
      $("#le_modal").modal("show");
      // obj_estadistica.getMunicipios();
      // obj_estadistica.getNivelesMunicipio_ze();
      $("#le_select_idmunicipio_ei").change(function(){
             var municipioid =  $("#le_select_idmunicipio_ei").val();
             $('#div_nivel').css("display","");
             // obj_estadistica.getNivelesMunicipio(municipioid);
       });
       $("#le_select_nivel_ei").change(function(){
            var municipioid =  $("#le_select_idmunicipio_ei").val();
             var nivelid =  $("#le_select_nivel_ei").val();
             if (nivelid=='TODOS') {
               var municipioid =  $("#le_select_idmunicipio_ei").val();
               var nivelid =  'TODOS';
               var sostenimientoid =  'TODOS';
               var modalidadid =  'TODOS';
               $('#div_ciclo').css("display","");
               // obj_estadistica.getCiclo(municipioid, nivelid, sostenimientoid, modalidadid);
             }
             else {
               $('#div_sostenimiento').css("display","");
               // obj_estadistica.getSostenimiento(municipioid, nivelid);
             }

       });

       $("#le_select_nivel_ze").change(function(){

         $("#div_sostenimiento_ze").hide();
         $("#div_num_zona_ze").hide();
         $("#div_clv_zona_ze").hide();
         $("#lb_ciclo_ze").hide();
             var nivelid =  $("#le_select_nivel_ze").val();
               $('#div_sostenimiento_ze').css("display","");
               // obj_estadistica.getSostenimiento_ze(nivelid);


       });

       $("#le_select_sostenimiento_ze").change(function(){

              var nivelid =  $("#le_select_nivel_ze").val();
              var sostenimientoid =  $("#le_select_sostenimiento_ze").val();

                $('#div_num_zona_ze').css("display","");
                obj_estadistica.getze(nivelid, sostenimientoid);


        });

        $("#le_select_num_zona_ze").change(function(){

               var nivelid =  $("#le_select_nivel_ze").val();
               var sostenimientoid =  $("#le_select_sostenimiento_ze").val();
               var num_ze =  $("#le_select_num_zona_ze").val();

                 $('#div_clv_zona_ze').css("display","");
                 obj_estadistica.getclave_ze(nivelid, sostenimientoid, num_ze);


         });

         $("#le_select_clv_zona_ze").change(function(){

                var nivelid =  $("#le_select_nivel_ze").val();
                var sostenimientoid =  $("#le_select_sostenimiento_ze").val();
                var num_ze =  $("#le_select_num_zona_ze").val();
                var cct_ze =  $("#le_select_clv_zona_ze").val();

                  $('#lb_ciclo_ze').css("display","");
                  obj_estadistica.getcilco_ze(nivelid, sostenimientoid, num_ze, cct_ze);


          });

      $("#le_select_sostenimiento_ei").change(function(){
             var municipioid =  $("#le_select_idmunicipio_ei").val();
             var nivelid =  $("#le_select_nivel_ei").val();
             var sostenimientoid =  $("#le_select_sostenimiento_ei").val();
             if (sostenimientoid=='TODOS') {
               var municipioid =  $("#le_select_idmunicipio_ei").val();
               var nivelid =  'TODOS';
               var sostenimientoid =  'TODOS';
               var modalidadid =  'TODOS';
               $('#div_ciclo').css("display","");
               obj_estadistica.getCiclo(municipioid, nivelid, sostenimientoid, modalidadid);
             }
             else {
               $('#div_modalidad').css("display","");
               obj_estadistica.getModalidad(municipioid, nivelid, sostenimientoid);
             }

       });
       $("#le_select_modalidad_ei").change(function(){
             var municipioid =  $("#le_select_idmunicipio_ei").val();
             var nivelid =  $("#le_select_nivel_ei").val();
             var sostenimientoid =  $("#le_select_sostenimiento_ei").val();
             var modalidadid =  $("#le_select_modalidad_ei").val();
             $('#div_ciclo').css("display","");
             obj_estadistica.getCiclo(municipioid, nivelid, sostenimientoid, modalidadid);
       });

       $("#ciclo").change(function(){
             var municipioid =  $("#le_select_idmunicipio_ei").val();
             var municipionomb =$("#le_select_idmunicipio_ei option:selected").text();
             var nivelid =  $("#le_select_nivel_ei").val();
             var nivelnomb =  $("#le_select_nivel_ei option:selected").text()
             var sostenimientonomb =  $("#le_select_sostenimiento_ei").val();
             var modalidadnomb =  $("#le_select_modalidad_ei").val();
             var ciclonomb =  $("#ciclo").val();
             $('#btn_gen_excel').css("display","");
             $('#contenedor_tablas').css("display","");
             obj_estadistica.gettablas1(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb);
             obj_estadistica.gettablas2(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb);
             obj_estadistica.gettablas3(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb);
             obj_estadistica.gettablas4(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb);
             obj_estadistica.gettablas5(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb);
             obj_estadistica.gettablas6(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb);
             obj_estadistica.gettablas7(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb);
             obj_estadistica.gettablas8(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb);

       });

       $("#cobertura_clk_modal").click(function(e){
         e.preventDefault();
         $("#modal_din_cobertura").modal("show");
       });
       $("#absorcion_clk_modal").click(function(e){
         e.preventDefault();
         $("#modal_din_absorcion").modal("show");
       });
       $("#posicion_clk_modal").click(function(e){
         e.preventDefault();
         $("#modal_din_posicion").modal("show");
       });
       $("#posicion_clk_modal2").click(function(e){
         e.preventDefault();
         $("#modal_din_posicion").modal("show");
       });
       $("#retencion_id").click(function(e){
         e.preventDefault();
         $("#modal_din_retencion").modal("show");
       });
       $("#aprobacion_id").click(function(e){
         e.preventDefault();
         $("#modal_din_aprobacion").modal("show");
       });
       $("#et_id").click(function(e){
         e.preventDefault();
         $("#modal_din_et").modal("show");
       });








       $("#close_destin").click(function(e){
         e.preventDefault();
         window.location=base_url;
       });








});

$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  var position=600;
  if (scroll > position) {
    $("#btn_topscll").css("visibility","visible");
  } else {
    $("#btn_topscll").css("visibility","hidden");
  }

  var position2=150;
  if (scroll > position2) {
    if (screen.width<600){
      $("#iddv_flotante_new").css("position","fixed");
      $("#iddv_flotante_new").css("margin-top","-35vh");
      $("#iddv_flotante_new").css("margin-left","-2vh");
    }
    else {
      $("#iddv_flotante_new").css("position","fixed");
      $("#iddv_flotante_new").css("margin-top","-19vh");
      $("#iddv_flotante_new").css("margin-left","-2vh");
    }


  } else {
    if (screen.width<600) {
      $("#iddv_flotante_new").css("position","absolute");
      $("#iddv_flotante_new").css("margin-top","-9vh");
    }
    else {
      $("#iddv_flotante_new").css("position","absolute");
      $("#iddv_flotante_new").css("margin-top","0vh");
    }



  }

});



$("#ciclo_ze").change(function(){
      //var cct =  $("#le_text_CCT").val();
      var nivelid =  $("#le_select_nivel_ze").val();
      var sostenimientoid =  $("#le_select_sostenimiento_ze").val();
      var num_ze =  $("#le_select_num_zona_ze").val();
      var cct_ze =  $("#le_select_clv_zona_ze").val();

      $('#btn_gen_excel').css("display","none");

      $("#LE_title_est_ind").text("Estadística e indicadores por zona escolar");
      obj_estadistica.gettablas1_ze(nivelid, sostenimientoid, num_ze, cct_ze);
      obj_estadistica.gettablas2_ze(nivelid, sostenimientoid, num_ze, cct_ze);
      obj_estadistica.gettablas3_ze(nivelid, sostenimientoid, num_ze, cct_ze);

      $('#tb_ind_asis').css("visibility","hidden");
      $('#tb_ind_perma').css("visibility","hidden");

});


$("#le_btn_rebuscar").click(function(e){

      clearModal();
      swal.close();
      $("#le_modal").modal("show");

});

function clearModal(){

            $("#le_select_idmunicipio_ei").prop({"disabled":false, "value":""});
            $('#le_select_nivel_ei').prop({"disabled":false, "value":""});
            $('#le_select_sostenimiento_ei').prop({"disabled":false, "value":""});
            $('#le_select_modalidad_ei').prop({"disabled":false, "value":""});
            $('#ciclo').prop({"disabled":false, "value":""});



            //$('#ciclo_ze').prop({"disabled":true, "value":""});
            //$('#le_text_CCT').prop({"disabled":false, "value":""});
            //$('#ciclo_ze').css("display","none");
            //$('#lb_ciclo_ze').css("display","none");

            $("#lb_ciclo_ze").hide();

            $("#div_nivel").hide();
            $("#div_sostenimiento").hide();
            $("#div_modalidad").hide();
            $("#div_ciclo").hide();

            $("#le_select_nivel_ze").prop({"disabled":false, "value":""});

            $("#div_sostenimiento_ze").hide();
            $("#div_num_zona_ze").hide();
            $("#div_clv_zona_ze").hide();
            $("#lb_ciclo_ze").hide();




            $("#modamuni").css({"text-decoration":"none", "text-decoration-color":"black"});
            $("#sostmuni").css({"text-decoration":"none", "text-decoration-color":"black"});



      }

$('#LA_tipo_busqueda input[type=radio]').change(function(){
      switch($(this).val()) {
            case 'LE_busqueda_tipo_1' :
                $("#LE_busqueda_tipo_1").show();
                $("#LE_busqueda_tipo_2").hide();

            break;
            case 'LE_busqueda_tipo_2' :
                $("#LE_busqueda_tipo_1").hide();
                $("#LE_busqueda_tipo_2").show();

            break;
      }//  switch
  });

  $("#close_destin").click(function(e){
  e.preventDefault();
  window.location="index.php";
});
$("#le_modal_btncancelar_2").click(function(e){
  e.preventDefault();
  window.location="index.php";
});


$("document").ready(function(){


      $('tr.hide-ini').hide();







      $("#ciclo_ze").change(function(){

            $("#le_modal").modal('hide');
            $("#excel").css("display","");

            //var cct =  "21"+$("#le_text_CCT").val();
            var ciclonomb =  $("#ciclo_ze").val();

            var nivelid =  $("#le_select_nivel_ze").val();
            var nivelnomb =$("#le_select_nivel_ze option:selected").text();
            var sostenimientoid =  $("#le_select_sostenimiento_ze").val();
            var num_ze =  $("#le_select_num_zona_ze").val();
            var cct_ze =  $("#le_select_clv_zona_ze").val();


            $("#LE_resultados_busqueda").text(
                  "Nivel: "+nivelnomb+
                  ",  Sostenimeinto: "+sostenimientoid+
                ",  Número de zonas escolar: "+num_ze+
              ",  clave de la zona escoalr: "+cct_ze+
            ",  ciclo escolar: "+ciclonomb);

            $("#LE_cicloestadis").text(" "+ciclonomb.substring(0, 9)+".");
            $(".hide-ini").css("display","none");

            var municipioid =  '0';
            var municipionomb = 'TODOS';
            var nivelid =  '0';
            var nivelnomb =  'TODOS';
            var sostenimientonomb =  'TODOS';
            var modalidadnomb =  'TODOS';
            var ciclonomb =  $("#ciclo_ze").val();



      });





      $("#ciclo").change(function(){

            $("#le_modal").modal('hide');
            $("#excel").css("display","");

            var municipioid =  $("#le_select_idmunicipio_ei").val();
            var municipionomb =$("#le_select_idmunicipio_ei option:selected").text();
            var nivelid =  $("#le_select_nivel_ei").val();
            var nivelnomb =  $("#le_select_nivel_ei option:selected").text();
            var sostenimientonomb =  $("#le_select_sostenimiento_ei").val();
            var sostenimientonombre =  $("#le_select_sostenimiento_ei option:selected").text();
            var modalidadnomb =  $("#le_select_modalidad_ei").val();
            var modalidadnombre =  $("#le_select_modalidad_ei option:selected").text();
            var ciclonomb =  $("#ciclo").val();


            $("#in_est_muni").val(municipionomb);
            $("#in_est_muniN").val(municipioid);
            $("#in_nivel").val(nivelnomb);
            $("#in_sost").val(sostenimientonomb);
            $("#in_modalidad").val(modalidadnomb);
            $("#in_ciclo").val(ciclonomb);

            $("#LE_title_est_ind").text("Estadística e indicadores por estado / municipio");

            $("#LE_resultados_busqueda").text(
                  "Estado/municipio: "+municipionomb+
                  ",  Nivel: "+nivelnomb+
                  ",  Sostenimiento: "+sostenimientonombre+
                  ",  Modalidad: "+modalidadnombre+
                  ",  Ciclo Escolar: "+ciclonomb);

            $("#LE_cicloestadis").text(" "+ciclonomb.substring(0, 9)+".");
            $('#tb_ind_asis').css("visibility","visible");
            $('#tb_ind_perma').css("visibility","visible");

            switch(nivelnomb){
                  case "TODOS":
                                    /*Indicadores*/
                                    $("#prees").css("display","");
                                    $("#prim").css("display","");
                                    $("#secu").css("display","");
                                    $("#bachi").css("display","");
                                    $("#supe").css("display","");

                                    $("#prim_perma").css("display","");
                                    $("#secu_perma").css("display","");
                                    $("#bachi_perma").css("display","");

                                    $("#planea_indicador").css("display","");
                                    $("#planea_indicadorprim").css("display","");
                                    $("#planea_indicadorsec").css("display","");

                                    $("#tres").css("display","");
                                    $("#seis").css("display","");
                                    $("#doce").css("display","");
                                    $("#quince").css("display","");
                                    $("#dieciocho").css("display","");

                                    break;
                  case "ESPECIAL":

                                    /*Indicadores*/
                                    $("#prees").css("display","none");
                                    $("#prim").css("display","none");
                                    $("#secu").css("display","none");
                                    $("#bachi").css("display","none");
                                    $("#supe").css("display","none");

                                    $("#prim_perma").css("display","none");
                                    $("#secu_perma").css("display","none");
                                    $("#bachi_perma").css("display","none");

                                    $("#planea_indicador").css("display","none");
                                    $("#planea_indicadorprim").css("display","none");
                                    $("#planea_indicadorsec").css("display","none");

                                    $("#tres").css("display","none");
                                    $("#seis").css("display","none");
                                    $("#doce").css("display","none");
                                    $("#quince").css("display","none");
                                    $("#dieciocho").css("display","none");

                                    break;
                  case "INICIAL":
                                    /*Indicadores*/
                                    $("#prees").css("display","none");
                                    $("#prim").css("display","none");
                                    $("#secu").css("display","none");
                                    $("#bachi").css("display","none");
                                    $("#supe").css("display","none");

                                    $("#prim_perma").css("display","none");
                                    $("#secu_perma").css("display","none");
                                    $("#bachi_perma").css("display","none");

                                    $("#planea_indicador").css("display","none");
                                    $("#planea_indicadorprim").css("display","none");
                                    $("#planea_indicadorsec").css("display","none");

                                    $("#tres").css("display","none");
                                    $("#seis").css("display","none");
                                    $("#doce").css("display","none");
                                    $("#quince").css("display","none");
                                    $("#dieciocho").css("display","none");

                                    break;
                  case "PREESCOLAR":
                                    /*Indicadores*/
                                    $("#prees").css("display","");
                                    $("#prim").css("display","none");
                                    $("#secu").css("display","none");
                                    $("#bachi").css("display","none");
                                    $("#supe").css("display","none");

                                    $("#prim_perma").css("display","none");
                                    $("#secu_perma").css("display","none");
                                    $("#bachi_perma").css("display","none");

                                    $("#planea_indicador").css("display","none");
                                    $("#planea_indicadorprim").css("display","none");
                                    $("#planea_indicadorsec").css("display","none");

                                    $("#tres").css("display","");
                                    $("#seis").css("display","none");
                                    $("#doce").css("display","none");
                                    $("#quince").css("display","none");
                                    $("#dieciocho").css("display","none");

                                    break;
                  case "PRIMARIA":
                                    /*Indicadores*/
                                    $("#prees").css("display","none");
                                    $("#prim").css("display","");
                                    $("#secu").css("display","none");
                                    $("#bachi").css("display","none");
                                    $("#supe").css("display","none");

                                    $("#prim_perma").css("display","");
                                    $("#secu_perma").css("display","none");
                                    $("#bachi_perma").css("display","none");

                                    $("#planea_indicador").css("display","none");
                                    $("#planea_indicadorprim").css("display","");
                                    $("#planea_indicadorsec").css("display","none");

                                    $("#tres").css("display","none");
                                    $("#seis").css("display","");
                                    $("#doce").css("display","none");
                                    $("#quince").css("display","none");
                                    $("#dieciocho").css("display","none");

                                    break;
                  case "SECUNDARIA":
                                    /*Indicadores*/
                                    $("#prees").css("display","none");
                                    $("#prim").css("display","none");
                                    $("#secu").css("display","");
                                    $("#bachi").css("display","none");
                                    $("#supe").css("display","none");

                                    $("#prim_perma").css("display","none");
                                    $("#secu_perma").css("display","");
                                    $("#bachi_perma").css("display","none");

                                    $("#planea_indicador").css("display","none");
                                    $("#planea_indicadorprim").css("display","none");
                                    $("#planea_indicadorsec").css("display","");

                                    $("#tres").css("display","none");
                                    $("#seis").css("display","none");
                                    $("#doce").css("display","");
                                    $("#quince").css("display","none");
                                    $("#dieciocho").css("display","none");

                                    break;
                  case "MEDIA SUPERIOR":
                                    /*Indicadores*/
                                    $("#prees").css("display","none");
                                    $("#prim").css("display","none");
                                    $("#secu").css("display","none");
                                    $("#bachi").css("display","");
                                    $("#supe").css("display","none");

                                    $("#prim_perma").css("display","none");
                                    $("#secu_perma").css("display","none");
                                    $("#bachi_perma").css("display","");

                                    $("#planea_indicador").css("display","");

                                    $("#planea_indicadorprim").css("display","none");
                                    $("#planea_indicadorsec").css("display","none");

                                    $("#tres").css("display","none");
                                    $("#seis").css("display","none");
                                    $("#doce").css("display","none");
                                    $("#quince").css("display","");
                                    $("#dieciocho").css("display","none");

                                    break;
                  case "SUPERIOR":
                                    /*Indicadores*/
                                    $("#prees").css("display","none");
                                    $("#prim").css("display","none");
                                    $("#secu").css("display","none");
                                    $("#bachi").css("display","none");
                                    $("#supe").css("display","");

                                    $("#prim_perma").css("display","none");
                                    $("#secu_perma").css("display","none");
                                    $("#bachi_perma").css("display","none");

                                    $("#planea_indicador").css("display","none");
                                    $("#planea_indicadorprim").css("display","none");
                                    $("#planea_indicadorsec").css("display","none");

                                    $("#tres").css("display","none");
                                    $("#seis").css("display","none");
                                    $("#doce").css("display","none");
                                    $("#quince").css("display","none");
                                    $("#dieciocho").css("display","");
            }
            $(".hide-ini").css("display","none");
      });



      function loadjscssfile(filename, filetype){
          if (filetype=="js"){ //if filename is a external JavaScript file
              var fileref=document.createElement('script')
              fileref.setAttribute("type","text/javascript")
              fileref.setAttribute("src", filename)
          }
          else if (filetype=="css"){ //if filename is an external CSS file
              var fileref=document.createElement("link")
              fileref.setAttribute("rel", "stylesheet")
              fileref.setAttribute("type", "text/css")
              fileref.setAttribute("href", filename)
          }
          if (typeof fileref!="undefined")
              document.getElementsByTagName("head")[0].appendChild(fileref)
      }




});


function EsteIndGen(){
    tmp_EL = this;

    tmp_EL.id_EstMunicipioGlobal     = 0;
    tmp_EL.id_nivelGlobal         = 0;
    tmp_EL.id_sostenimientoGlobal = 0;
    tmp_EL.id_modalidadGlobal = 0;
    tmp_EL.id_modalidadGlobal = 0;
    tmp_EL.id_cicloescGlobal = 0;

    this.getMunicipios = function(){
          var ruta = base_url+"Estadistica/get_all_municipio_ei";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'action':'municipio'},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
            var html =data;
            $("#le_select_idmunicipio_ei").empty();
            $("#le_select_idmunicipio_ei").append(html.result);
            swal.close();
          })
          .fail(function(e) {
            console.error("Error in getMunicipios()"); console.table(e);
          });
    }// getMunicipios()

    this.getNivelesMunicipio = function(id_municipio){
          var ruta = base_url+"Estadistica/getNiveles_ei";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'action':'nivel', 'id_municipio':id_municipio},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
            var html =data;
            $("#le_select_nivel_ei").empty();
            $("#le_select_nivel_ei").append(html.result);
            swal.close();
          })
          .fail(function(e) {
            console.error("Error in getNivelesMunicipio()"); console.table(e);
          });
    }// getNivelesMunicipio()

    this.getNivelesMunicipio_ze = function(){
          var ruta = base_url+"Estadistica/getNiveles_ze";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'action':'nivel'},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
            var html =data;
            $("#le_select_nivel_ze").empty();
            $("#le_select_nivel_ze").append(html.result);
            swal.close();
          })
          .fail(function(e) {
            console.error("Error in getNivelesMunicipio_ze()"); console.table(e);
          });
    }// getNivelesMunicipio_ze()

    this.getze = function(nivelid, sostenimientoid){
          var ruta = base_url+"Estadistica/getze";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'action':'ze', 'nivelid':nivelid, 'sostenimientoid':sostenimientoid},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
            var html =data;
            $("#le_select_num_zona_ze").empty();
            $("#le_select_num_zona_ze").append(html.result);
            swal.close();
          })
          .fail(function(e) {
            console.error("Error in getze()"); console.table(e);
          });
    }// getze()

    this.getclave_ze = function(nivelid, sostenimientoid, num_ze){
          var ruta = base_url+"Estadistica/getclave_ze";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'action':'ze', 'nivelid':nivelid, 'sostenimientoid':sostenimientoid, 'num_ze':num_ze},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
            var html =data;
            console.log(html.status[0]['cct_zona_escolar']);
            //console.log(html.status.length);
            $("#le_select_clv_zona_ze").empty();
            $("#le_select_clv_zona_ze").append(html.result);
            if (html.status.length==1) {
              $('#div_clv_zona_ze').css("display","none");
              var cct_zeaux = html.status[0]['cct_zona_escolar'];

              var nivelid =  $("#le_select_nivel_ze").val();
              var sostenimientoid =  $("#le_select_sostenimiento_ze").val();
              var num_ze =  $("#le_select_num_zona_ze").val();
              var cct_ze =  $("#le_select_clv_zona_ze").val(cct_zeaux);

                $('#lb_ciclo_ze').css("display","");
                obj_estadistica.getcilco_ze(nivelid, sostenimientoid, num_ze, cct_zeaux);
            }

            swal.close();
          })
          .fail(function(e) {
            console.error("Error in getclave_ze()"); console.table(e);
          });
    }// getclave_ze()



    this.getSostenimiento = function(id_municipio, id_nivel){
            var ruta = base_url+"Estadistica/get_xmunicipio_xnivel_ei";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'sostenimiento','id_municipio':id_municipio, 'id_nivel':id_nivel},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#le_select_sostenimiento_ei").empty();
              $("#le_select_sostenimiento_ei").append(html.result); // añadimos a la tabla
              swal.close();
              $("#le_modal").modal("show");
            })
            .fail(function(e) {
              console.error("Error in getNiveles()"); console.table(e);
            });
    }// getSostenimiento()

    this.getSostenimiento_ze = function(id_nivel){
            var ruta = base_url+"Estadistica/get_sostenimeinto_ze";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'id_nivel':id_nivel},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#le_select_sostenimiento_ze").empty();
              $("#le_select_sostenimiento_ze").append(html.result); // añadimos a la tabla
              swal.close();
              $("#le_modal").modal("show");
            })
            .fail(function(e) {
              console.error("Error in getSostenimiento_ze()"); console.table(e);
            });
    }// getSostenimiento_ze()

    this.getModalidad = function(id_municipio, id_nivel, id_sostenimiento){
            var ruta = base_url+"Estadistica/get_xmunicipio_xnivel_xsostenimiento";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'modalidad','id_municipio':id_municipio, 'id_nivel':id_nivel, 'id_sostenimiento':id_sostenimiento},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#le_select_modalidad_ei").empty();
              $("#le_select_modalidad_ei").append(html.result); // añadimos a la tabla
              swal.close();
              $("#le_modal").modal("show");
            })
            .fail(function(e) {
              console.error("Error in getNiveles()"); console.table(e);
            });
    }// getModalidad()

    this.getCiclo = function(id_municipio, id_nivel, id_sostenimiento, id_modalidad){
            var ruta = base_url+"Estadistica/get_xmunicipio_xnivel_xsostenimiento_xmodalidad";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'ciclo','id_municipio':id_municipio, 'id_nivel':id_nivel, 'id_sostenimiento':id_sostenimiento, 'id_modalidad':id_modalidad},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#ciclo").empty();
              $("#ciclo").append(html.result); // añadimos a la tabla
              swal.close();
              $("#le_modal").modal("show");
            })
            .fail(function(e) {
              console.error("Error in getNiveles()"); console.table(e);
            });
    }// getCiclo()
    this.getcilco_ze = function(nivelid, sostenimientoid, num_ze, cct_ze){
            var ruta = base_url+"Estadistica/getciclo_ze";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'nivelid':nivelid,'sostenimientoid':sostenimientoid, 'num_ze':num_ze, 'cct_ze':cct_ze},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#ciclo_ze").empty();
              $("#ciclo_ze").append(html.result); // añadimos a la tabla
              swal.close();
              $("#le_modal").modal("show");
            })
            .fail(function(e) {
              console.error("Error in getNiveles()"); console.table(e);
            });
    }// getcilco_ze()

    this.gettablas1 = function(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb){
            var ruta = base_url+"Estadistica/get_llenado_tablas1";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'tablas','municipioid':municipioid, 'municipionomb':municipionomb, 'nivelid':nivelid, 'nivelnomb':nivelnomb, 'sostenimientonomb':sostenimientonomb, 'modalidadnomb':modalidadnomb, 'ciclonomb':ciclonomb},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#contenedor_tablas").empty();
              $("#contenedor_tablas").append(html.result); // añadimos a la tabla
              swal.close();
            })
            .fail(function(e) {
              console.error("Error in gettablas1()"); console.table(e);
            });
    }// gettablas1()

    this.gettablas2 = function(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb){
            var ruta = base_url+"Estadistica/get_llenado_tablas2";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'tablas','municipioid':municipioid, 'municipionomb':municipionomb, 'nivelid':nivelid, 'nivelnomb':nivelnomb, 'sostenimientonomb':sostenimientonomb, 'modalidadnomb':modalidadnomb, 'ciclonomb':ciclonomb},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#contenedor_tablas2").empty();
              $("#contenedor_tablas2").append(html.result); // añadimos a la tabla
              swal.close();
            })
            .fail(function(e) {
              console.error("Error in gettablas2()"); console.table(e);
            });
    }// gettablas2()

    this.gettablas3 = function(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb){
            var ruta = base_url+"Estadistica/get_llenado_tablas3";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'tablas','municipioid':municipioid, 'municipionomb':municipionomb, 'nivelid':nivelid, 'nivelnomb':nivelnomb, 'sostenimientonomb':sostenimientonomb, 'modalidadnomb':modalidadnomb, 'ciclonomb':ciclonomb},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#contenedor_tablas3").empty();
              $("#contenedor_tablas3").append(html.result); // añadimos a la tabla
              swal.close();
            })
            .fail(function(e) {
              console.error("Error in gettablas2()"); console.table(e);
            });
    }// gettablas3()

    this.gettablas4 = function(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb){
            $("#ind_asist_lb").empty();
            $("#ind_asist_lb").append(ciclonomb);
            var ruta = base_url+"Estadistica/get_llenado_tablas4";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'tablas','municipioid':municipioid, 'municipionomb':municipionomb, 'nivelid':nivelid, 'nivelnomb':nivelnomb, 'sostenimientonomb':sostenimientonomb, 'modalidadnomb':modalidadnomb, 'ciclonomb':ciclonomb},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#contenedor_tablas4").empty();
              $("#contenedor_tablas4").append(html.result); // añadimos a la tabla
              swal.close();
            })
            .fail(function(e) {
              console.error("Error in gettablas4()"); console.table(e);
            });
    }// gettablas4()

    this.gettablas5 = function(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb){
      if(ciclonomb=="2014-2015-INICIO"){
        concat = " 2015-2016";
      }
      if (ciclonomb=="2015-2016-INICIO"){
        concat = " 2015-2016";
      }
      if (ciclonomb=="2016-2017-INICIO"){
        concat = " 2015-2016";
      }
      $("#ind_perma_lb").empty();
      $("#ind_perma_lb").append(concat);

            var ruta = base_url+"Estadistica/get_llenado_tablas5";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'tablas','municipioid':municipioid, 'municipionomb':municipionomb, 'nivelid':nivelid, 'nivelnomb':nivelnomb, 'sostenimientonomb':sostenimientonomb, 'modalidadnomb':modalidadnomb, 'ciclonomb':ciclonomb},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#contenedor_tablas5").empty();
              $("#contenedor_tablas5").append(html.result); // añadimos a la tabla
              swal.close();
            })
            .fail(function(e) {
              console.error("Error in gettablas5()"); console.table(e);
            });
    }// gettablas5()

    this.gettablas6 = function(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb){
            var ruta = base_url+"Estadistica/get_llenado_tablas6";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'tablas','municipioid':municipioid, 'municipionomb':municipionomb, 'nivelid':nivelid, 'nivelnomb':nivelnomb, 'sostenimientonomb':sostenimientonomb, 'modalidadnomb':modalidadnomb, 'ciclonomb':ciclonomb},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#contenedor_tablas6").empty();
              $("#contenedor_tablas6").append(html.result); // añadimos a la tabla
              swal.close();
            })
            .fail(function(e) {
              console.error("Error in gettablas6()"); console.table(e);
            });
    }// gettablas6()

    this.gettablas7 = function(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb){
            var ruta = base_url+"Estadistica/get_llenado_tablas7";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'tablas','municipioid':municipioid, 'municipionomb':municipionomb, 'nivelid':nivelid, 'nivelnomb':nivelnomb, 'sostenimientonomb':sostenimientonomb, 'modalidadnomb':modalidadnomb, 'ciclonomb':ciclonomb},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#contenedor_tablas7").empty();
              $("#contenedor_tablas7").append(html.result); // añadimos a la tabla
              swal.close();
            })
            .fail(function(e) {
              console.error("Error in gettablas7()"); console.table(e);
            });
    }// gettablas7()

    this.gettablas8 = function(municipioid, municipionomb, nivelid, nivelnomb, sostenimientonomb, modalidadnomb, ciclonomb){
            var ruta = base_url+"Estadistica/get_llenado_tablas8";
            $.ajax({
              url: ruta,
              method: 'POST',
              async: true,
              data: {'action':'tablas','municipioid':municipioid, 'municipionomb':municipionomb, 'nivelid':nivelid, 'nivelnomb':nivelnomb, 'sostenimientonomb':sostenimientonomb, 'modalidadnomb':modalidadnomb, 'ciclonomb':ciclonomb},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#contenedor_tablas8").empty();
              $("#contenedor_tablas8").append(html.result); // añadimos a la tabla
              obj_estadistica.get_colaps();
              obj_estadistica.get_mark_th(nivelnomb, sostenimientonomb, modalidadnomb);
              swal.close();
            })
            .fail(function(e) {
              console.error("Error in gettablas8()"); console.table(e);
            });
    }// gettablas8()

    this.get_colaps = function(){
      $(".hide-ini").css("display","none");

      $('tr.parent').css("cursor","pointer").attr("title","Click para expander/contraer").click(function()
        {
          $(this).find('span').closest('.chevron_toggleable').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
          if($(this).siblings('.child-'+this.id).is(":visible"))
          {
              $(this).siblings('.child-'+this.id).fadeOut('500');
              $(this).siblings('.child-'+this.id).siblings('.class-hide-'+this.id).fadeOut('500');
          }
          else
          {
                $(this).siblings('.child-'+this.id).fadeIn('500');
          }
        });

        $('tr.child-parent').css("cursor","pointer").attr("title","Click para expander/contraer").click(function()
        {
          $(this).find('span').closest('.chevron_toggleable').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
              if($(this).siblings('.nieto-'+this.id).is(":visible"))
                  {
                        $(this).siblings('.nieto-'+this.id).fadeOut('500');
                        $(this).siblings('.nieto-'+this.id).siblings('.class-hide-'+this.id).fadeOut('500');
                  }
                  else
                  {
                        $(this).siblings('.nieto-'+this.id).fadeIn('500');
                  }
        });

        $('tr.child-nieto').css("cursor","pointer").attr("title","Click para expander/contraer").click(function()
        {
          $(this).find('span').closest('.chevron_toggleable').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
            if($(this).siblings('.bisnieto-'+this.id).is(":visible"))
            {
                  $(this).siblings('.bisnieto-'+this.id).fadeOut('500');
            }
            else
            {
                  $(this).siblings('.bisnieto-'+this.id).fadeIn('500');
            }
        });
    }// get_colaps()

    this.get_mark_th = function(nivelnomb, sostenimientonomb, modalidadnomb){
      var nivel = nivelnomb;
      var sostenimiento = sostenimientonomb;
      var modalidad = modalidadnomb;

      switch(nivel)
      {
            case 'ESPECIAL':

                  $("#esp #mis_td, #esp2 #mis_td, #esp3 #mis_td").css('background-color','#FF8000');
                  $("#esp #show, #esp2 #show, #esp3 #show").css('background-color','#FF8000');

                  switch(sostenimiento)
                  {
                        case 'TODOS':
                              // Desplegamos hijos y nietos
                              $("#esppub, #esp2pub2, #esp3pub3").css("display","");
                                    $("#esppubcam, #esp2pub2cam2, #esp3pub3cam3").css("display","");
                                    $("#esppubusa, #esp2pub2usa2, #esp3pub3usa3").css("display","");
                              $("#esppri, #esp2pri2, #esp3pri3").css("display","");
                                    $("#esppricam, #esp2pri2cam2, #esp3pri3cam3").css("display","");
                              // Pintamos de color las filas para resaltar la seleccion realizada.

                              		$("#esppub #mis_td, #esp2pub2 #mis_td, #esp3pub3 #mis_td").css("background-color","#FAAC58");
                                    $("#esppub #show, #esp2pub2 #show, #esp3pub3 #show").css("background-color","#FAAC58");
                                          $("#esppubcam #mis_td, #esp2pub2cam2 #mis_td, #esp3pub3cam3 #mis_td").css("background-color","#F5D0A9");
                                          $("#esppubcam #show, #esp2pub2cam2 #show, #esp3pub3cam3 #show").css("background-color","#F5D0A9");
                                          $("#esppubusa #mis_td, #esp2pub2usa2 #mis_td, #esp3pub3usa3 #mis_td").css("background-color","#F5D0A9");
                                          $("#esppubusa #show, #esp2pub2usa2 #show, #esp3pub3usa3 #show").css("background-color","#F5D0A9");
                                    $("#esppri #mis_td, #esp2pri2 #mis_td, #esp3pri3 #mis_td").css("background-color","#FAAC58");
                                    $("#esppri #show, #esp2pri2 #show, #esp3pri3 #show").css("background-color","#FAAC58");
                                          $("#esppricam #mis_td, #esp2pri2cam2 #mis_td, #esp3pri3cam3 #mis_td").css("background-color","#F5D0A9");
                                          $("#esppricam #show, #esp2pri2cam2 #show, #esp3pri3cam3 #show").css("background-color","#F5D0A9");



                        break;

                        case 'PUBLICO':

                              $("#esppub #mis_td, #esp2pub2 #mis_td, #esp3pub3 #mis_td").css("background-color","#FAAC58");
                              $("#esppub #show, #esp2pub2 #show, #esp3pub3 #show").css("background-color","#FAAC58");


                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#esppub, #esp2pub2, #esp3pub3").css("display","");
                                                $("#esppubcam, #esp2pub2cam2, #esp3pub3cam3").css("display","");
                                                $("#esppubusa, #esp2pub2usa2, #esp3pub3usa3").css("display","");
                                          $("#esppri, #esp2pri2, #esp3pri3").css("display","");
                                                //$("#esppricam").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#esppubcam #mis_td, #esp2pub2cam2 #mis_td, #esp3pub3cam3 #mis_td").css("background-color","#F5D0A9");
                                          $("#esppubcam #show, #esp2pub2cam2 #show, #esp3pub3cam3 #show").css("background-color","#F5D0A9");
                                          $("#esppubusa #mis_td, #esp2pub2usa2 #mis_td, #esp3pub3usa3 #mis_td").css("background-color","#F5D0A9");
                                          $("#esppubusa #show, #esp2pub2usa2 #show, #esp3pub3usa3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'CAM':

                                          // Desplegamos hijos y nietos
                                          $("#esppub, #esp2pub2, #esp3pub3").css("display","");
                                                $("#esppubcam, #esp2pub2cam2, #esp3pub3cam3").css("display","");
                                                $("#esppubusa, #esp2pub2usa2, #esp3pub3usa3").css("display","");
                                          $("#esppri, #esp2pri2, #esp3pri3").css("display","");
                                                //$("#esppricam").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#esppubcam #mis_td, #esp2pub2cam2 #mis_td, #esp3pub3cam3 #mis_td").css("background-color","#F5D0A9");
                                          $("#esppubcam #show, #esp2pub2cam2 #show, #esp3pub3cam3 #show").css("background-color","#F5D0A9");



                                    break;

                                    case 'USAER':

                                          // Desplegamos hijos y nietos
                                          $("#esppub, #esp2pub2, #esp3pub3").css("display","");
                                                $("#esppubcam, #esp2pub2cam2, #esp3pub3cam3").css("display","");
                                                $("#esppubusa, #esp2pub2usa2, #esp3pub3usa3").css("display","");
                                          $("#esppri, #esp2pri2, #esp3pri3").css("display","");
                                                //$("#esppricam").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#esppubusa #mis_td, #esp2pub2usa2 #mis_td, #esp3pub3usa3 #mis_td").css("background-color","#F5D0A9");
                                          $("#esppubusa #show, #esp2pub2usa2 #show, #esp3pub3usa3 #show").css("background-color","#F5D0A9");


                                    break;
                              }


                        break;

                        case 'PRIVADO':

                              $("#esppri #mis_td, #esp2pri2 #mis_td, #esp3pri3 #mis_td").css("background-color","#FAAC58");
                              $("#esppri #show, #esp2pri2 #show, #esp3pri3 #show").css("background-color","#FAAC58");



                              switch(modalidad)
                              {
                                    case 'TODOS':

                                    case 'CAM':

                                          // Desplegamos hijos y nietos
                                          $("#esppub, #esp2pub2, #esp3pub3").css("display","");
                                                //$("#esppubcam, #esp2pub2cam2, #esp3pub3cam3").css("display","");
                                                //$("#esppubusa").css("display","none");
                                          $("#esppri, #esp2pri2, #esp3pri3").css("display","");
                                                $("#esppricam, #esp2pri2cam2, #esp3pri3cam3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#esppricam #mis_td, #esp2pri2cam2 #mis_td, #esp3pri3cam3 #mis_td").css("background-color","#F5D0A9");
                                          $("#esppricam #show, #esp2pri2cam2 #show, #esp3pri3cam3 #show").css("background-color","#F5D0A9");

                                          $("#esppub #mis_td, #esp2pub2 #mis_td, #esp3pub3 #mis_td").fadeIn(2000);
                                    		$("#esppub #show, #esp2pub2 #show, #esp3pub3 #show").fadeIn(2000);


                                          $("#esppricam #mis_td, #esp2pri2cam2 #mis_td, #esp3pri3cam3 #mis_td").fadeIn(2000);
                                          $("#esppricam #show, #esp2pri2cam2 #show, #esp3pri3cam3 #show").fadeIn(2000);

                                    break;
                              }


                        break;
                  }


            break;

            case 'INICIAL':

                  $("#ini #mis_td, #ini2 #mis_td, #ini3 #mis_td").css('background-color','#FF8000');
                  $("#ini #show, #ini2 #show, #ini3 #show").css('background-color','#FF8000');

                  switch(sostenimiento)
                  {
                        case 'TODOS':
                              // Desplegamos hijos y nietos
                              $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                              $("#inipubesc, #ini2pub2esc2, #ini3pub3esc3").css("display","");
                              $("#inipubnes, #ini2pub2nes2, #ini3pub3nes3").css("display","");
                              $("#inipubind, #ini2pub2ind2, #ini3pub3ind3").css("display","");
                              $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                              $("#iniautesc, #ini2aut2esc2, #ini3aut3esc3").css("display","");
                              $("#inipri, #ini2pri2, #ini3pri3").css("display","");
                              $("#inipriesc, #ini2pri2esc2, #ini3pri3esc3").css("display","");
                              $("#inipubcendi, #ini2pub2cendi2, #ini3pub3cendi3").css("display","");
                              $("#iniautcendi, #ini2aut2cendi2, #ini3aut3cendi3").css("display","");
                              $("#inipricendi, #ini2pri2cendi2, #ini3pri3cendi3").css("display","");
                              // Pintamos de color las filas para resaltar la seleccion realizada.

                              $("#inipub #mis_td, #ini2pub2 #mis_td, #ini3pub3 #mis_td").css("background-color","#FAAC58");
                              $("#inipub #show, #ini2pub2 #show, #ini3pub3 #show").css("background-color","#FAAC58");
                              $("#inipubesc #mis_td, #ini2pub2esc2 #mis_td, #ini3pub3esc3 #mis_td").css("background-color","#F5D0A9");
                              $("#inipubesc #show, #ini2pub2esc2 #show, #ini3pub3esc3 #show").css("background-color","#F5D0A9");
                              $("#inipubnes #mis_td, #ini2pub2nes2 #mis_td, #ini3pub3nes3 #mis_td").css("background-color","#F5D0A9");
                              $("#inipubnes #show, #ini2pub2nes2 #show, #ini3pub3nes3 #show").css("background-color","#F5D0A9");
                              $("#inipubind #mis_td, #ini2pub2ind2 #mis_td, #ini3pub3ind3 #mis_td").css("background-color","#F5D0A9");
                              $("#inipubind #show, #ini2pub2ind2 #show, #ini3pub3ind3 #show").css("background-color","#F5D0A9");

                              $("#iniaut #mis_td, #ini2aut2 #mis_td, #ini3aut3 #mis_td").css("background-color","#FAAC58");
                              $("#iniaut #show, #ini2aut2 #show, #ini3aut3 #show").css("background-color","#FAAC58");
                              $("#iniautesc #mis_td, #ini2aut2esc2 #mis_td, #ini3aut3esc3 #mis_td").css("background-color","#F5D0A9");
                              $("#iniautesc #show, #ini2aut2esc2 #show, #ini3aut3esc3 #show").css("background-color","#F5D0A9");

                              $("#inipri #mis_td, #ini2pri2 #mis_td, #ini3pri3 #mis_td").css("background-color","#FAAC58");
                              $("#inipri #show, #ini2pri2 #show, #ini3pri3 #show").css("background-color","#FAAC58");
                              $("#inipriesc #mis_td, #ini2pri2esc2 #mis_td, #ini3pri3esc3 #mis_td").css("background-color","#F5D0A9");
                              $("#inipriesc #show, #ini2pri2esc2 #show, #ini3pri3esc3 #show").css("background-color","#F5D0A9");

                              $("#inipubcendi #mis_td, #ini2pub2cendi2 #mis_td, #ini3pub3cendi3 #mis_td").css("background-color","#F5D0A9");
                              $("#inipubcendi #show, #ini2pub2cendi2 #show, #ini3pub3cendi3 #show").css("background-color","#F5D0A9");

                              $("#iniautcendi #mis_td, #ini2aut2cendi2 #mis_td, #ini3aut3cendi3 #mis_td").css("background-color","#F5D0A9");
                              $("#iniautcendi #show, #ini2aut2cendi2 #show, #ini3aut3cendi3 #show").css("background-color","#F5D0A9");

                              $("#inipricendi #mis_td, #ini2pri2cendi2 #mis_td, #ini3pri3cendi3 #mis_td").css("background-color","#F5D0A9");
                              $("#inipricendi #show, #ini2pri2cendi2 #show, #ini3pri3cendi3 #show").css("background-color","#F5D0A9");

                        break;

                        case 'PUBLICO':

                              $("#inipub #mis_td, #ini2pub2 #mis_td, #ini3pub3 #mis_td").css("background-color","#FAAC58");
                              $("#inipub #show, #ini2pub2 #show, #ini3pub3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                                          $("#inipubesc, #ini2pub2esc2, #ini3pub3esc3").css("display","");
                                          $("#inipubnes, #ini2pub2nes2, #ini3pub3nes3").css("display","");
                                          $("#inipubind, #ini2pub2ind2, #ini3pub3ind3").css("display","");
                                          $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                                          $("#iniautesc, #ini2aut2esc2, #ini3aut3esc3").css("display","");
                                          $("#inipri, #ini2pri2, #ini3pri3").css("display","");
                                          $("#inipriesc, #ini2pri2esc2, #ini3pri3esc3").css("display","");
                                          $("#inipubcendi, #ini2pub2cendi2, #ini3pub3cendi3").css("display","");
                                                //$("#esppricam").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#inipubesc #mis_td, #ini2pub2esc2 #mis_td, #ini3pub3esc3 #mis_td").css("background-color","#F5D0A9");
                                          $("#inipubesc #show, #ini2pub2esc2 #show, #ini3pub3esc3 #show").css("background-color","#F5D0A9");
                                          $("#inipubnes #mis_td, #ini2pub2nes2 #mis_td, #ini3pub3nes3 #mis_td").css("background-color","#F5D0A9");
                                          $("#inipubnes #show, #ini2pub2nes2 #show, #ini3pub3nes3 #show").css("background-color","#F5D0A9");
                                          $("#inipubind #mis_td, #ini2pub2ind2 #mis_td, #ini3pub3ind3 #mis_td").css("background-color","#F5D0A9");
                                          $("#inipubind #show, #ini2pub2ind2 #show, #ini3pub3ind3 #show").css("background-color","#F5D0A9");
                                          $("#inipubcendi #mis_td, #ini2pub2cendi2 #mis_td, #ini3pub3cendi3 #mis_td").css("background-color","#F5D0A9");
                                          $("#inipubcendi #show, #ini2pub2cendi2 #show, #ini3pub3cendi3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'INICIAL':

                                          // Desplegamos hijos y nietos
                                          $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                                          $("#inipubesc, #ini2pub2esc2, #ini3pub3esc3").css("display","");
                                          $("#inipubnes, #ini2pub2nes2, #ini3pub3nes3").css("display","");
                                          $("#inipubind, #ini2pub2ind2, #ini3pub3ind3").css("display","");
                                          $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                                          $("#inipri, #ini2pri2, #ini3pri3").css("display","");

                                          $("#inipubcendi, #ini2pub2cendi2, #ini3pub3cendi3").css("display","");
                                                //$("#esppricam").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#inipubesc #mis_td, #ini2pub2esc2 #mis_td, #ini3pub3esc3 #mis_td").css("background-color","#F5D0A9");
                                          $("#inipubesc #show, #ini2pub2esc2 #show, #ini3pub3esc3 #show").css("background-color","#F5D0A9");
                                    break;

                                    case 'NO ESCOLARIZADO':

                                          // Desplegamos hijos y nietos
                                          $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                                          $("#inipubesc, #ini2pub2esc2, #ini3pub3esc3").css("display","");
                                          $("#inipubnes, #ini2pub2nes2, #ini3pub3nes3").css("display","");
                                          $("#inipubind, #ini2pub2ind2, #ini3pub3ind3").css("display","");
                                          $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                                          $("#iniautesc, #ini2aut2esc2, #ini3aut3esc3").css("display","");
                                          $("#inipri, #ini2pri2, #ini3pri3").css("display","");
                                          $("#inipriesc, #ini2pri2esc2, #ini3pri3esc3").css("display","");

                                          $("#inipubcendi, #ini2pub2cendi2, #ini3pub3cendi3").css("display","");
                                                //$("#esppricam").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#inipubnes #mis_td, #ini2pub2nes2 #mis_td, #ini3pub3nes3 #mis_td").css("background-color","#F5D0A9");
                                          $("#inipubnes #show, #ini2pub2nes2 #show, #ini3pub3nes3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'INDIGENA':

                                          // Desplegamos hijos y nietos
                                          $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                                          $("#inipubesc, #ini2pub2esc2, #ini3pub3esc3").css("display","");
                                          $("#inipubnes, #ini2pub2nes2, #ini3pub3nes3").css("display","");
                                          $("#inipubind, #ini2pub2ind2, #ini3pub3ind3").css("display","");
                                          $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                                          $("#iniautesc, #ini2aut2esc2, #ini3aut3esc3").css("display","");
                                          $("#inipri, #ini2pri2, #ini3pri3").css("display","");
                                          $("#inipriesc, #ini2pri2esc2, #ini3pri3esc3").css("display","");

                                          $("#inipubcendi, #ini2pub2cendi2, #ini3pub3cendi3").css("display","");
                                                //$("#esppricam").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#inipubind #mis_td, #ini2pub2ind2 #mis_td, #ini3pub3ind3 #mis_td").css("background-color","#F5D0A9");
                                          $("#inipubind #show, #ini2pub2ind2 #show, #ini3pub3ind3 #show").css("background-color","#F5D0A9");
                                    break;

                                    case 'CENDI':

                                          // Desplegamos hijos y nietos
                                          $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                                          $("#inipubesc, #ini2pub2esc2, #ini3pub3esc3").css("display","");
                                          $("#inipubnes, #ini2pub2nes2, #ini3pub3nes3").css("display","");
                                          $("#inipubind, #ini2pub2ind2, #ini3pub3ind3").css("display","");
                                          $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                                          $("#iniautesc, #ini2aut2esc2, #ini3aut3esc3").css("display","");
                                          $("#inipri, #ini2pri2, #ini3pri3").css("display","");
                                          $("#inipriesc, #ini2pri2esc2, #ini3pri3esc3").css("display","");

                                          $("#inipubcendi, #ini2pub2cendi2, #ini3pub3cendi3").css("display","");
                                                //$("#esppricam").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#inipubcendi #mis_td, #ini2pub2cendi2 #mis_td, #ini3pub3cendi3 #mis_td").css("background-color","#F5D0A9");
                                          $("#inipubcendi #show, #ini2pub2cendi2 #show, #ini3pub3cendi3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;

                        case 'PRIVADO':

                              $("#inipri #mis_td, #ini2pri2 #mis_td, #ini3pri3 #mis_td").css("background-color","#FAAC58");
                              $("#inipri #show, #ini2pri2 #show, #ini3pri3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':
                                    // Desplegamos hijos y nietos
                                    $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                                    $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                                          //$("#inipubesc, #ini2pub2esc2, #ini3pub3esc3").css("display","");
                                          //$("#esppubusa").css("display","none");
                                    $("#inipri, #ini2pri2, #ini3pri3").css("display","");
                                          $("#inipriesc, #ini2pri2esc2, #ini3pri3esc3").css("display","");
                                    // Pintamos de color las filas para resaltar la seleccion realizada.
                                    $("#inipriesc #mis_td, #ini2pri2esc2 #mis_td, #ini3pri3esc3 #mis_td").css("background-color","#F5D0A9");
                                    $("#inipriesc #show, #ini2pri2esc2 #show, #ini3pri3esc3 #show").css("background-color","#F5D0A9");

                                    $("#inipricendi, #ini2pri2cendi2, #ini3pri3cendi3").css("display","");
                              // Pintamos de color las filas para resaltar la seleccion realizada.
                              $("#inipricendi #mis_td, #ini2pri2cendi2 #mis_td, #ini3pri3cendi3 #mis_td").css("background-color","#F5D0A9");
                              $("#inipricendi #show, #ini2pri2cendi2 #show, #ini3pri3cendi3 #show").css("background-color","#F5D0A9");


                              break;

                                    case 'INICIAL':

                                          // Desplegamos hijos y nietos
                                          $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                                          $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                                                //$("#inipubesc, #ini2pub2esc2, #ini3pub3esc3").css("display","");
                                                //$("#esppubusa").css("display","none");
                                          $("#inipri, #ini2pri2, #ini3pri3").css("display","");
                                                $("#inipriesc, #ini2pri2esc2, #ini3pri3esc3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#inipriesc #mis_td, #ini2pri2esc2 #mis_td, #ini3pri3esc3 #mis_td").css("background-color","#F5D0A9");
                                          $("#inipriesc #show, #ini2pri2esc2 #show, #ini3pri3esc3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'CENDI':

                                          // Desplegamos hijos y nietos
                                          $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                                          $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                                                //$("#inipubesc, #ini2pub2esc2, #ini3pub3esc3").css("display","");
                                                //$("#esppubusa").css("display","none");
                                          $("#inipri, #ini2pri2, #ini3pri3").css("display","");
                                                $("#inipricendi, #ini2pri2cendi2, #ini3pri3cendi3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#inipricendi #mis_td, #ini2pri2cendi2 #mis_td, #ini3pri3cendi3 #mis_td").css("background-color","#F5D0A9");
                                          $("#inipricendi #show, #ini2pri2cendi2 #show, #ini3pri3cendi3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;

                        case 'AUTONOMO':

                              $("#iniaut #mis_td, #ini2aut2 #mis_td, #ini3aut3 #mis_td").css("background-color","#FAAC58");
                              $("#iniaut #show, #ini2aut2 #show, #ini3aut3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':

                                    // Desplegamos hijos y nietos
                                    $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                                    $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                                    $("#iniautesc, #ini2aut2esc2, #ini3aut3esc3").css("display","");
                                    $("#inipri, #ini2pri2, #ini3pri3").css("display","");
                                    // Pintamos de color las filas para resaltar la seleccion realizada.
                                    $("#iniautesc #mis_td, #ini2aut2esc2 #mis_td, #ini3aut3esc3 #mis_td").css("background-color","#F5D0A9");
                                    $("#iniautesc #show, #ini2aut2esc2 #show, #ini3aut3esc3 #show").css("background-color","#F5D0A9");

                                    $("#iniautcendi, #ini2aut2cendi2, #ini3aut3cendi3").css("display","");
$("#iniautcendi #mis_td, #ini2aut2cendi2 #mis_td, #ini3aut3cendi3 #mis_td").css("background-color","#F5D0A9");
                                    $("#iniautcendi #show, #ini2aut2cendi2 #show, #ini3aut3cendi3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'INICIAL':

                                          // Desplegamos hijos y nietos
                                          $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                                          $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                                          $("#iniautesc, #ini2aut2esc2, #ini3aut3esc3").css("display","");
                                          $("#inipri, #ini2pri2, #ini3pri3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#iniautesc #mis_td, #ini2aut2esc2 #mis_td, #ini3aut3esc3 #mis_td").css("background-color","#F5D0A9");
                                          $("#iniautesc #show, #ini2aut2esc2 #show, #ini3aut3esc3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'CENDI':

                                          // Desplegamos hijos y nietos
                                          $("#inipub, #ini2pub2, #ini3pub3").css("display","");
                                          $("#iniaut, #ini2aut2, #ini3aut3").css("display","");
                                          $("#iniautcendi, #ini2aut2cendi2, #ini3aut3cendi3").css("display","");
                                          $("#inipri, #ini2pri2, #ini3pri3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#iniautcendi #mis_td, #ini2aut2cendi2 #mis_td, #ini3aut3cendi3 #mis_td").css("background-color","#F5D0A9");
                                          $("#iniautcendi #show, #ini2aut2cendi2 #show, #ini3aut3cendi3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;
                  }
            break;

            case 'PREESCOLAR':

                  $("#pre #mis_td, #pre2 #mis_td, #pre3 #mis_td").css('background-color','#FF8000');
                  $("#pre #show, #pre2 #show, #pre3 #show").css('background-color','#FF8000');

                  switch(sostenimiento)
                  {
                        case 'TODOS':
                              // Desplegamos hijos y nietos
                              $("#prepub, #pre2pub2, #pre3pub3").css("display","");
                              $("#prepubcon, #pre2pub2con2, #pre3pub3con3").css("display","");
                              $("#prepubgen, #pre2pub2gen2, #pre3pub3gen3").css("display","");
                              $("#prepubind, #pre2pub2ind2, #pre3pub3ind3").css("display","");
                              $("#prepri, #pre2pri2, #pre3pri3").css("display","");
                              $("#preprigen, #pre2pri2gen2, #pre3pri3gen3").css("display","");
                              $("#preaut, #pre2aut2, #pre3aut3").css("display","");
                              $("#preautgen, #pre2aut2gen2, #pre3aut3gen3").css("display","");
                              // Pintamos de color las filas para resaltar la seleccion realizada.

                              $("#prepub #mis_td, #pre2pub2 #mis_td, #pre3pub3 #mis_td").css("background-color","#FAAC58");
                              $("#prepub #show, #pre2pub2 #show, #pre3pub3 #show").css("background-color","#FAAC58");
                              $("#prepubcon #mis_td, #pre2pub2con2 #mis_td, #pre3pub3con3 #mis_td").css("background-color","#F5D0A9");
                              $("#prepubcon #show, #pre2pub2con2 #show, #pre3pub3con3 #show").css("background-color","#F5D0A9");
                              $("#prepubgen #mis_td, #pre2pub2gen2 #mis_td, #pre3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                              $("#prepubgen #show, #pre2pub2gen2 #show, #pre3pub3gen3 #show").css("background-color","#F5D0A9");
                              $("#prepubind #mis_td, #pre2pub2ind2 #mis_td, #pre3pub3ind3 #mis_td").css("background-color","#F5D0A9");
                              $("#prepubind #show, #pre2pub2ind2 #show, #pre3pub3ind3 #show").css("background-color","#F5D0A9");
                              $("#prepri #mis_td, #pre2pri2 #mis_td, #pre3pri3 #mis_td").css("background-color","#FAAC58");
                              $("#prepri #show, #pre2pri2 #show, #pre3pri3 #show").css("background-color","#FAAC58");
                              $("#preprigen #mis_td, #pre2pri2gen2 #mis_td, #pre3pri3gen3 #mis_td").css("background-color","#F5D0A9");
                              $("#preprigen #show, #pre2pri2gen2 #show, #pre3pri3gen3 #show").css("background-color","#F5D0A9");
                              $("#preaut #mis_td, #pre2aut2 #mis_td, #pre3aut3 #mis_td").css("background-color","#FAAC58");
                              $("#preaut #show, #pre2aut2 #show, #pre3aut3 #show").css("background-color","#FAAC58");
                              $("#preautgen #mis_td, #pre2aut2gen2 #mis_td, #pre3aut3gen3 #mis_td").css("background-color","#F5D0A9");
                              $("#preautgen #show, #pre2aut2gen2 #show, #pre3aut3gen3 #show").css("background-color","#F5D0A9");
                        break;

                        case 'PUBLICO':

                              $("#prepub #mis_td, #pre2pub2 #mis_td, #pre3pub3 #mis_td").css("background-color","#FAAC58");
                              $("#prepub #show, #pre2pub2 #show, #pre3pub3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#prepub, #pre2pub2, #pre3pub3").css("display","");
                                          $("#prepubcon, #pre2pub2con2, #pre3pub3con3").css("display","");
                                          $("#prepubgen, #pre2pub2gen2, #pre3pub3gen3").css("display","");
                                          $("#prepubind, #pre2pub2ind2, #pre3pub3ind3").css("display","");
                                          $("#prepri, #pre2pri2, #pre3pri3").css("display","");
                                          $("#preaut, #pre2aut2, #pre3aut3").css("display","");
                                                //$("#preprigen, #pre2pri2gen2, #pre3pri3gen3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#prepub #mis_td, #pre2pub2 #mis_td, #pre3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#prepub #show, #pre2pub2 #show, #pre3pub3 #show").css("background-color","#FAAC58");
                                          $("#prepubcon #mis_td, #pre2pub2con2 #mis_td, #pre3pub3con3 #mis_td").css("background-color","#F5D0A9");
                                          $("#prepubcon #show, #pre2pub2con2 #show, #pre3pub3con3 #show").css("background-color","#F5D0A9");
                                          $("#prepubgen #mis_td, #pre2pub2gen2 #mis_td, #pre3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#prepubgen #show, #pre2pub2gen2 #show, #pre3pub3gen3 #show").css("background-color","#F5D0A9");
                                          $("#prepubind #mis_td, #pre2pub2ind2 #mis_td, #pre3pub3ind3 #mis_td").css("background-color","#F5D0A9");
                                          $("#prepubind #show, #pre2pub2ind2 #show, #pre3pub3ind3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'CONAFE (COMUNITARIA)':

                                          $("#prepub, #pre2pub2, #pre3pub3").css("display","");
                                          $("#prepubcon, #pre2pub2con2, #pre3pub3con3").css("display","");
                                          $("#prepubgen, #pre2pub2gen2, #pre3pub3gen3").css("display","");
                                          $("#prepubind, #pre2pub2ind2, #pre3pub3ind3").css("display","");
                                          $("#prepri, #pre2pri2, #pre3pri3").css("display","");
                                          $("#preaut, #pre2aut2, #pre3aut3").css("display","");
                                                //$("#preprigen, #pre2pri2gen2, #pre3pri3gen3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                         $("#prepub #mis_td, #pre2pub2 #mis_td, #pre3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#prepub #show, #pre2pub2 #show, #pre3pub3 #show").css("background-color","#FAAC58");
                                          $("#prepubcon #mis_td, #pre2pub2con2 #mis_td, #pre3pub3con3 #mis_td").css("background-color","#F5D0A9");
                                          $("#prepubcon #show, #pre2pub2con2 #show, #pre3pub3con3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'GENERAL':

                                          $("#prepub, #pre2pub2, #pre3pub3").css("display","");
                                          $("#prepubcon, #pre2pub2con2, #pre3pub3con3").css("display","");
                                          $("#prepubgen, #pre2pub2gen2, #pre3pub3gen3").css("display","");
                                          $("#prepubind, #pre2pub2ind2, #pre3pub3ind3").css("display","");
                                          $("#prepri, #pre2pri2, #pre3pri3").css("display","");
                                          $("#preaut, #pre2aut2, #pre3aut3").css("display","");
                                                //$("#preprigen, #pre2pri2gen2, #pre3pri3gen3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#prepub #mis_td, #pre2pub2 #mis_td, #pre3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#prepub #show, #pre2pub2 #show, #pre3pub3 #show").css("background-color","#FAAC58");

                                          $("#prepubgen #mis_td, #pre2pub2gen2 #mis_td, #pre3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#prepubgen #show, #pre2pub2gen2 #show, #pre3pub3gen3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'INDIGENA':

                                         $("#prepub, #pre2pub2, #pre3pub3").css("display","");
                                          $("#prepubcon, #pre2pub2con2, #pre3pub3con3").css("display","");
                                          $("#prepubgen, #pre2pub2gen2, #pre3pub3gen3").css("display","");
                                          $("#prepubind, #pre2pub2ind2, #pre3pub3ind3").css("display","");
                                          $("#prepri, #pre2pri2, #pre3pri3").css("display","");
                                          $("#preaut, #pre2aut2, #pre3aut3").css("display","");
                                                //$("#preprigen, #pre2pri2gen2, #pre3pri3gen3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#prepub #mis_td, #pre2pub2 #mis_td, #pre3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#prepub #show, #pre2pub2 #show, #pre3pub3 #show").css("background-color","#FAAC58");

                                          $("#prepubind #mis_td, #pre2pub2ind2 #mis_td, #pre3pub3ind3 #mis_td").css("background-color","#F5D0A9");
                                          $("#prepubind #show, #pre2pub2ind2 #show, #pre3pub3ind3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;

                        case 'PRIVADO':

                              $("#prepri #mis_td, #pre2pri2 #mis_td, #pre3pri3 #mis_td").css("background-color","#FAAC58");
                              $("#prepri #show, #pre2pri2 #show, #pre3pri3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':

                                    case 'GENERAL':

                                          // Desplegamos hijos y nietos
                              $("#prepub, #pre2pub2, #pre3pub3").css("display","");
                              $("#prepri, #pre2pri2, #pre3pri3").css("display","");
                              $("#preprigen, #pre2pri2gen2, #pre3pri3gen3").css("display","");
                              $("#preaut, #pre2aut2, #pre3aut3").css("display","");
                              // Pintamos de color las filas para resaltar la seleccion realizada.


                              $("#prepri #mis_td, #pre2pri2 #mis_td, #pre3pri3 #mis_td").css("background-color","#FAAC58");
                              $("#prepri #show, #pre2pri2 #show, #pre3pri3 #show").css("background-color","#FAAC58");
                              $("#preprigen #mis_td, #pre2pri2gen2 #mis_td, #pre3pri3gen3 #mis_td").css("background-color","#F5D0A9");
                              $("#preprigen #show, #pre2pri2gen2 #show, #pre3pri3gen3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;

                        case 'AUTONOMO':

                              $("#preaut #mis_td, #pre2aut2 #mis_td, #pre3aut3 #mis_td").css("background-color","#FAAC58");
                              $("#preaut #show, #pre2aut2 #show, #pre3aut3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':

                                    case 'GENERAL':

                                          // Desplegamos hijos y nietos
                              $("#prepub, #pre2pub2, #pre3pub3").css("display","");
                              $("#prepri, #pre2pri2, #pre3pri3").css("display","");

                              $("#preaut, #pre2aut2, #pre3aut3").css("display","");
                              $("#preautgen, #pre2aut2gen2, #pre3aut3gen3").css("display","");
                              // Pintamos de color las filas para resaltar la seleccion realizada.


                              $("#preaut #mis_td, #pre2aut2 #mis_td, #pre3aut3 #mis_td").css("background-color","#FAAC58");
                              $("#preaut #show, #pre2aut2 #show, #pre3aut3 #show").css("background-color","#FAAC58");
                              $("#preautgen #mis_td, #pre2aut2gen2 #mis_td, #pre3aut3gen3 #mis_td").css("background-color","#F5D0A9");
                              $("#preautgen #show, #pre2aut2gen2 #show, #pre3aut3gen3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;
                  }
            break;

            case 'PRIMARIA':

                  $("#pri #mis_td, #pri2 #mis_td, #pri3 #mis_td").css('background-color','#FF8000');
                  $("#pri #show, #pri2 #show, #pri3 #show").css('background-color','#FF8000');

                  switch(sostenimiento)
                  {
                        case 'TODOS':
                              // Desplegamos hijos y nietos
                              $("#pripub, #pri2pub2, #pri3pub3").css("display","");
                              $("#pripubcon, #pri2pub2con2, #pri3pub3con3").css("display","");
                              $("#pripubgen, #pri2pub2gen2, #pri3pub3gen3").css("display","");
                              $("#pripubind, #pri2pub2ind2, #pri3pub3ind3").css("display","");
                              $("#pripri, #pri2pri2, #pri3pri3").css("display","");
                              $("#priprigen, #pri2pri2gen2, #pri3pri3gen3").css("display","");
                              // Pintamos de color las filas para resaltar la seleccion realizada.

                                    $("#pripub #mis_td, #pri2pub2 #mis_td, #pri3pub3 #mis_td").css("background-color","#FAAC58");
                                    $("#pripub #show, #pri2pub2 #show, #pri3pub3 #show").css("background-color","#FAAC58");
                                    $("#pripubcon #mis_td, #pri2pub2con2 #mis_td, #pri3pub3con3 #mis_td").css("background-color","#F5D0A9");
                                    $("#pripubcon #show, #pri2pub2con2 #show, #pri3pub3con3 #show").css("background-color","#F5D0A9");
                                    $("#pripubgen #mis_td, #pri2pub2gen2 #mis_td, #pri3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                                    $("#pripubgen #show, #pri2pub2gen2 #show, #pri3pub3gen3 #show").css("background-color","#F5D0A9");
                                    $("#pripubind #mis_td, #pri2pub2ind2 #mis_td, #pri3pub3ind3 #mis_td").css("background-color","#F5D0A9");
                                    $("#pripubind #show, #pri2pub2ind2 #show, #pri3pub3ind3 #show").css("background-color","#F5D0A9");
                                    $("#pripri #mis_td, #pri2pri2 #mis_td, #pri3pri3 #mis_td").css("background-color","#FAAC58");
                                    $("#pripri #show, #pri2pri2 #show, #pri3pri3 #show").css("background-color","#FAAC58");
                                    $("#priprigen #mis_td, #pri2pri2gen2 #mis_td, #pri3pri3gen3 #mis_td").css("background-color","#F5D0A9");
                                    $("#priprigen #show, #pri2pri2gen2 #show, #pri3pri3gen3 #show").css("background-color","#F5D0A9");

                                    $("#pripubpad, #pri2pub2pad2, #pri3pub3pad3").css("display","");
                                    $("#pripripad, #pri2pri2pad2, #pri3pri3pad3").css("display","");

                                                $("#pripubpad #mis_td, #pri2pub2pad2 #mis_td, #pri3pub3pad3 #mis_td").css("background-color","#F5D0A9");
                                                $("#pripubpad #show, #pri2pub2pad2 #show, #pri3pub3pad3 #show").css("background-color","#F5D0A9");
                                                $("#pripripad #mis_td, #pri2pri2pad2 #mis_td, #pri3pri3pad3 #mis_td").css("background-color","#F5D0A9");
                                                $("#pripripad #show, #pri2pri2pad2 #show, #pri3pri3pad3 #show").css("background-color","#F5D0A9");
                        break;

                        case 'PUBLICO':

                              $("#pripub #mis_td, #pri2pub2 #mis_td, #pri3pub3 #mis_td").css("background-color","#FAAC58");
                              $("#pripub #show, #pri2pub2 #show, #pri3pub3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#pripub, #pri2pub2, #pri3pub3").css("display","");
                                                $("#pripubcon, #pri2pub2con2, #pri3pub3con3").css("display","");
                                                $("#pripubgen, #pri2pub2gen2, #pri3pub3gen3").css("display","");
                                                $("#pripubind, #pri2pub2ind2, #pri3pub3ind3").css("display","");
                                          $("#pripri, #pri2pri2, #pri3pri3").css("display","");
                                          $("#pripubpad, #pri2pub2pad2, #pri3pub3pad3").css("display","");
                                                //$("#priprigen, #pri2pri2gen2, #pri3pri3gen3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                                $("#pripub #mis_td, #pri2pub2 #mis_td, #pri3pub3 #mis_td").css("background-color","#FAAC58");
                                                $("#pripub #show, #pri2pub2 #show, #pri3pub3 #show").css("background-color","#FAAC58");
                                                      $("#pripubcon #mis_td, #pri2pub2con2 #mis_td, #pri3pub3con3 #mis_td").css("background-color","#F5D0A9");
                                                      $("#pripubcon #show, #pri2pub2con2 #show, #pri3pub3con3 #show").css("background-color","#F5D0A9");
                                                      $("#pripubgen #mis_td, #pri2pub2gen2 #mis_td, #pri3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                                                      $("#pripubgen #show, #pri2pub2gen2 #show, #pri3pub3gen3 #show").css("background-color","#F5D0A9");
                                                      $("#pripubind #mis_td, #pri2pub2ind2 #mis_td, #pri3pub3ind3 #mis_td").css("background-color","#F5D0A9");
                                                      $("#pripubind #show, #pri2pub2ind2 #show, #pri3pub3ind3 #show").css("background-color","#F5D0A9");

                                                      $("#pripubpad #mis_td, #pri2pub2pad2 #mis_td, #pri3pub3pad3 #mis_td").css("background-color","#F5D0A9");
                                                      $("#pripubpad #show, #pri2pub2pad2 #show, #pri3pub3pad3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'CONAFE (COMUNITARIA)':

                                          $("#pripub, #pri2pub2, #pri3pub3").css("display","");
                                                $("#pripubcon, #pri2pub2con2, #pri3pub3con3").css("display","");
                                                $("#pripubgen, #pri2pub2gen2, #pri3pub3gen3").css("display","");
                                                $("#pripubind, #pri2pub2ind2, #pri3pub3ind3").css("display","");
                                          $("#pripri, #pri2pri2, #pri3pri3").css("display","");
                                          $("#pripubpad, #pri2pub2pad2, #pri3pub3pad3").css("display","");
                                                //$("#priprigen, #pri2pri2gen2, #pri3pri3gen3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                                $("#pripub #mis_td, #pri2pub2 #mis_td, #pri3pub3 #mis_td").css("background-color","#FAAC58");
                                                $("#pripub #show, #pri2pub2 #show, #pri3pub3 #show").css("background-color","#FAAC58");
                                                      $("#pripubcon #mis_td, #pri2pub2con2 #mis_td, #pri3pub3con3 #mis_td").css("background-color","#F5D0A9");
                                                      $("#pripubcon #show, #pri2pub2con2 #show, #pri3pub3con3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'GENERAL':

                                          $("#pripub, #pri2pub2, #pri3pub3").css("display","");
                                                $("#pripubcon, #pri2pub2con2, #pri3pub3con3").css("display","");
                                                $("#pripubgen, #pri2pub2gen2, #pri3pub3gen3").css("display","");
                                                $("#pripubind, #pri2pub2ind2, #pri3pub3ind3").css("display","");
                                          $("#pripri, #pri2pri2, #pri3pri3").css("display","");
                                          $("#pripubpad, #pri2pub2pad2, #pri3pub3pad3").css("display","");
                                                //$("#priprigen, #pri2pri2gen2, #pri3pri3gen3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                                $("#pripub #mis_td, #pri2pub2 #mis_td, #pri3pub3 #mis_td").css("background-color","#FAAC58");
                                                $("#pripub #show, #pri2pub2 #show, #pri3pub3 #show").css("background-color","#FAAC58");

                                                      $("#pripubgen #mis_td, #pri2pub2gen2 #mis_td, #pri3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                                                      $("#pripubgen #show, #pri2pub2gen2 #show, #pri3pub3gen3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'INDIGENA':

                                          $("#pripub, #pri2pub2, #pri3pub3").css("display","");
                                                $("#pripubcon, #pri2pub2con2, #pri3pub3con3").css("display","");
                                                $("#pripubgen, #pri2pub2gen2, #pri3pub3gen3").css("display","");
                                                $("#pripubind, #pri2pub2ind2, #pri3pub3ind3").css("display","");
                                          $("#pripri, #pri2pri2, #pri3pri3").css("display","");
                                          $("#pripubpad, #pri2pub2pad2, #pri3pub3pad3").css("display","");
                                                //$("#priprigen, #pri2pri2gen2, #pri3pri3gen3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                                $("#pripub #mis_td, #pri2pub2 #mis_td, #pri3pub3 #mis_td").css("background-color","#FAAC58");
                                                $("#pripub #show, #pri2pub2 #show, #pri3pub3 #show").css("background-color","#FAAC58");

                                                      $("#pripubind #mis_td, #pri2pub2ind2 #mis_td, #pri3pub3ind3 #mis_td").css("background-color","#F5D0A9");
                                                      $("#pripubind #show, #pri2pub2ind2 #show, #pri3pub3ind3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'PARA ADULTOS':

                                          $("#pripub, #pri2pub2, #pri3pub3").css("display","");
                                                $("#pripubcon, #pri2pub2con2, #pri3pub3con3").css("display","");
                                                $("#pripubgen, #pri2pub2gen2, #pri3pub3gen3").css("display","");
                                                $("#pripubind, #pri2pub2ind2, #pri3pub3ind3").css("display","");
                                                $("#pripubpad, #pri2pub2pad2, #pri3pub3pad3").css("display","");
                                          $("#pripri, #pri2pri2, #pri3pri3").css("display","");
                                                //$("#priprigen, #pri2pri2gen2, #pri3pri3gen3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                                $("#pripub #mis_td, #pri2pub2 #mis_td, #pri3pub3 #mis_td").css("background-color","#FAAC58");
                                                $("#pripub #show, #pri2pub2 #show, #pri3pub3 #show").css("background-color","#FAAC58");

                                                      $("#pripubpad #mis_td, #pri2pub2pad2 #mis_td, #pri3pub3pad3 #mis_td").css("background-color","#F5D0A9");
                                                      $("#pripubpad #show, #pri2pub2pad2 #show, #pri3pub3pad3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;

                        case 'PRIVADO':

                              $("#pripri #mis_td, #pri2pri2 #mis_td, #pri3pri3 #mis_td").css("background-color","#FAAC58");
                              $("#pripri #show, #pri2pri2 #show, #pri3pri3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':

                                    $("#pripripad, #pri2pri2pad2, #pri3pri3pad3").css("display","");
                                    $("#pripripad #mis_td, #pri2pri2pad2 #mis_td, #pri3pri3pad3 #mis_td").css("background-color","#F5D0A9");
                                    $("#pripripad #show, #pri2pri2pad2 #show, #pri3pri3pad3 #show").css("background-color","#F5D0A9");

                                    $("#pripub, #pri2pub2, #pri3pub3").css("display","");

                                    $("#pripri, #pri2pri2, #pri3pri3").css("display","");
                                          $("#priprigen, #pri2pri2gen2, #pri3pri3gen3").css("display","");
                                    // Pintamos de color las filas para resaltar la seleccion realizada.


                                          $("#pripri #show, #pri2pri2 #show, #pri3pri3 #show").css("background-color","#FAAC58");
                                                $("#priprigen #mis_td, #pri2pri2gen2 #mis_td, #pri3pri3gen3 #mis_td").css("background-color","#F5D0A9");
                                                $("#priprigen #show, #pri2pri2gen2 #show, #pri3pri3gen3 #show").css("background-color","#F5D0A9");

                                          break;

                                    case 'GENERAL':

                                          // Desplegamos hijos y nietos
                              $("#pripub, #pri2pub2, #pri3pub3").css("display","");

                              $("#pripri, #pri2pri2, #pri3pri3").css("display","");
                                    $("#priprigen, #pri2pri2gen2, #pri3pri3gen3").css("display","");
                                    $("#pripripad, #pri2pri2pad2, #pri3pri3pad3").css("display","");
                              // Pintamos de color las filas para resaltar la seleccion realizada.


                                    $("#pripri #show, #pri2pri2 #show, #pri3pri3 #show").css("background-color","#FAAC58");
                                          $("#priprigen #mis_td, #pri2pri2gen2 #mis_td, #pri3pri3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#priprigen #show, #pri2pri2gen2 #show, #pri3pri3gen3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'PARA ADULTOS':

                                          // Desplegamos hijos y nietos
                              $("#pripub, #pri2pub2, #pri3pub3").css("display","");

                              $("#pripri, #pri2pri2, #pri3pri3").css("display","");
                              $("#pripri #show, #pri2pri2 #show, #pri3pri3 #show").css("background-color","#FAAC58");
                              $("#pripripad, #pri2pri2pad2, #pri3pri3pad3").css("display","");
                              $("#priprigen, #pri2pri2gen2, #pri3pri3gen3").css("display","");
                              $("#pripripad #mis_td, #pri2pri2pad2 #mis_td, #pri3pri3pad3 #mis_td").css("background-color","#F5D0A9");
                              $("#pripripad #show, #pri2pri2pad2 #show, #pri3pri3pad3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;
                  }
            break;

            case 'SECUNDARIA':

                  $("#sec #mis_td, #sec2 #mis_td, #sec3 #mis_td").css('background-color','#FF8000');
                  $("#sec #show, #sec2 #show, #sec3 #show").css('background-color','#FF8000');

                  switch(sostenimiento)
                  {
                        case 'TODOS':
                              // Desplegamos hijos y nietos
                              $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                              $("#secpubgen, #sec2pub2gen2, #sec3pub3gen3").css("display","");
                              $("#secpubtin, #sec2pub2tin2, #sec3pub3tin3").css("display","");
                              $("#secpubtag, #sec2pub2tag2, #sec3pub3tag3").css("display","");
                              $("#secpubptr, #sec2pub2ptr2, #sec3pub3ptr3").css("display","");
                              $("#secpubtel, #sec2pub2tel2, #sec3pub3tel3").css("display","");
                              $("#secpubcon, #sec2pub2con2, #sec3pub3con3").css("display","");
                              $("#secpubtec, #sec2pub2tec2, #sec3pub3tec3").css("display","");
                              $("#secpubcomu, #sec2pub2comu2, #sec3pub3comu3").css("display","");
                              $("#secpubpad, #sec2pub2pad2, #sec3pub3pad3").css("display","");
                              $("#secpritec, #sec2pri2tec2, #sec3pri3tec3").css("display","");


                              $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                              $("#secprigen, #sec2pri2gen2, #sec3pri3gen3").css("display","");
                              $("#secpritin, #sec2pri2tin2, #sec3pri3tin3").css("display","");
                              $("#secpritag, #sec2pri2tag2, #sec3pri3tag3").css("display","");

                              // Pintamos de color las filas para resaltar la seleccion realizada.

                              $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                              $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");
                              $("#secpubgen #mis_td, #sec2pub2gen2 #mis_td, #sec3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpubgen #show, #sec2pub2gen2 #show, #sec3pub3gen3 #show").css("background-color","#F5D0A9");
                              $("#secpubtin #mis_td, #sec2pub2tin2 #mis_td, #sec3pub3tin3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpubtin #show, #sec2pub2tin2 #show, #sec3pub3tin3 #show").css("background-color","#F5D0A9");
                              $("#secpubtag #mis_td, #sec2pub2tag2 #mis_td, #sec3pub3tag3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpubtag #show, #sec2pub2tag2 #show, #sec3pub3tag3 #show").css("background-color","#F5D0A9");
                              $("#secpubptr #mis_td, #sec2pub2ptr2 #mis_td, #sec3pub3ptr3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpubptr #show, #sec2pub2ptr2 #show, #sec3pub3ptr3 #show").css("background-color","#F5D0A9");
                              $("#secpubtel #mis_td, #sec2pub2tel2 #mis_td, #sec3pub3tel3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpubtel #show, #sec2pub2tel2 #show, #sec3pub3tel3 #show").css("background-color","#F5D0A9");
                              $("#secpubcon #mis_td, #sec2pub2con2 #mis_td, #sec3pub3con3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpubcon #show, #sec2pub2con2 #show, #sec3pub3con3 #show").css("background-color","#F5D0A9");
                              $("#secpri #mis_td, #sec2pri2 #mis_td, #sec3pri3 #mis_td").css("background-color","#FAAC58");
                              $("#secpri #show, #sec2pri2 #show, #sec3pri3 #show").css("background-color","#FAAC58");
                              $("#secprigen #mis_td, #sec2pri2gen2 #mis_td, #sec3pri3gen3 #mis_td").css("background-color","#F5D0A9");
                              $("#secprigen #show, #sec2pri2gen2 #show, #sec3pri3gen3 #show").css("background-color","#F5D0A9");
                              $("#secpritin #mis_td, #sec2pri2tin2 #mis_td, #sec3pri3tin3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpritin #show, #sec2pri2tin2 #show, #sec3pri3tin3 #show").css("background-color","#F5D0A9");
                              $("#secpritag #mis_td, #sec2pri2tag2 #mis_td, #sec3pri3tag3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpritag #show, #sec2pri2tag2 #show, #sec3pri3tag3 #show").css("background-color","#F5D0A9");

                              $("#secpubtec #mis_td, #sec2pub2tec2 #mis_td, #sec3pub3tec3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpubtec #show, #sec2pub2tec2 #show, #sec3pub3tec3 #show").css("background-color","#F5D0A9");

                              $("#secpubcomu #mis_td, #sec2pub2comu2 #mis_td, #sec3pub3comu3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpubcomu #show, #sec2pub2comu2 #show, #sec3pub3comu3 #show").css("background-color","#F5D0A9");

                              $("#secpubpad #mis_td, #sec2pub2pad2 #mis_td, #sec3pub3pad3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpubpad #show, #sec2pub2pad2 #show, #sec3pub3pad3 #show").css("background-color","#F5D0A9");

                              $("#secpritec #mis_td, #sec2pri2tec2 #mis_td, #sec3pri3tec3 #mis_td").css("background-color","#F5D0A9");
                              $("#secpritec #show, #sec2pri2tec2 #show, #sec3pri3tec3 #show").css("background-color","#F5D0A9");

                        break;

                        case 'PUBLICO':

                              $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                              $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpubgen, #sec2pub2gen2, #sec3pub3gen3").css("display","");
                                          $("#secpubtin, #sec2pub2tin2, #sec3pub3tin3").css("display","");
                                          $("#secpubtag, #sec2pub2tag2, #sec3pub3tag3").css("display","");
                                          $("#secpubptr, #sec2pub2ptr2, #sec3pub3ptr3").css("display","");
                                          $("#secpubtel, #sec2pub2tel2, #sec3pub3tel3").css("display","");
                                          $("#secpubcon, #sec2pub2con2, #sec3pub3con3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secpubtec, #sec2pub2tec2, #sec3pub3tec3").css("display","");
                                          $("#secpubcomu, #sec2pub2comu2, #sec3pub3comu3").css("display","");
                                          $("#secpubpad, #sec2pub2pad2, #sec3pub3pad3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");
                                          $("#secpubgen #mis_td, #sec2pub2gen2 #mis_td, #sec3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubgen #show, #sec2pub2gen2 #show, #sec3pub3gen3 #show").css("background-color","#F5D0A9");
                                          $("#secpubtin #mis_td, #sec2pub2tin2 #mis_td, #sec3pub3tin3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubtin #show, #sec2pub2tin2 #show, #sec3pub3tin3 #show").css("background-color","#F5D0A9");
                                          $("#secpubtag #mis_td, #sec2pub2tag2 #mis_td, #sec3pub3tag3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubtag #show, #sec2pub2tag2 #show, #sec3pub3tag3 #show").css("background-color","#F5D0A9");
                                          $("#secpubptr #mis_td, #sec2pub2ptr2 #mis_td, #sec3pub3ptr3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubptr #show, #sec2pub2ptr2 #show, #sec3pub3ptr3 #show").css("background-color","#F5D0A9");
                                          $("#secpubtel #mis_td, #sec2pub2tel2 #mis_td, #sec3pub3tel3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubtel #show, #sec2pub2tel2 #show, #sec3pub3tel3 #show").css("background-color","#F5D0A9");
                                          $("#secpubcon #mis_td, #sec2pub2con2 #mis_td, #sec3pub3con3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubcon #show, #sec2pub2con2 #show, #sec3pub3con3 #show").css("background-color","#F5D0A9");
                                          $("#secpubtec #mis_td, #sec2pub2tec2 #mis_td, #sec3pub3tec3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubtec #show, #sec2pub2tec2 #show, #sec3pub3tec3 #show").css("background-color","#F5D0A9");

                                          $("#secpubcomu #mis_td, #sec2pub2comu2 #mis_td, #sec3pub3comu3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubcomu #show, #sec2pub2comu2 #show, #sec3pub3comu3 #show").css("background-color","#F5D0A9");

                                          $("#secpubpad #mis_td, #sec2pub2pad2 #mis_td, #sec3pub3pad3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubpad #show, #sec2pub2pad2 #show, #sec3pub3pad3 #show").css("background-color","#F5D0A9");




                                    break;

                                    case 'CONAFE (COMUNITARIA)':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpubgen, #sec2pub2gen2, #sec3pub3gen3").css("display","");
                                          $("#secpubtin, #sec2pub2tin2, #sec3pub3tin3").css("display","");
                                          $("#secpubtag, #sec2pub2tag2, #sec3pub3tag3").css("display","");
                                          $("#secpubptr, #sec2pub2ptr2, #sec3pub3ptr3").css("display","");
                                          $("#secpubtel, #sec2pub2tel2, #sec3pub3tel3").css("display","");
                                          $("#secpubcon, #sec2pub2con2, #sec3pub3con3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secpubtec, #sec2pub2tec2, #sec3pub3tec3").css("display","");
                                          $("#secpubcomu, #sec2pub2comu2, #sec3pub3comu3").css("display","");
                                          $("#secpubpad, #sec2pub2pad2, #sec3pub3pad3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");

                                          $("#secpubcon #mis_td, #sec2pub2con2 #mis_td, #sec3pub3con3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubcon #show, #sec2pub2con2 #show, #sec3pub3con3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'GENERAL':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpubgen, #sec2pub2gen2, #sec3pub3gen3").css("display","");
                                          $("#secpubtin, #sec2pub2tin2, #sec3pub3tin3").css("display","");
                                          $("#secpubtag, #sec2pub2tag2, #sec3pub3tag3").css("display","");
                                          $("#secpubptr, #sec2pub2ptr2, #sec3pub3ptr3").css("display","");
                                          $("#secpubtel, #sec2pub2tel2, #sec3pub3tel3").css("display","");
                                          $("#secpubcon, #sec2pub2con2, #sec3pub3con3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secpubtec, #sec2pub2tec2, #sec3pub3tec3").css("display","");
                                          $("#secpubcomu, #sec2pub2comu2, #sec3pub3comu3").css("display","");
                                          $("#secpubpad, #sec2pub2pad2, #sec3pub3pad3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");
                                          $("#secpubgen #mis_td, #sec2pub2gen2 #mis_td, #sec3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubgen #show, #sec2pub2gen2 #show, #sec3pub3gen3 #show").css("background-color","#F5D0A9");




                                    break;

                                    case 'PARA TRABAJADORES':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpubgen, #sec2pub2gen2, #sec3pub3gen3").css("display","");
                                          $("#secpubtin, #sec2pub2tin2, #sec3pub3tin3").css("display","");
                                          $("#secpubtag, #sec2pub2tag2, #sec3pub3tag3").css("display","");
                                          $("#secpubptr, #sec2pub2ptr2, #sec3pub3ptr3").css("display","");
                                          $("#secpubtel, #sec2pub2tel2, #sec3pub3tel3").css("display","");
                                          $("#secpubcon, #sec2pub2con2, #sec3pub3con3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secpubtec, #sec2pub2tec2, #sec3pub3tec3").css("display","");
                                          $("#secpubcomu, #sec2pub2comu2, #sec3pub3comu3").css("display","");
                                          $("#secpubpad, #sec2pub2pad2, #sec3pub3pad3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");

                                          $("#secpubptr #mis_td, #sec2pub2ptr2 #mis_td, #sec3pub3ptr3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubptr #show, #sec2pub2ptr2 #show, #sec3pub3ptr3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'TECNICA INDUSTRIAL':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpubgen, #sec2pub2gen2, #sec3pub3gen3").css("display","");
                                          $("#secpubtin, #sec2pub2tin2, #sec3pub3tin3").css("display","");
                                          $("#secpubtag, #sec2pub2tag2, #sec3pub3tag3").css("display","");
                                          $("#secpubptr, #sec2pub2ptr2, #sec3pub3ptr3").css("display","");
                                          $("#secpubtel, #sec2pub2tel2, #sec3pub3tel3").css("display","");
                                          $("#secpubcon, #sec2pub2con2, #sec3pub3con3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secpubtec, #sec2pub2tec2, #sec3pub3tec3").css("display","");
                                          $("#secpubcomu, #sec2pub2comu2, #sec3pub3comu3").css("display","");
                                          $("#secpubpad, #sec2pub2pad2, #sec3pub3pad3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");

                                          $("#secpubtin #mis_td, #sec2pub2tin2 #mis_td, #sec3pub3tin3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubtin #show, #sec2pub2tin2 #show, #sec3pub3tin3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'TECNICA AGROPECUARIA':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpubgen, #sec2pub2gen2, #sec3pub3gen3").css("display","");
                                          $("#secpubtin, #sec2pub2tin2, #sec3pub3tin3").css("display","");
                                          $("#secpubtag, #sec2pub2tag2, #sec3pub3tag3").css("display","");
                                          $("#secpubptr, #sec2pub2ptr2, #sec3pub3ptr3").css("display","");
                                          $("#secpubtel, #sec2pub2tel2, #sec3pub3tel3").css("display","");
                                          $("#secpubcon, #sec2pub2con2, #sec3pub3con3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secpubtec, #sec2pub2tec2, #sec3pub3tec3").css("display","");
                                          $("#secpubcomu, #sec2pub2comu2, #sec3pub3comu3").css("display","");
                                          $("#secpubpad, #sec2pub2pad2, #sec3pub3pad3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");

                                          $("#secpubtag #mis_td, #sec2pub2tag2 #mis_td, #sec3pub3tag3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubtag #show, #sec2pub2tag2 #show, #sec3pub3tag3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'TELESECUNDARIA':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpubgen, #sec2pub2gen2, #sec3pub3gen3").css("display","");
                                          $("#secpubtin, #sec2pub2tin2, #sec3pub3tin3").css("display","");
                                          $("#secpubtag, #sec2pub2tag2, #sec3pub3tag3").css("display","");
                                          $("#secpubptr, #sec2pub2ptr2, #sec3pub3ptr3").css("display","");
                                          $("#secpubtel, #sec2pub2tel2, #sec3pub3tel3").css("display","");
                                          $("#secpubcon, #sec2pub2con2, #sec3pub3con3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secpubtec, #sec2pub2tec2, #sec3pub3tec3").css("display","");
                                          $("#secpubcomu, #sec2pub2comu2, #sec3pub3comu3").css("display","");
                                          $("#secpubpad, #sec2pub2pad2, #sec3pub3pad3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");

                                          $("#secpubtel #mis_td, #sec2pub2tel2 #mis_td, #sec3pub3tel3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubtel #show, #sec2pub2tel2 #show, #sec3pub3tel3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'TECNICA':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpubgen, #sec2pub2gen2, #sec3pub3gen3").css("display","");
                                          $("#secpubtin, #sec2pub2tin2, #sec3pub3tin3").css("display","");
                                          $("#secpubtag, #sec2pub2tag2, #sec3pub3tag3").css("display","");
                                          $("#secpubptr, #sec2pub2ptr2, #sec3pub3ptr3").css("display","");
                                          $("#secpubtel, #sec2pub2tel2, #sec3pub3tel3").css("display","");
                                          $("#secpubcon, #sec2pub2con2, #sec3pub3con3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secpubtec, #sec2pub2tec2, #sec3pub3tec3").css("display","");
                                          $("#secpubcomu, #sec2pub2comu2, #sec3pub3comu3").css("display","");
                                          $("#secpubpad, #sec2pub2pad2, #sec3pub3pad3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");

                                          $("#secpubtec #mis_td, #sec2pub2tec2 #mis_td, #sec3pub3tec3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubtec #show, #sec2pub2tec2 #show, #sec3pub3tec3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'PARA ADULTOS':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpubgen, #sec2pub2gen2, #sec3pub3gen3").css("display","");
                                          $("#secpubtin, #sec2pub2tin2, #sec3pub3tin3").css("display","");
                                          $("#secpubtag, #sec2pub2tag2, #sec3pub3tag3").css("display","");
                                          $("#secpubptr, #sec2pub2ptr2, #sec3pub3ptr3").css("display","");
                                          $("#secpubtel, #sec2pub2tel2, #sec3pub3tel3").css("display","");
                                          $("#secpubcon, #sec2pub2con2, #sec3pub3con3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secpubtec, #sec2pub2tec2, #sec3pub3tec3").css("display","");
                                          $("#secpubcomu, #sec2pub2comu2, #sec3pub3comu3").css("display","");
                                          $("#secpubpad, #sec2pub2pad2, #sec3pub3pad3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");

                                          $("#secpubpad #mis_td, #sec2pub2pad2 #mis_td, #sec3pub3pad3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubpad #show, #sec2pub2pad2 #show, #sec3pub3pad3 #show").css("background-color","#F5D0A9");
                                    break;
                                    case 'COMUNITARIO':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpubgen, #sec2pub2gen2, #sec3pub3gen3").css("display","");
                                          $("#secpubtin, #sec2pub2tin2, #sec3pub3tin3").css("display","");
                                          $("#secpubtag, #sec2pub2tag2, #sec3pub3tag3").css("display","");
                                          $("#secpubptr, #sec2pub2ptr2, #sec3pub3ptr3").css("display","");
                                          $("#secpubtel, #sec2pub2tel2, #sec3pub3tel3").css("display","");
                                          $("#secpubcon, #sec2pub2con2, #sec3pub3con3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secpubtec, #sec2pub2tec2, #sec3pub3tec3").css("display","");
                                          $("#secpubcomu, #sec2pub2comu2, #sec3pub3comu3").css("display","");
                                          $("#secpubpad, #sec2pub2pad2, #sec3pub3pad3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#secpub #mis_td, #sec2pub2 #mis_td, #sec3pub3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpub #show, #sec2pub2 #show, #sec3pub3 #show").css("background-color","#FAAC58");

                                          $("#secpubcomu #mis_td, #sec2pub2comu2 #mis_td, #sec3pub3comu3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpubcomu #show, #sec2pub2comu2 #show, #sec3pub3comu3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;

                        case 'PRIVADO':

                              $("#secpri #mis_td, #sec2pri2 #mis_td, #sec3pri3 #mis_td").css("background-color","#FAAC58");
                              $("#secpri #show, #sec2pri2 #show, #sec3pri3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secprigen, #sec2pri2gen2, #sec3pri3gen3").css("display","");
                                          $("#secpritin, #sec2pri2tin2, #sec3pri3tin3").css("display","");
                                          $("#secpritag, #sec2pri2tag2, #sec3pri3tag3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.


                                          $("#secpri #mis_td, #sec2pri2 #mis_td, #sec3pri3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpri #show, #sec2pri2 #show, #sec3pri3 #show").css("background-color","#FAAC58");
                                          $("#secprigen #mis_td, #sec2pri2gen2 #mis_td, #sec3pri3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secprigen #show, #sec2pri2gen2 #show, #sec3pri3gen3 #show").css("background-color","#F5D0A9");
                                          $("#secpritin #mis_td, #sec2pri2tin2 #mis_td, #sec3pri3tin3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpritin #show, #sec2pri2tin2 #show, #sec3pri3tin3 #show").css("background-color","#F5D0A9");
                                          $("#secpritag #mis_td, #sec2pri2tag2 #mis_td, #sec3pri3tag3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpritag #show, #sec2pri2tag2 #show, #sec3pri3tag3 #show").css("background-color","#F5D0A9");

                                          $("#secpritec, #sec2pri2tec2, #sec3pri3tec3").css("display","");
                                          $("#secpritec #mis_td, #sec2pri2tec2 #mis_td, #sec3pri3tec3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpritec #show, #sec2pri2tec2 #show, #sec3pri3tec3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'GENERAL':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secprigen, #sec2pri2gen2, #sec3pri3gen3").css("display","");
                                          $("#secpritin, #sec2pri2tin2, #sec3pri3tin3").css("display","");
                                          $("#secpritag, #sec2pri2tag2, #sec3pri3tag3").css("display","");
                                          $("#secpritec, #sec2pri2tec2, #sec3pri3tec3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.


                                          $("#secpri #mis_td, #sec2pri2 #mis_td, #sec3pri3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpri #show, #sec2pri2 #show, #sec3pri3 #show").css("background-color","#FAAC58");
                                          $("#secprigen #mis_td, #sec2pri2gen2 #mis_td, #sec3pri3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secprigen #show, #sec2pri2gen2 #show, #sec3pri3gen3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'TECNICA INDUSTRIAL':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secprigen, #sec2pri2gen2, #sec3pri3gen3").css("display","");
                                          $("#secpritin, #sec2pri2tin2, #sec3pri3tin3").css("display","");
                                          $("#secpritag, #sec2pri2tag2, #sec3pri3tag3").css("display","");
                                          $("#secpritec, #sec2pri2tec2, #sec3pri3tec3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.


                                          $("#secpri #mis_td, #sec2pri2 #mis_td, #sec3pri3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpri #show, #sec2pri2 #show, #sec3pri3 #show").css("background-color","#FAAC58");

                                          $("#secpritin #mis_td, #sec2pri2tin2 #mis_td, #sec3pri3tin3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpritin #show, #sec2pri2tin2 #show, #sec3pri3tin3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'TECNICA AGROPECUARIA':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secprigen, #sec2pri2gen2, #sec3pri3gen3").css("display","");
                                          $("#secpritin, #sec2pri2tin2, #sec3pri3tin3").css("display","");
                                          $("#secpritag, #sec2pri2tag2, #sec3pri3tag3").css("display","");
                                          $("#secpritec, #sec2pri2tec2, #sec3pri3tec3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.


                                          $("#secpri #mis_td, #sec2pri2 #mis_td, #sec3pri3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpri #show, #sec2pri2 #show, #sec3pri3 #show").css("background-color","#FAAC58");

                                          $("#secpritag #mis_td, #sec2pri2tag2 #mis_td, #sec3pri3tag3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpritag #show, #sec2pri2tag2 #show, #sec3pri3tag3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'TECNICA':

                                          // Desplegamos hijos y nietos
                                          $("#secpub, #sec2pub2, #sec3pub3").css("display","");
                                          $("#secpri, #sec2pri2, #sec3pri3").css("display","");
                                          $("#secprigen, #sec2pri2gen2, #sec3pri3gen3").css("display","");
                                          $("#secpritin, #sec2pri2tin2, #sec3pri3tin3").css("display","");
                                          $("#secpritag, #sec2pri2tag2, #sec3pri3tag3").css("display","");
                                          $("#secpritec, #sec2pri2tec2, #sec3pri3tec3").css("display","");
                                          // Pintamos de color las filas para resaltar la seleccion realizada.


                                          $("#secpri #mis_td, #sec2pri2 #mis_td, #sec3pri3 #mis_td").css("background-color","#FAAC58");
                                          $("#secpri #show, #sec2pri2 #show, #sec3pri3 #show").css("background-color","#FAAC58");


                                          $("#secpritec #mis_td, #sec2pri2tec2 #mis_td, #sec3pri3tec3 #mis_td").css("background-color","#F5D0A9");
                                          $("#secpritec #show, #sec2pri2tec2 #show, #sec3pri3tec3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;
                  }
            break;

            case 'MEDIA SUPERIOR':

                  $("#bac #mis_td, #bac2 #mis_td, #bac3 #mis_td").css('background-color','#FF8000');
                  $("#bac #show, #bac2 #show, #bac3 #show").css('background-color','#FF8000');

                  switch(sostenimiento)
                  {
                        case 'TODOS':
                              // Desplegamos hijos y nietos
                              $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                              $("#bacpubbte, #bac2pub2bte2, #bac3pub3bte3").css("display","");
                              $("#bacpubpte, #bac2pub2pte2, #bac3pub3pte3").css("display","");
                              $("#bacpubgen, #bac2pub2gen2, #bac3pub3gen3").css("display","");
                              $("#bacpubcomu, #bac2pub2comu2, #bac3pub3comu3").css("display","");
                              $("#bacpubadm, #bac2pub2adm2, #bac3pub3adm3").css("display","");


                              $("#bacpri, #bac2pri2, #bac3pri3").css("display","");
                              $("#bacpribge, #bac2pri2bge2, #bac3pri3bge3").css("display","");
                              $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                              $("#bacpripte, #bac2pri2pte2, #bac3pri3pte3").css("display","");

                              $("#bacprigen, #bac2pri2gen2, #bac3pri3gen3").css("display","");
                              $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                              $("#bacpriadm, #bac2pri2adm2, #bac3pri3adm3").css("display","");

                              $("#bacaut, #bac2aut2, #bac3aut3").css("display","");
                              $("#bacautbge, #bac2aut2bge2, #bac3aut3bge3").css("display","");
                              $("#bacautpte, #bac2aut2pte2, #bac3aut3pte3").css("display","");

                              $("#bacautgen, #bac2aut2gen2, #bac3aut3gen3").css("display","");
                              $("#bacautadm, #bac2aut2adm2, #bac3aut3adm3").css("display","");
                              $("#bacautbte, #bac2aut2bte2, #bac3aut3bte3").css("display","");


                              // Pintamos de color las filas para resaltar la seleccion realizada.
                              $("#bacpub #mis_td, #bac2pub2 #mis_td, #bac3pub3 #mis_td").css("background-color","#FAAC58");
                              $("#bacpub #show, #bac2pub2 #show, #bac3pub3 #show").css("background-color","#FAAC58");
                              $("#bacpubbge #mis_td, #bac2pub2bge2 #mis_td, #bac3pub3bge3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacpubbge #show, #bac2pub2bge2 #show, #bac3pub3bge3 #show").css("background-color","#F5D0A9");
                              $("#bacpubbte #mis_td, #bac2pub2bte2 #mis_td, #bac3pub3bte3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacpubbte #show, #bac2pub2bte2 #show, #bac3pub3bte3 #show").css("background-color","#F5D0A9");
                              $("#bacpubpte #mis_td, #bac2pub2pte2 #mis_td, #bac3pub3pte3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacpubpte #show, #bac2pub2pte2 #show, #bac3pub3pte3 #show").css("background-color","#F5D0A9");

                              $("#bacpubgen #mis_td, #bac2pub2gen2 #mis_td, #bac3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacpubgen #show, #bac2pub2gen2 #show, #bac3pub3gen3 #show").css("background-color","#F5D0A9");
                              $("#bacpubcomu #mis_td, #bac2pub2comu2 #mis_td, #bac3pub3comu3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacpubcomu #show, #bac2pub2comu2 #show, #bac3pub3comu3 #show").css("background-color","#F5D0A9");
                              $("#bacpubadm #mis_td, #bac2pub2adm2 #mis_td, #bac3pub3adm3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacpubadm #show, #bac2pub2adm2 #show, #bac3pub3adm3 #show").css("background-color","#F5D0A9");

                              $("#bacpri #mis_td, #bac2pri2 #mis_td, #bac3pri3 #mis_td").css("background-color","#FAAC58");
                              $("#bacpri #show, #bac2pri2 #show, #bac3pri3 #show").css("background-color","#FAAC58");
                              $("#bacpribge #mis_td, #bac2pri2bge2 #mis_td, #bac3pri3bge3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacpribge #show, #bac2pri2bge2 #show, #bac3pri3bge3 #show").css("background-color","#F5D0A9");
                              $("#bacpribte #mis_td, #bac2pri2bte2 #mis_td, #bac3pri3bte3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacpribte #show, #bac2pri2bte2 #show, #bac3pri3bte3 #show").css("background-color","#F5D0A9");
                              $("#bacpripte #mis_td, #bac2pri2pte2 #mis_td, #bac3pri3pte3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacpripte #show, #bac2pri2pte2 #show, #bac3pri3pte3 #show").css("background-color","#F5D0A9");

                              $("#bacprigen #mis_td, #bac2pri2gen2 #mis_td, #bac3pri3gen3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacprigen #show, #bac2pri2gen2 #show, #bac3pri3gen3 #show").css("background-color","#F5D0A9");
                              $("#bacpribte #mis_td, #bac2pri2bte2 #mis_td, #bac3pri3bte3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacpribte #show, #bac2pri2bte2 #show, #bac3pri3bte3 #show").css("background-color","#F5D0A9");
                              $("#bacpriadm #mis_td, #bac2pri2adm2 #mis_td, #bac3pri3adm3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacpriadm #show, #bac2pri2adm2 #show, #bac3pri3adm3 #show").css("background-color","#F5D0A9");

                              $("#bacaut #mis_td, #bac2aut2 #mis_td, #bac3aut3 #mis_td").css("background-color","#FAAC58");
                              $("#bacaut #show, #bac2aut2 #show, #bac3aut3 #show").css("background-color","#FAAC58");
                              $("#bacautbge #mis_td, #bac2aut2bge2 #mis_td, #bac3aut3bge3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacautbge #show, #bac2aut2bge2 #show, #bac3aut3bge3 #show").css("background-color","#F5D0A9");
                              $("#bacautpte #mis_td, #bac2aut2pte2 #mis_td, #bac3aut3pte3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacautpte #show, #bac2aut2pte2 #show, #bac3aut3pte3 #show").css("background-color","#F5D0A9");

                              $("#bacautgen #mis_td, #bac2aut2gen2 #mis_td, #bac3aut3gen3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacautgen #show, #bac2aut2gen2 #show, #bac3aut3gen3 #show").css("background-color","#F5D0A9");
                              $("#bacautadm #mis_td, #bac2aut2adm2 #mis_td, #bac3aut3adm3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacautadm #show, #bac2aut2adm2 #show, #bac3aut3adm3 #show").css("background-color","#F5D0A9");
                              $("#bacautbte #mis_td, #bac2aut2bte2 #mis_td, #bac3aut3bte3 #mis_td").css("background-color","#F5D0A9");
                              $("#bacautbte #show, #bac2aut2bte2 #show, #bac3aut3bte3 #show").css("background-color","#F5D0A9");
                        break;

                        case 'PUBLICO':

                              $("#bacpub #mis_td, #bac2pub2 #mis_td, #bac3pub3 #mis_td").css("background-color","#FAAC58");
                              $("#bacpub #show, #bac2pub2 #show, #bac3pub3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");
                                          $("#bacpubbte, #bac2pub2bte2, #bac3pub3bte3").css("display","");
                                          $("#bacpubpte, #bac2pub2pte2, #bac3pub3pte3").css("display","");
                                          $("#bacpubgen, #bac2pub2gen2, #bac3pub3gen3").css("display","");
                                          $("#bacpubcomu, #bac2pub2comu2, #bac3pub3comu3").css("display","");
                                          $("#bacpubadm, #bac2pub2adm2, #bac3pub3adm3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#bacpubbge #mis_td, #bac2pub2bge2 #mis_td, #bac3pub3bge3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubbge #show, #bac2pub2bge2 #show, #bac3pub3bge3 #show").css("background-color","#F5D0A9");
                                          $("#bacpubbte #mis_td, #bac2pub2bte2 #mis_td, #bac3pub3bte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubbte #show, #bac2pub2bte2 #show, #bac3pub3bte3 #show").css("background-color","#F5D0A9");
                                          $("#bacpubpte #mis_td, #bac2pub2pte2 #mis_td, #bac3pub3pte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubpte #show, #bac2pub2pte2 #show, #bac3pub3pte3 #show").css("background-color","#F5D0A9");

                                          $("#bacpubgen #mis_td, #bac2pub2gen2 #mis_td, #bac3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubgen #show, #bac2pub2gen2 #show, #bac3pub3gen3 #show").css("background-color","#F5D0A9");
                                          $("#bacpubcomu #mis_td, #bac2pub2comu2 #mis_td, #bac3pub3comu3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubcomu #show, #bac2pub2comu2 #show, #bac3pub3comu3 #show").css("background-color","#F5D0A9");
                                          $("#bacpubadm #mis_td, #bac2pub2adm2 #mis_td, #bac3pub3adm3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubadm #show, #bac2pub2adm2 #show, #bac3pub3adm3 #show").css("background-color","#F5D0A9");



                                    break;


                                    case 'BACHILLERATO GENERAL':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");
                                          $("#bacpubbte, #bac2pub2bte2, #bac3pub3bte3").css("display","");
                                          $("#bacpubpte, #bac2pub2pte2, #bac3pub3pte3").css("display","");
                                          $("#bacpubgen, #bac2pub2gen2, #bac3pub3gen3").css("display","");
                                          $("#bacpubcomu, #bac2pub2comu2, #bac3pub3comu3").css("display","");
                                          $("#bacpubadm, #bac2pub2adm2, #bac3pub3adm3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#bacpubgen #mis_td, #bac2pub2gen2 #mis_td, #bac3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubgen #show, #bac2pub2gen2 #show, #bac3pub3gen3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'BACHILLERATO TECNOLOGICO':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");
                                          $("#bacpubbte, #bac2pub2bte2, #bac3pub3bte3").css("display","");
                                          $("#bacpubpte, #bac2pub2pte2, #bac3pub3pte3").css("display","");
                                          $("#bacpubgen, #bac2pub2gen2, #bac3pub3gen3").css("display","");
                                          $("#bacpubcomu, #bac2pub2comu2, #bac3pub3comu3").css("display","");
                                          $("#bacpubadm, #bac2pub2adm2, #bac3pub3adm3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.


                                          $("#bacpubbte #mis_td, #bac2pub2bte2 #mis_td, #bac3pub3bte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubbte #show, #bac2pub2bte2 #show, #bac3pub3bte3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'PROFESIONAL TECNICO':

                                         // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");
                                          $("#bacpubbte, #bac2pub2bte2, #bac3pub3bte3").css("display","");
                                          $("#bacpubpte, #bac2pub2pte2, #bac3pub3pte3").css("display","");
                                          $("#bacpubgen, #bac2pub2gen2, #bac3pub3gen3").css("display","");
                                          $("#bacpubcomu, #bac2pub2comu2, #bac3pub3comu3").css("display","");
                                          $("#bacpubadm, #bac2pub2adm2, #bac3pub3adm3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#bacpubpte #mis_td, #bac2pub2pte2 #mis_td, #bac3pub3pte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubpte #show, #bac2pub2pte2 #show, #bac3pub3pte3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'TECNOLOGICO':

                                         // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");
                                          $("#bacpubbte, #bac2pub2bte2, #bac3pub3bte3").css("display","");
                                          $("#bacpubpte, #bac2pub2pte2, #bac3pub3pte3").css("display","");
                                          $("#bacpubgen, #bac2pub2gen2, #bac3pub3gen3").css("display","");
                                          $("#bacpubcomu, #bac2pub2comu2, #bac3pub3comu3").css("display","");
                                          $("#bacpubadm, #bac2pub2adm2, #bac3pub3adm3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#bacpubpte #mis_td, #bac2pub2pte2 #mis_td, #bac3pub3pte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubpte #show, #bac2pub2pte2 #show, #bac3pub3pte3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'GENERAL':

                                         // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");
                                          $("#bacpubbte, #bac2pub2bte2, #bac3pub3bte3").css("display","");
                                          $("#bacpubpte, #bac2pub2pte2, #bac3pub3pte3").css("display","");
                                          $("#bacpubgen, #bac2pub2gen2, #bac3pub3gen3").css("display","");
                                          $("#bacpubcomu, #bac2pub2comu2, #bac3pub3comu3").css("display","");
                                          $("#bacpubadm, #bac2pub2adm2, #bac3pub3adm3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#bacpubgen #mis_td, #bac2pub2gen2 #mis_td, #bac3pub3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubgen #show, #bac2pub2gen2 #show, #bac3pub3gen3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'COMUNITARIO':

                                         // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");
                                          $("#bacpubbte, #bac2pub2bte2, #bac3pub3bte3").css("display","");
                                          $("#bacpubpte, #bac2pub2pte2, #bac3pub3pte3").css("display","");
                                          $("#bacpubgen, #bac2pub2gen2, #bac3pub3gen3").css("display","");
                                          $("#bacpubcomu, #bac2pub2comu2, #bac3pub3comu3").css("display","");
                                          $("#bacpubadm, #bac2pub2adm2, #bac3pub3adm3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#bacpubcomu #mis_td, #bac2pub2comu2 #mis_td, #bac3pub3comu3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubcomu #show, #bac2pub2comu2 #show, #bac3pub3comu3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'ADMINISTRATIVO':

                                         // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");
                                          $("#bacpubbte, #bac2pub2bte2, #bac3pub3bte3").css("display","");
                                          $("#bacpubpte, #bac2pub2pte2, #bac3pub3pte3").css("display","");
                                          $("#bacpubgen, #bac2pub2gen2, #bac3pub3gen3").css("display","");
                                          $("#bacpubcomu, #bac2pub2comu2, #bac3pub3comu3").css("display","");
                                          $("#bacpubadm, #bac2pub2adm2, #bac3pub3adm3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#bacpubadm #mis_td, #bac2pub2adm2 #mis_td, #bac3pub3adm3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpubadm #show, #bac2pub2adm2 #show, #bac3pub3adm3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;

                        case 'PRIVADO':

                              $("#bacpri #mis_td, #bac2pri2 #mis_td, #bac3pri3 #mis_td").css("background-color","#FAAC58");
                              $("#bacpri #show, #bac2pri2 #show, #bac3pri3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");
                                          $("#bacpribge, #bac2pri2bge2, #bac3pri3bge3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpripte, #bac2pri2pte2, #bac3pri3pte3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.



                                          $("#bacpribge #mis_td, #bac2pri2bge2 #mis_td, #bac3pri3bge3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpribge #show, #bac2pri2bge2 #show, #bac3pri3bge3 #show").css("background-color","#F5D0A9");
                                          $("#bacpribte #mis_td, #bac2pri2bte2 #mis_td, #bac3pri3bte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpribte #show, #bac2pri2bte2 #show, #bac3pri3bte3 #show").css("background-color","#F5D0A9");
                                          $("#bacpripte #mis_td, #bac2pri2pte2 #mis_td, #bac3pri3pte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpripte #show, #bac2pri2pte2 #show, #bac3pri3pte3 #show").css("background-color","#F5D0A9");

                                          $("#bacprigen, #bac2pri2gen2, #bac3pri3gen3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpriadm, #bac2pri2adm2, #bac3pri3adm3").css("display","");

                                          $("#bacprigen #mis_td, #bac2pri2gen2 #mis_td, #bac3pri3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacprigen #show, #bac2pri2gen2 #show, #bac3pri3gen3 #show").css("background-color","#F5D0A9");
                                          $("#bacpribte #mis_td, #bac2pri2bte2 #mis_td, #bac3pri3bte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpribte #show, #bac2pri2bte2 #show, #bac3pri3bte3 #show").css("background-color","#F5D0A9");
                                          $("#bacpriadm #mis_td, #bac2pri2adm2 #mis_td, #bac3pri3adm3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpriadm #show, #bac2pri2adm2 #show, #bac3pri3adm3 #show").css("background-color","#F5D0A9");





                                    break;

                                    case 'BACHILLERATO GENERAL':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");
                                          $("#bacpribge, #bac2pri2bge2, #bac3pri3bge3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpripte, #bac2pri2pte2, #bac3pri3pte3").css("display","");
                                          $("#bacprigen, #bac2pri2gen2, #bac3pri3gen3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpriadm, #bac2pri2adm2, #bac3pri3adm3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.



                                          $("#bacpribge #mis_td, #bac2pri2bge2 #mis_td, #bac3pri3bge3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpribge #show, #bac2pri2bge2 #show, #bac3pri3bge3 #show").css("background-color","#F5D0A9");




                                    break;

                                    case 'BACHILLERATO TECNOLOGICO':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");
                                          $("#bacpribge, #bac2pri2bge2, #bac3pri3bge3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpripte, #bac2pri2pte2, #bac3pri3pte3").css("display","");
                                          $("#bacprigen, #bac2pri2gen2, #bac3pri3gen3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpriadm, #bac2pri2adm2, #bac3pri3adm3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.




                                          $("#bacpribte #mis_td, #bac2pri2bte2 #mis_td, #bac3pri3bte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpribte #show, #bac2pri2bte2 #show, #bac3pri3bte3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'PROFESIONAL TECNICO':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");
                                          $("#bacpribge, #bac2pri2bge2, #bac3pri3bge3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpripte, #bac2pri2pte2, #bac3pri3pte3").css("display","");
                                          $("#bacprigen, #bac2pri2gen2, #bac3pri3gen3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpriadm, #bac2pri2adm2, #bac3pri3adm3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#bacpripte #mis_td, #bac2pri2pte2 #mis_td, #bac3pri3pte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpripte #show, #bac2pri2pte2 #show, #bac3pri3pte3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'GENERAL':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");
                                          $("#bacpribge, #bac2pri2bge2, #bac3pri3bge3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpripte, #bac2pri2pte2, #bac3pri3pte3").css("display","");
                                          $("#bacprigen, #bac2pri2gen2, #bac3pri3gen3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpriadm, #bac2pri2adm2, #bac3pri3adm3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#bacprigen #mis_td, #bac2pri2gen2 #mis_td, #bac3pri3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacprigen #show, #bac2pri2gen2 #show, #bac3pri3gen3 #show").css("background-color","#F5D0A9");
                                    break;

                                    case 'ADMINISTRATIVO':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");
                                          $("#bacpribge, #bac2pri2bge2, #bac3pri3bge3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpripte, #bac2pri2pte2, #bac3pri3pte3").css("display","");
                                          $("#bacprigen, #bac2pri2gen2, #bac3pri3gen3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpriadm, #bac2pri2adm2, #bac3pri3adm3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#bacpriadm #mis_td, #bac2pri2adm2 #mis_td, #bac3pri3adm3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpriadm #show, #bac2pri2adm2 #show, #bac3pri3adm3 #show").css("background-color","#F5D0A9");
                                    break;

                                    case 'TECNOLOGICO':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");
                                          $("#bacpribge, #bac2pri2bge2, #bac3pri3bge3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpripte, #bac2pri2pte2, #bac3pri3pte3").css("display","");
                                          $("#bacprigen, #bac2pri2gen2, #bac3pri3gen3").css("display","");
                                          $("#bacpribte, #bac2pri2bte2, #bac3pri3bte3").css("display","");
                                          $("#bacpriadm, #bac2pri2adm2, #bac3pri3adm3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.




                                          $("#bacpribte #mis_td, #bac2pri2bte2 #mis_td, #bac3pri3bte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacpribte #show, #bac2pri2bte2 #show, #bac3pri3bte3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;

                        case 'AUTONOMO':

                              $("#bacaut #mis_td, #bac2aut2 #mis_td, #bac3aut3 #mis_td").css("background-color","#FAAC58");
                              $("#bacaut #show, #bac2aut2 #show, #bac3aut3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");
                                          $("#bacautbge, #bac2aut2bge2, #bac3aut3bge3").css("display","");
                                          $("#bacautpte, #bac2aut2pte2, #bac3aut3pte3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada


                                          $("#bacautbge #mis_td, #bac2aut2bge2 #mis_td, #bac3aut3bge3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacautbge #show, #bac2aut2bge2 #show, #bac3aut3bge3 #show").css("background-color","#F5D0A9");
                                          $("#bacautpte #mis_td, #bac2aut2pte2 #mis_td, #bac3aut3pte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacautpte #show, #bac2aut2pte2 #show, #bac3aut3pte3 #show").css("background-color","#F5D0A9");

                                          $("#bacautgen, #bac2aut2gen2, #bac3aut3gen3").css("display","");
                                          $("#bacautadm, #bac2aut2adm2, #bac3aut3adm3").css("display","");
                                          $("#bacautbte, #bac2aut2bte2, #bac3aut3bte3").css("display","");

                                          $("#bacautgen #mis_td, #bac2aut2gen2 #mis_td, #bac3aut3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacautgen #show, #bac2aut2gen2 #show, #bac3aut3gen3 #show").css("background-color","#F5D0A9");
                                          $("#bacautadm #mis_td, #bac2aut2adm2 #mis_td, #bac3aut3adm3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacautadm #show, #bac2aut2adm2 #show, #bac3aut3adm3 #show").css("background-color","#F5D0A9");
                                          $("#bacautbte #mis_td, #bac2aut2bte2 #mis_td, #bac3aut3bte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacautbte #show, #bac2aut2bte2 #show, #bac3aut3bte3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'BACHILLERATO GENERAL':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");
                                          $("#bacautbge, #bac2aut2bge2, #bac3aut3bge3").css("display","");
                                          $("#bacautpte, #bac2aut2pte2, #bac3aut3pte3").css("display","");
                                          $("#bacautgen, #bac2aut2gen2, #bac3aut3gen3").css("display","");
                                          $("#bacautadm, #bac2aut2adm2, #bac3aut3adm3").css("display","");
                                          $("#bacautbte, #bac2aut2bte2, #bac3aut3bte3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada


                                          $("#bacautbge #mis_td, #bac2aut2bge2 #mis_td, #bac3aut3bge3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacautbge #show, #bac2aut2bge2 #show, #bac3aut3bge3 #show").css("background-color","#F5D0A9");



                                    break;


                                    case 'PROFESIONAL TECNICO':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");
                                          $("#bacautbge, #bac2aut2bge2, #bac3aut3bge3").css("display","");
                                          $("#bacautpte, #bac2aut2pte2, #bac3aut3pte3").css("display","");
                                          $("#bacautgen, #bac2aut2gen2, #bac3aut3gen3").css("display","");
                                          $("#bacautadm, #bac2aut2adm2, #bac3aut3adm3").css("display","");
                                          $("#bacautbte, #bac2aut2bte2, #bac3aut3bte3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada
                                          $("#bacautpte #mis_td, #bac2aut2pte2 #mis_td, #bac3aut3pte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacautpte #show, #bac2aut2pte2 #show, #bac3aut3pte3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'ADMINISTRATIVO':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");
                                          $("#bacautbge, #bac2aut2bge2, #bac3aut3bge3").css("display","");
                                          $("#bacautpte, #bac2aut2pte2, #bac3aut3pte3").css("display","");
                                          $("#bacautgen, #bac2aut2gen2, #bac3aut3gen3").css("display","");
                                          $("#bacautadm, #bac2aut2adm2, #bac3aut3adm3").css("display","");
                                          $("#bacautbte, #bac2aut2bte2, #bac3aut3bte3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada
                                          $("#bacautadm #mis_td, #bac2aut2adm2 #mis_td, #bac3aut3adm3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacautadm #show, #bac2aut2adm2 #show, #bac3aut3adm3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'GENERAL':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");
                                          $("#bacautbge, #bac2aut2bge2, #bac3aut3bge3").css("display","");
                                          $("#bacautpte, #bac2aut2pte2, #bac3aut3pte3").css("display","");
                                          $("#bacautgen, #bac2aut2gen2, #bac3aut3gen3").css("display","");
                                          $("#bacautadm, #bac2aut2adm2, #bac3aut3adm3").css("display","");
                                          $("#bacautbte, #bac2aut2bte2, #bac3aut3bte3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada
                                          $("#bacautgen #mis_td, #bac2aut2gen2 #mis_td, #bac3aut3gen3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacautgen #show, #bac2aut2gen2 #show, #bac3aut3gen3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'TECNOLOGICO':

                                          // Desplegamos hijos y nietos
                                          $("#bacpub, #bac2pub2, #bac3pub3").css("display","");

                                          $("#bacpri, #bac2pri2, #bac3pri3").css("display","");

                                          $("#bacaut, #bac2aut2, #bac3aut3").css("display","");
                                          $("#bacautbge, #bac2aut2bge2, #bac3aut3bge3").css("display","");
                                          $("#bacautpte, #bac2aut2pte2, #bac3aut3pte3").css("display","");
                                          $("#bacautgen, #bac2aut2gen2, #bac3aut3gen3").css("display","");
                                          $("#bacautadm, #bac2aut2adm2, #bac3aut3adm3").css("display","");
                                          $("#bacautbte, #bac2aut2bte2, #bac3aut3bte3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada

                                          $("#bacautbte #mis_td, #bac2aut2bte2 #mis_td, #bac3aut3bte3 #mis_td").css("background-color","#F5D0A9");
                                          $("#bacautbte #show, #bac2aut2bte2 #show, #bac3aut3bte3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;
                  }
            break;

            case 'SUPERIOR':

                  $("#sup #mis_td, #sup2 #mis_td, #sup3 #mis_td").css('background-color','#FF8000');
                  $("#sup #show, #sup2 #show, #sup3 #show").css('background-color','#FF8000');

                  switch(sostenimiento)
                  {
                        case 'TODOS':
                              // Desplegamos hijos y nietos
                              $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");
                              $("#supuytpub, #sup2uyt2pub2, #sup3uyt3pub3").css("display","");
                              $("#supuytpubest, #sup2uyt2pub2est2, #sup3uyt3pub3est3").css("display","");
                              $("#supuytpubfed, #sup2uyt2pub2fed2, #sup3uyt3pub3fed3").css("display","");
                              $("#supuytpri, #sup2uyt2pri2, #sup3uyt3pri3").css("display","");
                              $("#supuytaut, #sup2uyt2aut2, #sup3uyt3aut3").css("display","");

                              $("#supnor, #sup2nor2, #sup3nor3").css("display","");
                              $("#supnorpub, #sup2nor2pub2, #sup3nor3pub3").css("display","");
                              $("#supnorpubest, #sup2nor2pub2est2, #sup3nor3pub3est3").css("display","");
                              $("#supnorpubfed, #sup2nor2pub2fed2, #sup3nor3pub3fed3").css("display","");
                              $("#supnorpri, #sup2nor2pri2, #sup3nor3pri3").css("display","");

                              $("#suppos, #sup2pos2, #sup3pos3").css("display","");
                              $("#suppospub, #sup2pos2pub2, #sup3pos3pub3").css("display","");
                              $("#suppospubest, #sup2pos2pub2est2, #sup3pos3pub3est3").css("display","");
                              $("#suppospubfed, #sup2pos2pub2fed2, #sup3pos3pub3fed3").css("display","");
                              $("#suppospri, #sup2pos2pri2, #sup3pos3pri3").css("display","");
                              $("#supposaut, #sup2pos2aut2, #sup3pos3aut3").css("display","");

                              // Pintamos de color las filas para resaltar la seleccion realizada.
                              $("#supuyt #mis_td, #sup2uyt2 #mis_td, #sup3uyt3 #mis_td").css("background-color","#FAAC58");
                              $("#supuyt #show, #sup2uyt2 #show, #sup3uyt3 #show").css("background-color","#FAAC58");
                              $("#supuytpub #mis_td, #sup2uyt2pub2 #mis_td, #sup3uyt3pub3 #mis_td").css("background-color","#F5D0A9");
                              $("#supuytpub #show, #sup2uyt2pub2 #show, #sup3uyt3pub3 #show").css("background-color","#F5D0A9");
                              $("#supuytpri #mis_td, #sup2uyt2pri2 #mis_td, #sup3uyt3pri3 #mis_td").css("background-color","#F5D0A9");
                              $("#supuytpri #show, #sup2uyt2pri2 #show, #sup3uyt3pri3 #show").css("background-color","#F5D0A9");
                              $("#supuytaut #mis_td, #sup2uyt2aut2 #mis_td, #sup3uyt3aut3 #mis_td").css("background-color","#F5D0A9");
                              $("#supuytaut #show, #sup2uyt2aut2 #show, #sup3uyt3aut3 #show").css("background-color","#F5D0A9");

                              $("#supnor #mis_td, #sup2nor2 #mis_td, #sup3nor3 #mis_td").css("background-color","#FAAC58");
                              $("#supnor #show, #sup2nor2 #show, #sup3nor3 #show").css("background-color","#FAAC58");
                              $("#supnorpub #mis_td, #sup2nor2pub2 #mis_td, #sup3nor3pub3 #mis_td").css("background-color","#F5D0A9");
                              $("#supnorpub #show, #sup2nor2pub2 #show, #sup3nor3pub3 #show").css("background-color","#F5D0A9");
                              $("#supnorpri #mis_td, #sup2nor2pri2 #mis_td, #sup3nor3pri3 #mis_td").css("background-color","#F5D0A9");
                              $("#supnorpri #show, #sup2nor2pri2 #show, #sup3nor3pri3 #show").css("background-color","#F5D0A9");

                              $("#suppos #mis_td, #sup2pos2 #mis_td, #sup3pos3 #mis_td").css("background-color","#FAAC58");
                              $("#suppos #show, #sup2pos2 #show, #sup3pos3 #show").css("background-color","#FAAC58");
                              $("#suppospub #mis_td, #sup2pos2pub2 #mis_td, #sup3pos3pub3 #mis_td").css("background-color","#F5D0A9");
                              $("#suppospub #show, #sup2pos2pub2 #show, #sup3pos3pub3 #show").css("background-color","#F5D0A9");
                              $("#suppospri #mis_td, #sup2pos2pri2 #mis_td, #sup3pos3pri3 #mis_td").css("background-color","#F5D0A9");
                              $("#suppospri #show, #sup2pos2pri2 #show, #sup3pos3pri3 #show").css("background-color","#F5D0A9");
                              $("#supposaut #mis_td, #sup2pos2aut2 #mis_td, #sup3pos3aut3 #mis_td").css("background-color","#F5D0A9");
                              $("#supposaut #show, #sup2pos2aut2 #show, #sup3pos3aut3 #show").css("background-color","#F5D0A9");

                        break;

                        case 'PUBLICO':



                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");
                                          $("#supuytpub, #sup2uyt2pub2, #sup3uyt3pub3").css("display","");
                                          $("#supuytpubest, #sup2uyt2pub2est2, #sup3uyt3pub3est3").css("display","");
                                          $("#supuytpubfed, #sup2uyt2pub2fed2, #sup3uyt3pub3fed3").css("display","");
                                          $("#supuytpri, #sup2uyt2pri2, #sup3uyt3pri3").css("display","");
                                          $("#supuytaut, #sup2uyt2aut2, #sup3uyt3aut3").css("display","");

                                          $("#supnor, #sup2nor2, #sup3nor3").css("display","");
                                          $("#supnorpub, #sup2nor2pub2, #sup3nor3pub3").css("display","");
                                          $("#supnorpubest, #sup2nor2pub2est2, #sup3nor3pub3est3").css("display","");
                                          $("#supnorpubfed, #sup2nor2pub2fed2, #sup3nor3pub3fed3").css("display","");
                                          $("#supnorpri, #sup2nor2pri2, #sup3nor3pri3").css("display","");

                                          $("#suppos, #sup2pos2, #sup3pos3").css("display","");
                                          $("#suppospub, #sup2pos2pub2, #sup3pos3pub3").css("display","");
                                          $("#suppospubest, #sup2pos2pub2est2, #sup3pos3pub3est3").css("display","");
                                          $("#suppospubfed, #sup2pos2pub2fed2, #sup3pos3pub3fed3").css("display","");
                                          $("#suppospri, #sup2pos2pri2, #sup3pos3pri3").css("display","");
                                          $("#supposaut, #sup2pos2aut2, #sup3pos3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#supuyt #mis_td, #sup2uyt2 #mis_td, #sup3uyt3 #mis_td").css("background-color","#FAAC58");
                                          $("#supuyt #show, #sup2uyt2 #show, #sup3uyt3 #show").css("background-color","#FAAC58");
                                          $("#supuytpub #mis_td, #sup2uyt2pub2 #mis_td, #sup3uyt3pub3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supuytpub #show, #sup2uyt2pub2 #show, #sup3uyt3pub3 #show").css("background-color","#F5D0A9");


                                          $("#supnor #mis_td, #sup2nor2 #mis_td, #sup3nor3 #mis_td").css("background-color","#FAAC58");
                                          $("#supnor #show, #sup2nor2 #show, #sup3nor3 #show").css("background-color","#FAAC58");
                                          $("#supnorpub #mis_td, #sup2nor2pub2 #mis_td, #sup3nor3pub3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supnorpub #show, #sup2nor2pub2 #show, #sup3nor3pub3 #show").css("background-color","#F5D0A9");


                                          $("#suppos #mis_td, #sup2pos2 #mis_td, #sup3pos3 #mis_td").css("background-color","#FAAC58");
                                          $("#suppos #show, #sup2pos2 #show, #sup3pos3 #show").css("background-color","#FAAC58");
                                          $("#suppospub #mis_td, #sup2pos2pub2 #mis_td, #sup3pos3pub3 #mis_td").css("background-color","#F5D0A9");
                                          $("#suppospub #show, #sup2pos2pub2 #show, #sup3pos3pub3 #show").css("background-color","#F5D0A9");





                                    break;

                                    case 'UNIVERSITARIO Y TECNOLOGICO':

                                          // Desplegamos hijos y nietos
                                          $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");
                                          $("#supuytpub, #sup2uyt2pub2, #sup3uyt3pub3").css("display","");
                                          $("#supuytpubest, #sup2uyt2pub2est2, #sup3uyt3pub3est3").css("display","");
                                          $("#supuytpubfed, #sup2uyt2pub2fed2, #sup3uyt3pub3fed3").css("display","");
                                          $("#supuytpri, #sup2uyt2pri2, #sup3uyt3pri3").css("display","");
                                          $("#supuytaut, #sup2uyt2aut2, #sup3uyt3aut3").css("display","");

                                          $("#supnor, #sup2nor2, #sup3nor3").css("display","");

                                          $("#suppos, #sup2pos2, #sup3pos3").css("display","");


                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#supuyt #mis_td, #sup2uyt2 #mis_td, #sup3uyt3 #mis_td").css("background-color","#FAAC58");
                                          $("#supuyt #show, #sup2uyt2 #show, #sup3uyt3 #show").css("background-color","#FAAC58");
                                          $("#supuytpub #mis_td, #sup2uyt2pub2 #mis_td, #sup3uyt3pub3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supuytpub #show, #sup2uyt2pub2 #show, #sup3uyt3pub3 #show").css("background-color","#F5D0A9");








                                    break;

                                    case 'NORMAL':

                                          // Desplegamos hijos y nietos
                                          $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");


                                          $("#supnor, #sup2nor2, #sup3nor3").css("display","");
                                          $("#supnorpub, #sup2nor2pub2, #sup3nor3pub3").css("display","");
                                          $("#supnorpubest, #sup2nor2pub2est2, #sup3nor3pub3est3").css("display","");
                                          $("#supnorpubfed, #sup2nor2pub2fed2, #sup3nor3pub3fed3").css("display","");
                                          $("#supnorpri, #sup2nor2pri2, #sup3nor3pri3").css("display","");

                                          $("#suppos, #sup2pos2, #sup3pos3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#supnor #mis_td, #sup2nor2 #mis_td, #sup3nor3 #mis_td").css("background-color","#FAAC58");
                                          $("#supnor #show, #sup2nor2 #show, #sup3nor3 #show").css("background-color","#FAAC58");
                                          $("#supnorpub #mis_td, #sup2nor2pub2 #mis_td, #sup3nor3pub3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supnorpub #show, #sup2nor2pub2 #show, #sup3nor3pub3 #show").css("background-color","#F5D0A9");



                                    break;

                                    case 'POSGRADO':

                                          // Desplegamos hijos y nietos
                                          $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");

                                          $("#supnor, #sup2nor2, #sup3nor3").css("display","");

                                          $("#suppos, #sup2pos2, #sup3pos3").css("display","");
                                          $("#suppospub, #sup2pos2pub2, #sup3pos3pub3").css("display","");
                                          $("#suppospubest, #sup2pos2pub2est2, #sup3pos3pub3est3").css("display","");
                                          $("#suppospubfed, #sup2pos2pub2fed2, #sup3pos3pub3fed3").css("display","");
                                          $("#suppospri, #sup2pos2pri2, #sup3pos3pri3").css("display","");
                                          $("#supposaut, #sup2pos2aut2, #sup3pos3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#suppos #mis_td, #sup2pos2 #mis_td, #sup3pos3 #mis_td").css("background-color","#FAAC58");
                                          $("#suppos #show, #sup2pos2 #show, #sup3pos3 #show").css("background-color","#FAAC58");
                                          $("#suppospub #mis_td, #sup2pos2pub2 #mis_td, #sup3pos3pub3 #mis_td").css("background-color","#F5D0A9");
                                          $("#suppospub #show, #sup2pos2pub2 #show, #sup3pos3pub3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;

                        case 'PRIVADO':

                              //$("#supuni #mis_td, #supuni2 #mis_td, #supuni3 #mis_td").css("background-color","#FAAC58");
                              //$("#supuni #show, #supuni2 #show, #supuni3 #show").css("background-color","#FAAC58");

                              //$("#supnor #mis_td, #supnor2 #mis_td, #sup3nor3 #mis_td").css("background-color","#FAAC58");
                              //$("#supnor #show, #supnor2 #show, #sup3nor3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");
                                          $("#supuytpub, #sup2uyt2pub2, #sup3uyt3pub3").css("display","");
                                          $("#supuytpri, #sup2uyt2pri2, #sup3uyt3pri3").css("display","");
                                          $("#supuytaut, #sup2uyt2aut2, #sup3uyt3aut3").css("display","");

                                          $("#supnor, #sup2nor2, #sup3nor3").css("display","");
                                          $("#supnorpub, #sup2nor2pub2, #sup3nor3pub3").css("display","");
                                          $("#supnorpri, #sup2nor2pri2, #sup3nor3pri3").css("display","");

                                          $("#suppos, #sup2pos2, #sup3pos3").css("display","");
                                          $("#suppospub, #sup2pos2pub2, #sup3pos3pub3").css("display","");
                                          $("#suppospri, #sup2pos2pri2, #sup3pos3pri3").css("display","");
                                          $("#supposaut, #sup2pos2aut2, #sup3pos3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#supuyt #mis_td, #sup2uyt2 #mis_td, #sup3uyt3 #mis_td").css("background-color","#FAAC58");
                                          $("#supuyt #show, #sup2uyt2 #show, #sup3uyt3 #show").css("background-color","#FAAC58");
                                          $("#supuytpri #mis_td, #sup2uyt2pri2 #mis_td, #sup3uyt3pri3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supuytpri #show, #sup2uyt2pri2 #show, #sup3uyt3pri3 #show").css("background-color","#F5D0A9");

                                          $("#supnor #mis_td, #sup2nor2 #mis_td, #sup3nor3 #mis_td").css("background-color","#FAAC58");
                                          $("#supnor #show, #sup2nor2 #show, #sup3nor3 #show").css("background-color","#FAAC58");
                                          $("#supnorpri #mis_td, #sup2nor2pri2 #mis_td, #sup3nor3pri3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supnorpri #show, #sup2nor2pri2 #show, #sup3nor3pri3 #show").css("background-color","#F5D0A9");

                                          $("#suppos #mis_td, #sup2pos2 #mis_td, #sup3pos3 #mis_td").css("background-color","#FAAC58");
                                          $("#suppos #show, #sup2pos2 #show, #sup3pos3 #show").css("background-color","#FAAC58");
                                          $("#suppospri #mis_td, #sup2pos2pri2 #mis_td, #sup3pos3pri3 #mis_td").css("background-color","#F5D0A9");
                                          $("#suppospri #show, #sup2pos2pri2 #show, #sup3pos3pri3 #show").css("background-color","#F5D0A9");

                                    break;

                                    case 'UNIVERSITARIO Y TECNOLOGICO':

                                          // Desplegamos hijos y nietos
                                          $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");
                                          $("#supuytpub, #sup2uyt2pub2, #sup3uyt3pub3").css("display","");
                                          $("#supuytpri, #sup2uyt2pri2, #sup3uyt3pri3").css("display","");
                                          $("#supuytaut, #sup2uyt2aut2, #sup3uyt3aut3").css("display","");

                                          $("#supnor, #sup2nor2, #sup3nor3").css("display","");

                                          $("#suppos, #sup2pos2, #sup3pos3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#supuyt #mis_td, #sup2uyt2 #mis_td, #sup3uyt3 #mis_td").css("background-color","#FAAC58");
                                          $("#supuyt #show, #sup2uyt2 #show, #sup3uyt3 #show").css("background-color","#FAAC58");
                                          $("#supuytpri #mis_td, #sup2uyt2pri2 #mis_td, #sup3uyt3pri3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supuytpri #show, #sup2uyt2pri2 #show, #sup3uyt3pri3 #show").css("background-color","#F5D0A9");



                                    break;

                                    case 'NORMAL':

                                          // Desplegamos hijos y nietos
                                          $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");

                                          $("#supnor, #sup2nor2, #sup3nor3").css("display","");
                                          $("#supnorpub, #sup2nor2pub2, #sup3nor3pub3").css("display","");
                                          $("#supnorpri, #sup2nor2pri2, #sup3nor3pri3").css("display","");

                                          $("#suppos, #sup2pos2, #sup3pos3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#supnor #mis_td, #sup2nor2 #mis_td, #sup3nor3 #mis_td").css("background-color","#FAAC58");
                                          $("#supnor #show, #sup2nor2 #show, #sup3nor3 #show").css("background-color","#FAAC58");
                                          $("#supnorpri #mis_td, #sup2nor2pri2 #mis_td, #sup3nor3pri3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supnorpri #show, #sup2nor2pri2 #show, #sup3nor3pri3 #show").css("background-color","#F5D0A9");


                                    break;

                                    case 'POSGRADO':

                                          // Desplegamos hijos y nietos
                                          $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");

                                          $("#supnor, #sup2nor2, #sup3nor3").css("display","");

                                          $("#suppos, #sup2pos2, #sup3pos3").css("display","");
                                          $("#suppospub, #sup2pos2pub2, #sup3pos3pub3").css("display","");
                                          $("#suppospri, #sup2pos2pri2, #sup3pos3pri3").css("display","");
                                          $("#supposaut, #sup2pos2aut2, #sup3pos3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.

                                          $("#suppos #mis_td, #sup2pos2 #mis_td, #sup3pos3 #mis_td").css("background-color","#FAAC58");
                                          $("#suppos #show, #sup2pos2 #show, #sup3pos3 #show").css("background-color","#FAAC58");
                                          $("#suppospri #mis_td, #sup2pos2pri2 #mis_td, #sup3pos3pri3 #mis_td").css("background-color","#F5D0A9");
                                          $("#suppospri #show, #sup2pos2pri2 #show, #sup3pos3pri3 #show").css("background-color","#F5D0A9");


                                    break;
                              }


                        break;

                        case 'AUTONOMO':

                              //$("#supuni #mis_td, #supuni2 #mis_td, #supuni3 #mis_td").css("background-color","#FAAC58");
                              //$("#supuni #show, #supuni2 #show, #supuni3 #show").css("background-color","#FAAC58");

                              //$("#supnor #mis_td, #supnor2 #mis_td, #sup3nor3 #mis_td").css("background-color","#FAAC58");
                              //$("#supnor #show, #supnor2 #show, #sup3nor3 #show").css("background-color","#FAAC58");

                              switch(modalidad)
                              {
                                    case 'TODOS':
                                          // Desplegamos hijos y nietos
                                          $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");
                                          $("#supuytpub, #sup2uyt2pub2, #sup3uyt3pub3").css("display","");
                                          $("#supuytpri, #sup2uyt2pri2, #sup3uyt3pri3").css("display","");
                                          $("#supuytaut, #sup2uyt2aut2, #sup3uyt3aut3").css("display","");

                                          $("#supnor, #sup2nor2, #sup3nor3").css("display","");

                                          $("#suppos, #sup2pos2, #sup3pos3").css("display","");
                                          $("#suppospub, #sup2pos2pub2, #sup3pos3pub3").css("display","");
                                          $("#suppospri, #sup2pos2pri2, #sup3pos3pri3").css("display","");
                                          $("#supposaut, #sup2pos2aut2, #sup3pos3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#supuyt #mis_td, #sup2uyt2 #mis_td, #sup3uyt3 #mis_td").css("background-color","#FAAC58");
                                          $("#supuyt #show, #sup2uyt2 #show, #sup3uyt3 #show").css("background-color","#FAAC58");
                                          $("#supuytaut #mis_td, #sup2uyt2aut2 #mis_td, #sup3uyt3aut3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supuytaut #show, #sup2uyt2aut2 #show, #sup3uyt3aut3 #show").css("background-color","#F5D0A9");


                                          $("#suppos #mis_td, #sup2pos2 #mis_td, #sup3pos3 #mis_td").css("background-color","#FAAC58");
                                          $("#suppos #show, #sup2pos2 #show, #sup3pos3 #show").css("background-color","#FAAC58");
                                          $("#supposaut #mis_td, #sup2pos2aut2 #mis_td, #sup3pos3aut3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supposaut #show, #sup2pos2aut2 #show, #sup3pos3aut3 #show").css("background-color","#F5D0A9");



                                    break;

                                    case 'UNIVERSITARIO Y TECNOLOGICO':

                                          // Desplegamos hijos y nietos
                                          $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");
                                          $("#supuytpub, #sup2uyt2pub2, #sup3uyt3pub3").css("display","");
                                          $("#supuytpri, #sup2uyt2pri2, #sup3uyt3pri3").css("display","");
                                          $("#supuytaut, #sup2uyt2aut2, #sup3uyt3aut3").css("display","");

                                          $("#supnor, #sup2nor2, #sup3nor3").css("display","");

                                          $("#suppos, #sup2pos2, #sup3pos3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.
                                          $("#supuyt #mis_td, #sup2uyt2 #mis_td, #sup3uyt3 #mis_td").css("background-color","#FAAC58");
                                          $("#supuyt #show, #sup2uyt2 #show, #sup3uyt3 #show").css("background-color","#FAAC58");
                                          $("#supuytaut #mis_td, #sup2uyt2aut2 #mis_td, #sup3uyt3aut3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supuytaut #show, #sup2uyt2aut2 #show, #sup3uyt3aut3 #show").css("background-color","#F5D0A9");


                                    break;


                                    case 'POSGRADO':

                                          // Desplegamos hijos y nietos
                                          $("#supuyt, #sup2uyt2, #sup3uyt3").css("display","");

                                          $("#supnor, #sup2nor2, #sup3nor3").css("display","");

                                          $("#suppos, #sup2pos2, #sup3pos3").css("display","");
                                          $("#suppospub, #sup2pos2pub2, #sup3pos3pub3").css("display","");
                                          $("#suppospri, #sup2pos2pri2, #sup3pos3pri3").css("display","");
                                          $("#supposaut, #sup2pos2aut2, #sup3pos3aut3").css("display","");

                                          // Pintamos de color las filas para resaltar la seleccion realizada.


                                          $("#suppos #mis_td, #sup2pos2 #mis_td, #sup3pos3 #mis_td").css("background-color","#FAAC58");
                                          $("#suppos #show, #sup2pos2 #show, #sup3pos3 #show").css("background-color","#FAAC58");
                                          $("#supposaut #mis_td, #sup2pos2aut2 #mis_td, #sup3pos3aut3 #mis_td").css("background-color","#F5D0A9");
                                          $("#supposaut #show, #sup2pos2aut2 #show, #sup3pos3aut3 #show").css("background-color","#F5D0A9");

                                    break;
                              }


                        break;
                  }
            break;
      }
    }// get_mark_th()






    this.gettablas1_ze = function(nivelid, sostenimientoid, num_ze, cct_ze){
            var ruta = base_url+"Estadistica/get_llenado_tablas1_ze";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'tablas','nivelid':nivelid, 'sostenimientoid':sostenimientoid, 'num_ze': num_ze, 'cct_ze':cct_ze},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#contenedor_tablas").empty();
              $("#contenedor_tablas").append(html.result); // añadimos a la tabla
              swal.close();
            })
            .fail(function(e) {
              console.error("Error in gettablas1_ze()"); console.table(e);
            });
    }// gettablas1_ze()

    this.gettablas2_ze = function(nivelid, sostenimientoid, num_ze, cct_ze){
            var ruta = base_url+"Estadistica/get_llenado_tablas2_ze";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'tablas','nivelid':nivelid, 'sostenimientoid':sostenimientoid, 'num_ze': num_ze, 'cct_ze':cct_ze},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#contenedor_tablas2").empty();
              $("#contenedor_tablas2").append(html.result); // añadimos a la tabla
              swal.close();
            })
            .fail(function(e) {
              console.error("Error in gettablas2_ze()"); console.table(e);
            });
    }// gettablas2_ze()

    this.gettablas3_ze = function(nivelid, sostenimientoid, num_ze, cct_ze){
            var ruta = base_url+"Estadistica/get_llenado_tablas3_ze";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'tablas','nivelid':nivelid, 'sostenimientoid':sostenimientoid, 'num_ze': num_ze, 'cct_ze':cct_ze},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#contenedor_tablas3").empty();
              $("#contenedor_tablas3").append(html.result); // añadimos a la tabla
              obj_estadistica.get_colaps();
              swal.close();
            })
            .fail(function(e) {
              console.error("Error in gettablas3_ze()"); console.table(e);
            });
    }// gettablas3_ze()





      this.concatena_dom = function(html,callback){
            var aux = 1;
            $("#le_modal_infoescuela .modal-body").empty();
            $("#le_modal_infoescuela .modal-body").append(html); // añadimos a la tabla
            return callback(aux);
      }// concatena_dom()


      this.clearTable = function(){
          $("#le_tabla_listaEscuelas tbody").empty();
      }// clearTable()

      this.clearModalInfo = function(id_modal){
          $("#le_modal_infoescuela .modal-body").empty();
          $("#"+id_modal).modal("hide");
      }// clearModalInfo()

    this.clearModal = function(id_modal){
          $("#"+id_modal).modal("hide");
          $("#le_text_escuela").val("");
          //$("#le_text_CCT").val("");
          $("#LE_cct_turno").empty(); // El select para los turnos
          $("#LE_panel2_cctTurno").hide(); // el div que contiene al select de turnos




      }// clearModal()


}// EsteIndGen
