$("#btn_info_asist").click(function(e){
              e.preventDefault();
							$("#dv_info_aprendizaje").attr('hidden',true);
							$("#dv_info_permanencia").attr('hidden',true);
							$("#dv_info_asistencia").removeAttr('hidden');
							let id_cct = $("#in_id_cct").val();
							let grafr = new HaceGraficas();
							// alert(ciclo);
							$.ajax({
				        url:  base_url+"info/info_estadistica_graf",
				        method: 'POST',
				        data: {'id_cct':id_cct}
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
													grafr.GraficoEstadisticaSecundaria_alumn(a_g1,a_g2,a_g3,a_g1+a_g2+a_g3);
													grafr.GraficoEstadisticaSecundaria_grupos(g_g1,g_g2,g_g3,g_g1+g_g2+g_g3);
													grafr.GraficoEstadisticaSecundaria_docentes(d_g1,d_g2,d_g3,d_g1+d_g2+d_g3);

									break;
									case '4':
													grafr.GraficoEstadisticaPrimaria_alumn(a_g1,a_g2,a_g3,a_g4,a_g5,a_g6,t_alumnos);
													grafr.GraficoEstadisticaPrimaria_grupos(g_g1,g_g2,g_g3,g_g4,g_g5,g_g6,t_grupos);
													grafr.GraficoEstadisticaPrimaria_docentes(d_g1,d_g2,d_g3,d_g4,d_g5,d_g6,t_docentes);

									break;
									case '5':
													grafr.GraficoEstadisticaSecundaria_alumn(a_g1,a_g2,a_g3,a_g1+a_g2+a_g3);
													grafr.GraficoEstadisticaSecundaria_grupos(g_g1,g_g2,g_g3,g_g1+g_g2+g_g3);
													grafr.GraficoEstadisticaSecundaria_docentes(d_g1,d_g2,d_g3,d_g1+d_g2+d_g3);

									break;

									default:
													grafr.GraficoEstadisticaOtros(t_alumnos,t_grupos,t_docentes);
									break;

								}
				      })
				      .fail(function(e) {
				        console.error("Error in "); console.table(e);
				      });
            });
$("#btn_info_perma").click(function(e){
              e.preventDefault();
							$("#dv_info_asistencia").attr('hidden',true);
							$("#dv_info_permanencia").removeAttr('hidden');
							$("#dv_info_aprendizaje").attr('hidden',true);
							let id_cct = $("#in_id_cct").val();
							let grafr = new GraficasRiesgo();
							// alert(ciclo);
							$.ajax({
				        url:  base_url+"info/info_riesgo_graf",
				        method: 'POST',
				        data: {'id_cct':id_cct,'id_bim':1,'ciclo':"2017-2018"}
				      })
				      .done(function( data ) {
								var nivel = data.nivel;
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

								break;
								case '5':
													$("#dv_riesgo_esc_pie").empty();
													$("#dv_riesgo_esc_bar").empty();
													grafr.TablaPieGraficaPie(q1,q2,q3,q4);
													grafr.TablaPieGraficaBarSecundaria(t1,t2,t3);
								break;


								default:

								break;

								}
				      })
				      .fail(function(e) {
				        console.error("Error in "); console.table(e);
				      });
            });
$("#btn_info_aprendiz").click(function(e){
              e.preventDefault();
							$("#dv_info_asistencia").attr('hidden',true);
							$("#dv_info_permanencia").attr('hidden',true);
							$("#dv_info_aprendizaje").removeAttr('hidden');
							let id_cct = $("#in_id_cct").val();
							let grafr = new HaceGraficas();
							// alert(ciclo);
							$.ajax({
								url:  base_url+"info/info_plaea_graf",
								method: 'POST',
								data: {'id_cct':id_cct}
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
															grafr.graficoplanea_ud_prim_lyc(data.graph_cont_tema_lyc, data.id_cct);
														}
														else{
															$("#dv_info_graf_contlyc").empty();
															$("#dv_info_graf_contlyc").append('<input type="text" value="No se encontraron datos">');
														}
													 // Por Unidades de Análisis lyc
													 if (data.graph_cont_tema_mate.length>0) {
															grafr.graficoplanea_ud_prim_mate(data.graph_cont_tema_mate, data.id_cct);
														}
														else{
															$("#dv_info_graf_contmat").empty();
															$("#dv_info_graf_contmat").append('<input type="text" value="No se encontraron datos">');
														}

									break;
									case '5':

														if (data.graph_cont_tema_lyc.length>0) {
															grafr.graficoplanea_ud_secu_lyc(data.graph_cont_tema_lyc, data.id_cct);
														}
														else{
															$("#dv_info_graf_contlyc").empty();
															$("#dv_info_graf_contlyc").append('<input type="text" value="No se encontraron datos">');
														}
													 // Por Unidades de Análisis lyc
													 if (data.graph_cont_tema_mate.length>0) {
															grafr.graficoplanea_ud_secu_mate(data.graph_cont_tema_mate, data.id_cct);
														}
														else{
															$("#dv_info_graf_contmat").empty();
															$("#dv_info_graf_contmat").append('<input type="text" value="No se encontraron datos">');
														}


									break;

									default:
													$("#dv_info_aprendizaje").empty();
									break;


								}

								if (data.planea15_escuela.length>0 && data.planea16_escuela.length>0) {
									grafr.PieDrilldownPlanea05y06(lyc1_15,lyc2_15,lyc3_15,lyc4_15,mat1_15,mat2_15,mat3_15,mat4_15,lyc1_16,lyc2_16,lyc3_16,lyc4_16,mat1_16,mat2_16,mat3_16,mat4_16);
								}
								else{
									$("#tabla_planea").empty();
									$("#dv_info_graf_nlogrolyc").empty();
										$("#dv_info_graf_nlogrolyc").append('<input type="text" value="No se encontraron datos">');
										$("#dv_info_graf_nlogromat").empty();
								}
							})
							.fail(function(e) {
								console.error("Error in "); console.table(e);
							});
            });



$("#btn_buscar_ries_esc").click(function(e){
              e.preventDefault();
							let id_bim = $("#slt_bimestre_ries").val();
							let ciclo = $("#slt_ciclo_ries").val();
							let id_cct = $("#in_id_cct").val();
							let grafr = new GraficasRiesgo();
							// alert(ciclo);
							$.ajax({
				        url:  base_url+"info/info_riesgo_graf",
				        method: 'POST',
				        data: {'id_cct':id_cct,'id_bim':id_bim,'ciclo':ciclo}
				      })
				      .done(function( data ) {
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

								break;
								case '5':
													$("#dv_riesgo_esc_pie").empty();
													$("#dv_riesgo_esc_bar").empty();
													grafr.TablaPieGraficaPie(q1,q2,q3,q4);
													grafr.TablaPieGraficaBarSecundaria(t1,t2,t3);
								break;


								default:

								break;

								}
				      })
				      .fail(function(e) {
				        console.error("Error in "); console.table(e);
				      });



            });
