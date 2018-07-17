$(function() {
    obj_info = new Info_esc();
    graf = new HaceGraficas();
    grafr = new GraficasRiesgo();
});

function Info_esc(){
  _thisinfo = this;
}
$("#btn_info_asist").click(function(e){
              e.preventDefault();
              obj_info.get_alumn_doc_grup();
              obj_info.get_indica_asist();

            });
$("#btn_info_perma").click(function(e){
              e.preventDefault();
              obj_info.get_riesgo();
              obj_info.get_indica_perma();

            });
$("#btn_info_aprendiz").click(function(e){
              e.preventDefault();
              obj_info.get_planea();
              obj_info.get_ete();
              // alert("entramos");

            });

$("#btn_buscar_ries_esc").click(function(e){
              e.preventDefault();
              obj_info.get_riesgo2();

            });

Info_esc.prototype.get_alumn_doc_grup =function(){
						$("#dv_info_aprendizaje").attr('hidden',true);
						$("#dv_info_permanencia").attr('hidden',true);
						$("#dv_info_asistencia").removeAttr('hidden');
						let id_cct = $("#in_id_cct").val();
							$.ajax({
				        url:  base_url+"info/info_estadistica_graf",
				        method: 'POST',
				        data: {'id_cct':id_cct},
				        beforeSend: function(xhr) {
				        	Notification.loading("");
					  	},
				      })
				      .done(function( data ) {
							let nivel = data.nivel;

							if (data.estadis_alumnos_escuela.length>0) {
						    var a_g1 =  parseInt(data.estadis_alumnos_escuela[0]['alumn_t_1']);//5;
						    var a_g2 =  parseInt(data.estadis_alumnos_escuela[0]['alumn_t_2']);//5;
						    var a_g3 =  parseInt(data.estadis_alumnos_escuela[0]['alumn_t_3']);//7;
						    var a_g4 =  parseInt(data.estadis_alumnos_escuela[0]['alumn_t_4']);//8;
						    var a_g5 =  parseInt(data.estadis_alumnos_escuela[0]['alumn_t_5']);//8;
						    var a_g6 =  parseInt(data.estadis_alumnos_escuela[0]['alumn_t_6']);//8;
						    var t_alumnos  =  parseInt(data.estadis_alumnos_escuela[0]['alumn_t_t']);//10;
						    }
						    if (data.estadis_grupos_escuela.length>0) {
						    var g_g1 =  parseInt(data.estadis_grupos_escuela[0]['grupos_1']);//3;
						    var g_g2 =  parseInt(data.estadis_grupos_escuela[0]['grupos_2']);//3;
						    var g_g3 =  parseInt(data.estadis_grupos_escuela[0]['grupos_3']);//3;
						    var g_g4 =  parseInt(data.estadis_grupos_escuela[0]['grupos_4']);//3;
						    var g_g5 =  parseInt(data.estadis_grupos_escuela[0]['grupos_5']);//3;
						    var g_g6 =  parseInt(data.estadis_grupos_escuela[0]['grupos_6']);//3;
						    var t_grupos   =  g_g1+g_g2+g_g3+g_g4+g_g5+g_g6;//10;
						  }
						    if (data.estadis_docentes_escuela.length>0) {
						    var d_g1 =  parseInt(data.estadis_docentes_escuela[0]['docentes_1_g']);//3;
						    var d_g2 =  parseInt(data.estadis_docentes_escuela[0]['docentes_2_g']);//3;
						    var d_g3 =  parseInt(data.estadis_docentes_escuela[0]['docentes_3_g']);//3;
						    var d_g4 =  parseInt(data.estadis_docentes_escuela[0]['docentes_4_g']);//3;
						    var d_g5 =  parseInt(data.estadis_docentes_escuela[0]['docentes_5_g']);//3;
						    var d_g6 =  parseInt(data.estadis_docentes_escuela[0]['docentes_6_g']);//3;
						    var t_docentes =  d_g1+d_g2+d_g3+d_g4+d_g5+d_g6;//10;
						  }



								switch(nivel) {
									case '3':
													graf.GraficoEstadisticaSecundaria_alumn(a_g1,a_g2,a_g3,a_g1+a_g2+a_g3);
													graf.GraficoEstadisticaSecundaria_grupos(g_g1,g_g2,g_g3,g_g1+g_g2+g_g3);
													graf.GraficoEstadisticaSecundaria_docentes(d_g1,d_g2,d_g3,d_g1+d_g2+d_g3);

									break;
									case '4':
													graf.GraficoEstadisticaPrimaria_alumn(a_g1,a_g2,a_g3,a_g4,a_g5,a_g6,t_alumnos);
													graf.GraficoEstadisticaPrimaria_grupos(g_g1,g_g2,g_g3,g_g4,g_g5,g_g6,t_grupos);
													graf.GraficoEstadisticaPrimaria_docentes(d_g1,d_g2,d_g3,d_g4,d_g5,d_g6,t_docentes);

									break;
									case '5':
													graf.GraficoEstadisticaSecundaria_alumn(a_g1,a_g2,a_g3,a_g1+a_g2+a_g3);
													graf.GraficoEstadisticaSecundaria_grupos(g_g1,g_g2,g_g3,g_g1+g_g2+g_g3);
													graf.GraficoEstadisticaSecundaria_docentes(d_g1,d_g2,d_g3,d_g1+d_g2+d_g3);

									break;

									default:
													graf.GraficoEstadisticaOtros(t_alumnos,t_grupos,t_docentes);
									break;

								}


				      })
				      .fail(function(e) {
				        console.error("Error in "); console.table(e);
				      })
				      .always(function() {
							swal.close();
						});
},

Info_esc.prototype.get_indica_asist =function(){
            $("#dv_info_graf_Cobertura").empty();
            $("#dv_info_graf_Absorcion").empty();
						let id_cct = $("#in_id_cct").val();
							$.ajax({
				        url:  base_url+"info/info_indica_asis",
				        method: 'POST',
				        data: {'id_cct':id_cct},
				        beforeSend: function(xhr) {
				        	Notification.loading("");
					  	},
				      })
				      .done(function( data ) {
							let nivel = data.nivel;
							if (data.indica_asisten.length>0) {
						    var a_cob =  (data.indica_asisten[0]['cobertura']);//5;
						    var a_abs =  (data.indica_asisten[0]['absorcion']);//5;
                graf.DibujarRadialProgressBarcobertura(a_cob);
                graf.DibujarRadialProgressBarabsorcion(a_abs);
                }



				      })
				      .fail(function(e) {
				        console.error("Error in "); console.table(e);
				      })
				      .always(function() {
							swal.close();
						});
},

Info_esc.prototype.get_indica_perma =function(){
            $("#dv_info_graf_Retencion").empty();
            $("#dv_info_graf_Aprobacion").empty();
            $("#dv_info_graf_Eficiencia_Terminal").empty();
						let id_cct = $("#in_id_cct").val();
							$.ajax({
				        url:  base_url+"info/info_indica_perma",
				        method: 'POST',
				        data: {'id_cct':id_cct},
				        beforeSend: function(xhr) {
				        	Notification.loading("");
					  	},
				      })
				      .done(function( data ) {
							let nivel = data.nivel;
							if (data.indica_perma.length>0) {
						    var a_ret =  (data.indica_perma[0]['retencion']);//5;
						    var a_apr =  (data.indica_perma[0]['aprobacion']);//5;
                var a_efi =  (data.indica_perma[0]['et']);//5;

                graf.DibujarRadialProgressBarretencion(a_ret);
                graf.DibujarRadialProgressBaraprobacion(a_apr);
                graf.DibujarRadialProgressBaraefi(a_efi);
                }




				      })
				      .fail(function(e) {
				        console.error("Error in "); console.table(e);
				      })
				      .always(function() {
							swal.close();
						});
},

Info_esc.prototype.get_riesgo =function(){
	$("#dv_info_asistencia").attr('hidden',true);
							$("#dv_info_permanencia").removeAttr('hidden');
							$("#dv_info_aprendizaje").attr('hidden',true);
							let id_cct = $("#in_id_cct").val();
							$.ajax({
				        url:  base_url+"info/info_riesgo_graf",
				        method: 'POST',
				        data: {'id_cct':id_cct,'id_bim':1,'ciclo':"2017-2018"},
				        beforeSend: function(xhr) {
					        Notification.loading("");
					    }
				      })
				      .done(function( data ) {
				      	// console.log("DATOS BAJADOS");
				      	// console.log(data);

								var nivel = data.nivel;
                if (data.graph_pie_riesgo.length>0) {
							  var q1 = parseInt(data.graph_pie_riesgo[0]['muy_alto']);
								var q2 = parseInt(data.graph_pie_riesgo[0]['alto']);
								var q3 = parseInt(data.graph_pie_riesgo[0]['medio']);
								var q4 = parseInt(data.graph_pie_riesgo[0]['bajo']);
                }
                if (data.graph_bar_riesgo.length>0) {
							  var t1 = parseInt(data.graph_bar_riesgo[0]['muyalto_1']);
								var t2 = parseInt(data.graph_bar_riesgo[0]['muyalto_2']);
								var t3 = parseInt(data.graph_bar_riesgo[0]['muyalto_3']);
								var t4 = parseInt(data.graph_bar_riesgo[0]['muyalto_4']);
								var t5 = parseInt(data.graph_bar_riesgo[0]['muyalto_5']);
								var t6 = parseInt(data.graph_bar_riesgo[0]['muyalto_6']);
              }

								switch(nivel) {

								case '4':
                          $("#total_bajas").text(data.numero_bajas[0]['total']);
													$("#dv_riesgo_esc_pie").empty();
													$("#dv_riesgo_esc_bar").empty();
													grafr.TablaPieGraficaPie(q1,q2,q3,q4);
													grafr.TablaPieGraficaBarPrimaria(t1,t2,t3,t4,t5,t6);
                          $("#dv_riesgtab_esc_bar").empty();
                          var html_tbm_riego='';
                          html_tbm_riego += '<div class="col-sm-6">';
                          html_tbm_riego += '                    <table id="tabla_bar_info" class="table table-gray table-hover">';
                          html_tbm_riego += '                      <thead>';
                          html_tbm_riego += '                        <tr>';
                          html_tbm_riego += '                          <th class="text-center"></th>';
                          html_tbm_riego += '                          <th class="text-center">1°</th>';
                          html_tbm_riego += '                          <th class="text-center">2°</th>';
                          html_tbm_riego += '                          <th class="text-center">3°</th>';
                          html_tbm_riego += '                          <th class="text-center">4°</th>';
                          html_tbm_riego += '                          <th class="text-center">5°</th>';
                          html_tbm_riego += '                          <th class="text-center">6°</th>';
                          html_tbm_riego += '                        </tr>';
                          html_tbm_riego += '                      </thead>';
                          html_tbm_riego += '                      <tbody>';
                          html_tbm_riego += '                        <tr>';
                          html_tbm_riego += '                          <th class="text-center">Muy alto</th>';
                          html_tbm_riego += '                          <td class="text-center">'+(t1)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t2)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t3)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t4)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t5)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t6)+'</td>';
                          html_tbm_riego += '                        </tr>';
                          html_tbm_riego += '                      </tbody>';
                          html_tbm_riego += '                    </table>';
                          html_tbm_riego += '';
                          html_tbm_riego += '                  </div>';

                      $("#dv_riesgtab_esc_bar").append(html_tbm_riego);

                      $("#dv_riesgotab_esc_pie").empty();
                      var html_tb_riego='';
                      html_tb_riego +='<div class="row">';
                      html_tb_riego +='  <div class="col-sm-6">';
                      html_tb_riego+='    <table id="tabla_pie_info" class="table table-gray table-hover">';
                      html_tb_riego+='      <thead>';
                      html_tb_riego+='        <tr>';
                      html_tb_riego+='          <th class="text-center">Total</th>';
                      html_tb_riego+='          <th class="text-center">Muy alto</th>';
                      html_tb_riego+='          <th class="text-center">Alto</th>';
                      html_tb_riego+='          <th class="text-center">Medio</th>';
                      html_tb_riego+='          <th class="text-center">Bajo</th>';
                      html_tb_riego+='        </tr>';
                      html_tb_riego+='      </thead>';
                      html_tb_riego+='      <tbody>';
                      html_tb_riego+='        <tr>';
                      html_tb_riego+='          <td class="text-center" style="font-size:1.2em; font-weight:500;">'+(q1+q2+q3+q4)+'</td>';
                      html_tb_riego+='          <td class="text-center" style="background-color:#FF0000; color:white; font-size:1.2em; font-weight:600;">'+(q1)+'</td>';
                      html_tb_riego+='          <td class="text-center" style="background-color:#FF9900; font-size:1.2em; font-weight:500;">'+(q2)+'</td>';
                      html_tb_riego+='          <td class="text-center" style="background-color:#FFFF00; font-size:1.2em; font-weight:500;">'+(q3)+'</td>';
                      html_tb_riego+='          <td class="text-center" style="background-color:#3CB371; font-size:1.2em; font-weight:500;">'+(q4)+'</td>';
                      html_tb_riego+='        </tr>';
                      html_tb_riego+='      </tbody>';
                      html_tb_riego+='    </table>';
                    html_tb_riego+='</div>';
                  html_tb_riego+='</div>';

                  $("#dv_riesgotab_esc_pie").append(html_tb_riego);

								break;
								case '5':
                          $("#total_bajas").text(data.numero_bajas[0]['total']);
													$("#dv_riesgo_esc_pie").empty();
													$("#dv_riesgo_esc_bar").empty();
													grafr.TablaPieGraficaPie(q1,q2,q3,q4);
													grafr.TablaPieGraficaBarSecundaria(t1,t2,t3);
                          $("#dv_riesgtab_esc_bar").empty();
                          var html_tbm_riego='';
                          html_tbm_riego += '<div class="col-sm-6">';
                          html_tbm_riego += '                    <table id="tabla_bar_info" class="table table-gray table-hover">';
                          html_tbm_riego += '                      <thead>';
                          html_tbm_riego += '                        <tr>';
                          html_tbm_riego += '                          <th class="text-center"></th>';
                          html_tbm_riego += '                          <th class="text-center">1°</th>';
                          html_tbm_riego += '                          <th class="text-center">2°</th>';
                          html_tbm_riego += '                          <th class="text-center">3°</th>';
                          html_tbm_riego += '                        </tr>';
                          html_tbm_riego += '                      </thead>';
                          html_tbm_riego += '                      <tbody>';
                          html_tbm_riego += '                        <tr>';
                          html_tbm_riego += '                          <th class="text-center">Muy alto</th>';
                          html_tbm_riego += '                          <td class="text-center">'+(t1)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t2)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t3)+'</td>';
                          html_tbm_riego += '                        </tr>';
                          html_tbm_riego += '                      </tbody>';
                          html_tbm_riego += '                    </table>';
                          html_tbm_riego += '';
                          html_tbm_riego += '                  </div>';

                      $("#dv_riesgtab_esc_bar").append(html_tbm_riego);

                      $("#dv_riesgotab_esc_pie").empty();
                      var html_tb_riego='';
                      html_tb_riego +='<div class="row">';
                      html_tb_riego +='  <div class="col-sm-6">';
                      html_tb_riego+='    <table id="tabla_pie_info" class="table table-gray table-hover">';
                      html_tb_riego+='      <thead>';
                      html_tb_riego+='        <tr>';
                      html_tb_riego+='          <th class="text-center">Total</th>';
                      html_tb_riego+='          <th class="text-center">Muy alto</th>';
                      html_tb_riego+='          <th class="text-center">Alto</th>';
                      html_tb_riego+='          <th class="text-center">Medio</th>';
                      html_tb_riego+='          <th class="text-center">Bajo</th>';
                      html_tb_riego+='        </tr>';
                      html_tb_riego+='      </thead>';
                      html_tb_riego+='      <tbody>';
                      html_tb_riego+='        <tr>';
                      html_tb_riego+='          <td class="text-center" style="font-size:1.2em; font-weight:500;">'+(q1+q2+q3+q4)+'</td>';
                      html_tb_riego+='          <td class="text-center" style="background-color:#FF0000; color:white; font-size:1.2em; font-weight:600;">'+(q1)+'</td>';
                      html_tb_riego+='          <td class="text-center" style="background-color:#FF9900; font-size:1.2em; font-weight:500;">'+(q2)+'</td>';
                      html_tb_riego+='          <td class="text-center" style="background-color:#FFFF00; font-size:1.2em; font-weight:500;">'+(q3)+'</td>';
                      html_tb_riego+='          <td class="text-center" style="background-color:#3CB371; font-size:1.2em; font-weight:500;">'+(q4)+'</td>';
                      html_tb_riego+='        </tr>';
                      html_tb_riego+='      </tbody>';
                      html_tb_riego+='    </table>';
                    html_tb_riego+='</div>';
                  html_tb_riego+='</div>';

                  $("#total_bajas").text("4");

                  $("#dv_riesgotab_esc_pie").append(html_tb_riego);
								break;

								default:
                  // alert("no hubo");
								break;

								}


				      })
				      .fail(function(e) {
				        console.error("Error in "); console.table(e);
				      })
				      .always(function() {
							swal.close();
						});
},

Info_esc.prototype.get_planea =function(){
	// alert("Entramos");
	$("#dv_info_asistencia").attr('hidden',true);
							$("#dv_info_permanencia").attr('hidden',true);
							$("#dv_info_aprendizaje").removeAttr('hidden');
							let id_cct = $("#in_id_cct").val();
							$.ajax({
								url:  base_url+"info/info_plaea_graf",
								method: 'POST',
								data: {'id_cct':id_cct},
								beforeSend: function(xhr) {
							        Notification.loading("");
							    },
							})
							.done(function( data ) {
								let nivel = data.nivel;

								if (data.planea15_escuela.length>0) {
								var lyc1_15  = parseFloat(data.planea15_escuela[0]['lyc_i']);
								var lyc2_15  = parseFloat(data.planea15_escuela[0]['lyc_ii']);
								var lyc3_15  = parseFloat(data.planea15_escuela[0]['lyc_iii']);
								var lyc4_15  = parseFloat(data.planea15_escuela[0]['lyc_iv']);
								var mat1_15  = parseFloat(data.planea15_escuela[0]['mat_i']);
								var mat2_15  = parseFloat(data.planea15_escuela[0]['mat_ii']);
								var mat3_15  = parseFloat(data.planea15_escuela[0]['mat_iii']);
								var mat4_15  = parseFloat(data.planea15_escuela[0]['mat_iv']);
							}

						if (data.planea16_escuela.length>0) {
								var lyc1_16  = parseFloat(data.planea16_escuela[0]['lyc_i']);
								var lyc2_16  = parseFloat(data.planea16_escuela[0]['lyc_ii']);
								var lyc3_16  = parseFloat(data.planea16_escuela[0]['lyc_iii']);
								var lyc4_16  = parseFloat(data.planea16_escuela[0]['lyc_iv']);
								var mat1_16  = parseFloat(data.planea16_escuela[0]['mat_i']);
								var mat2_16  = parseFloat(data.planea16_escuela[0]['mat_ii']);
								var mat3_16  = parseFloat(data.planea16_escuela[0]['mat_iii']);
								var mat4_16  = parseFloat(data.planea16_escuela[0]['mat_iv']);
							}

              if (data.planea17_escuela.length>0) {
  								var lyc1_17  = parseFloat(data.planea17_escuela[0]['lyc_i']);
  								var lyc2_17  = parseFloat(data.planea17_escuela[0]['lyc_ii']);
  								var lyc3_17  = parseFloat(data.planea17_escuela[0]['lyc_iii']);
  								var lyc4_17  = parseFloat(data.planea17_escuela[0]['lyc_iv']);
  								var mat1_17  = parseFloat(data.planea17_escuela[0]['mat_i']);
  								var mat2_17  = parseFloat(data.planea17_escuela[0]['mat_ii']);
  								var mat3_17  = parseFloat(data.planea17_escuela[0]['mat_iii']);
  								var mat4_17  = parseFloat(data.planea17_escuela[0]['mat_iv']);
  							}
								switch(nivel) {

									case '3':

													if (data.graph_cont_tema_lyc.length==0) {
															$("#dv_info_aprendizaje").empty();
														}
													 // Por Unidades de Análisis lyc
													 if (data.graph_cont_tema_mate.length==0) {
															$("#dv_info_graf_contmat").empty();
															$("#dv_info_graf_contmat").append('<input type="text" value="No se encontraron datos">');
														}
									break;
									case '4':

														if (data.graph_cont_tema_lyc.length>0) {
															graf.graficoplanea_ud_prim_lyc(data.graph_cont_tema_lyc, data.id_cct);
														}
														else{
															$("#dv_info_graf_contlyc").empty();
															$("#dv_info_graf_contlyc").append('<input type="text" value="No se encontraron datos">');
														}
													 // Por Unidades de Análisis lyc
													 if (data.graph_cont_tema_mate.length>0) {
															graf.graficoplanea_ud_prim_mate(data.graph_cont_tema_mate, data.id_cct);
														}
														else{
															$("#dv_info_graf_contmat").empty();
															$("#dv_info_graf_contmat").append('<input type="text" value="No se encontraron datos">');
														}

                            if (data.planea15_escuela.length>0 && data.planea16_escuela.length>0) {
            									graf.PieDrilldownPlanea05y06(lyc1_15,lyc2_15,lyc3_15,lyc4_15,mat1_15,mat2_15,mat3_15,mat4_15,lyc1_16,lyc2_16,lyc3_16,lyc4_16,mat1_16,mat2_16,mat3_16,mat4_16);
            								}
            								else{
            									$("#tabla_planea").empty();
            									$("#dv_info_graf_nlogrolyc").empty();
            										$("#dv_info_graf_nlogrolyc").append('<input type="text" value="No se encontraron datos">');
            										$("#dv_info_graf_nlogromat").empty();
            								}

									break;
									case '5':

														if (data.graph_cont_tema_lyc.length>0) {
															graf.graficoplanea_ud_secu_lyc(data.graph_cont_tema_lyc, data.id_cct);
														}
														else{
															$("#dv_info_graf_contlyc").empty();
															$("#dv_info_graf_contlyc").append('<input type="text" value="No se encontraron datos">');
														}
													 // Por Unidades de Análisis lyc
													 if (data.graph_cont_tema_mate.length>0) {
															graf.graficoplanea_ud_secu_mate(data.graph_cont_tema_mate, data.id_cct);
														}
														else{
															$("#dv_info_graf_contmat").empty();
															$("#dv_info_graf_contmat").append('<input type="text" value="No se encontraron datos">');
														}

                            if (data.planea16_escuela.length>0 && data.planea17_escuela.length>0) {
            									graf.PieDrilldownPlanea05y06(lyc1_16,lyc2_16,lyc3_16,lyc4_16,mat1_16,mat2_16,mat3_16,mat4_16,lyc1_17,lyc2_17,lyc3_17,lyc4_17,mat1_17,mat2_17,mat3_17,mat4_17);
            								}
            								else{
            									$("#tabla_planea").empty();
            									$("#dv_info_graf_nlogrolyc").empty();
            										$("#dv_info_graf_nlogrolyc").append('<input type="text" value="No se encontraron datos">');
            										$("#dv_info_graf_nlogromat").empty();
            								}


									break;

                  case '6':

                  if (data.graph_cont_tema_lyc.length>0) {
                    graf.graficoplanea_ud_ms_lyc(data.graph_cont_tema_lyc, data.id_cct);
                  }
                  else{
                    $("#dv_info_graf_contlyc").empty();
                    $("#dv_info_graf_contlyc").append('<input type="text" value="No se encontraron datos">');
                  }
                 // Por Unidades de Análisis lyc
                 if (data.graph_cont_tema_mate.length>0) {
                    graf.graficoplanea_ud_ms_mate(data.graph_cont_tema_mate, data.id_cct);
                  }
                  else{
                    $("#dv_info_graf_contmat").empty();
                    $("#dv_info_graf_contmat").append('<input type="text" value="No se encontraron datos">');
                  }

                  if (data.planea16_escuela.length>0 && data.planea17_escuela.length>0) {
                    graf.PieDrilldownPlanea05y06(lyc1_16,lyc2_16,lyc3_16,lyc4_16,mat1_16,mat2_16,mat3_16,mat4_16,lyc1_17,lyc2_17,lyc3_17,lyc4_17,mat1_17,mat2_17,mat3_17,mat4_17);
                  }
                  else{
                    $("#tabla_planea").empty();
                    $("#dv_info_graf_nlogrolyc").empty();
                      $("#dv_info_graf_nlogrolyc").append('<input type="text" value="No se encontraron datos">');
                      $("#dv_info_graf_nlogromat").empty();
                  }

                  break;

									default:
													$("#dv_info_aprendizaje").empty();
									break;


								}


							})
							.fail(function(e) {
								console.error("Error in "); console.table(e);
							})
							.always(function() {
							swal.close();
						});
},

Info_esc.prototype.get_ete =function(){
	// alert("Entramos");
            $("#containerRPB03ete").empty();
							let id_cct = $("#in_id_cct").val();
							$.ajax({
								url:  base_url+"info/info_ete",
								method: 'POST',
								data: {'id_cct':id_cct},
								beforeSend: function(xhr) {
							        Notification.loading("");
							    },
							})
							.done(function( data ) {
								let nivel = data.nivel;
                
								if (data.ete.length>0) {
								var a_ete  = (data.ete);
                graf.DibujarRadialProgressBarET(a_ete);
							}




							})
							.fail(function(e) {
								console.error("Error in "); console.table(e);
							})
							.always(function() {
							swal.close();
						});
},

Info_esc.prototype.get_riesgo2 =function(){
	let id_bim = $("#slt_bimestre_ries").val();
							let ciclo = $("#slt_ciclo_ries").val();
							let id_cct = $("#in_id_cct").val();
							$.ajax({
				        url:  base_url+"info/info_riesgo_graf",
				        method: 'POST',
				        data: {'id_cct':id_cct,'id_bim':id_bim,'ciclo':ciclo},
				        beforeSend: function(xhr) {
							        Notification.loading("");
							    },
				      })
				      .done(function( data ) {
				      	console.log("DATOS BAJADOS");
				      	console.log(data);
				      	// $("#total_bajas").text("4");
				      	$("#total_bajas").text(data.numero_bajas[0]['total']);
								let nivel = data.nivel;
							var q1 = parseInt(data.graph_pie_riesgo[0]['muy_alto']);
								var q2 = parseInt(data.graph_pie_riesgo[0]['alto']);
								var q3 = parseInt(data.graph_pie_riesgo[0]['medio']);
								var q4 = parseInt(data.graph_pie_riesgo[0]['bajo']);
							var t1 = parseInt(data.graph_bar_riesgo[0]['muyalto_1']);
								var t2 = parseInt(data.graph_bar_riesgo[0]['muyalto_2']);
								var t3 = parseInt(data.graph_bar_riesgo[0]['muyalto_3']);
								var t4 = parseInt(data.graph_bar_riesgo[0]['muyalto_4']);
								var t5 = parseInt(data.graph_bar_riesgo[0]['muyalto_5']);
								var t6 = parseInt(data.graph_bar_riesgo[0]['muyalto_6']);
								switch(nivel) {

								case '4':
													$("#dv_riesgo_esc_pie").empty();
													$("#dv_riesgo_esc_bar").empty();
													grafr.TablaPieGraficaPie(q1,q2,q3,q4);
													grafr.TablaPieGraficaBarPrimaria(t1,t2,t3,t4,t5,t6);
                          $("#dv_riesgtab_esc_bar").empty();
                          var html_tbm_riego='';
                          html_tbm_riego += '<div class="col-sm-6">';
                          html_tbm_riego += '                    <table id="tabla_bar_info" class="table table-gray table-hover">';
                          html_tbm_riego += '                      <thead>';
                          html_tbm_riego += '                        <tr>';
                          html_tbm_riego += '                          <th class="text-center"></th>';
                          html_tbm_riego += '                          <th class="text-center">1°</th>';
                          html_tbm_riego += '                          <th class="text-center">2°</th>';
                          html_tbm_riego += '                          <th class="text-center">3°</th>';
                          html_tbm_riego += '                          <th class="text-center">4°</th>';
                          html_tbm_riego += '                          <th class="text-center">5°</th>';
                          html_tbm_riego += '                          <th class="text-center">6°</th>';
                          html_tbm_riego += '                        </tr>';
                          html_tbm_riego += '                      </thead>';
                          html_tbm_riego += '                      <tbody>';
                          html_tbm_riego += '                        <tr>';
                          html_tbm_riego += '                          <th class="text-center">Muy alto</th>';
                          html_tbm_riego += '                          <td class="text-center">'+(t1)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t2)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t3)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t4)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t5)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t6)+'</td>';
                          html_tbm_riego += '                        </tr>';
                          html_tbm_riego += '                      </tbody>';
                          html_tbm_riego += '                    </table>';
                          html_tbm_riego += '';
                          html_tbm_riego += '                  </div>';

                      $("#dv_riesgtab_esc_bar").append(html_tbm_riego);

								break;
								case '5':
													$("#dv_riesgo_esc_pie").empty();
													$("#dv_riesgo_esc_bar").empty();
													grafr.TablaPieGraficaPie(q1,q2,q3,q4);
													grafr.TablaPieGraficaBarSecundaria(t1,t2,t3);
                          $("#dv_riesgtab_esc_bar").empty();
                          var html_tbm_riego='';
                          html_tbm_riego += '<div class="col-sm-6">';
                          html_tbm_riego += '                    <table id="tabla_bar_info" class="table table-gray table-hover">';
                          html_tbm_riego += '                      <thead>';
                          html_tbm_riego += '                        <tr>';
                          html_tbm_riego += '                          <th class="text-center"></th>';
                          html_tbm_riego += '                          <th class="text-center">1°</th>';
                          html_tbm_riego += '                          <th class="text-center">2°</th>';
                          html_tbm_riego += '                          <th class="text-center">3°</th>';
                          html_tbm_riego += '                        </tr>';
                          html_tbm_riego += '                      </thead>';
                          html_tbm_riego += '                      <tbody>';
                          html_tbm_riego += '                        <tr>';
                          html_tbm_riego += '                          <th class="text-center">Muy alto</th>';
                          html_tbm_riego += '                          <td class="text-center">'+(t1)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t2)+'</td>';
                          html_tbm_riego += '                          <td class="text-center">'+(t3)+'</td>';
                          html_tbm_riego += '                        </tr>';
                          html_tbm_riego += '                      </tbody>';
                          html_tbm_riego += '                    </table>';
                          html_tbm_riego += '';
                          html_tbm_riego += '                  </div>';

                      $("#dv_riesgtab_esc_bar").append(html_tbm_riego);
								break;


								default:

								break;

								}

                $("#dv_riesgotab_esc_pie").empty();
                var html_tb_riego='';
                html_tb_riego +='<div class="row">';
                html_tb_riego +='  <div class="col-sm-6">';
                html_tb_riego+='    <table id="tabla_pie_info" class="table table-gray table-hover">';
                html_tb_riego+='      <thead>';
                html_tb_riego+='        <tr>';
                html_tb_riego+='          <th class="text-center">Total</th>';
                html_tb_riego+='          <th class="text-center">Muy alto</th>';
                html_tb_riego+='          <th class="text-center">Alto</th>';
                html_tb_riego+='          <th class="text-center">Medio</th>';
                html_tb_riego+='          <th class="text-center">Bajo</th>';
                html_tb_riego+='        </tr>';
                html_tb_riego+='      </thead>';
                html_tb_riego+='      <tbody>';
                html_tb_riego+='        <tr>';
                html_tb_riego+='          <td class="text-center" style="font-size:1.2em; font-weight:500;">'+(q1+q2+q3+q4)+'</td>';
                html_tb_riego+='          <td class="text-center" style="background-color:#FF0000; color:white; font-size:1.2em; font-weight:600;">'+(q1)+'</td>';
                html_tb_riego+='          <td class="text-center" style="background-color:#FF9900; font-size:1.2em; font-weight:500;">'+(q2)+'</td>';
                html_tb_riego+='          <td class="text-center" style="background-color:#FFFF00; font-size:1.2em; font-weight:500;">'+(q3)+'</td>';
                html_tb_riego+='          <td class="text-center" style="background-color:#3CB371; font-size:1.2em; font-weight:500;">'+(q4)+'</td>';
                html_tb_riego+='        </tr>';
                html_tb_riego+='      </tbody>';
                html_tb_riego+='    </table>';
              html_tb_riego+='</div>';
            html_tb_riego+='</div>';


            $("#dv_riesgotab_esc_pie").append(html_tb_riego);

				      })
				      .fail(function(e) {
				        console.error("Error in "); console.table(e);
				      })
						.always(function() {
							swal.close();
						});


}
