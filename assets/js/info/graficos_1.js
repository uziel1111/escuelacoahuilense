


function HaceGraficas(arr_datos){

    obj_graficas = this;
    //
    // var valor_bim =  '';
    // var valor_cic =  '';
    console.log(arr_datos);
    // obj_graficas.arr_estadistica = [];

      // obj_graficas.arr_estadistica = arr_datos['estadistica'];
      // obj_graficas.arr_riesgo = [];
      // obj_graficas.arr_riesgo = arr_datos['riesgo'];
      // obj_graficas.arr_riesgot = [];
      // obj_graficas.arr_riesgot = arr_datos['riesgot'];
      // obj_graficas.arr_btnnewriesgo = [];
      // obj_graficas.arr_btnnewriesgo = arr_datos['btnnewriesgo'];

      // var valor_cct =  obj_graficas.arr_btnnewriesgo['cct'];
      // var valor_nvl =  obj_graficas.arr_btnnewriesgo['nivel'];
      // var valor_tno =  obj_graficas.arr_btnnewriesgo['turno'];
      /* Obtenemos el valor de los select correspondientes a riesgo de abandono*/


    // Variables para guardar las cifras correspondiente a estadísticas de alumnos, grupos y docentes.
    var a_g1 =  parseInt(arr_datos.estadis_alumnos_escuela[0]['alumn_t_1']);//5;
    var a_g2 =  parseInt(arr_datos.estadis_alumnos_escuela[0]['alumn_t_2']);//5;
    var a_g3 =  parseInt(arr_datos.estadis_alumnos_escuela[0]['alumn_t_3']);//7;
    var a_g4 =  parseInt(arr_datos.estadis_alumnos_escuela[0]['alumn_t_4']);//8;
    var a_g5 =  parseInt(arr_datos.estadis_alumnos_escuela[0]['alumn_t_5']);//8;
    var a_g6 =  parseInt(arr_datos.estadis_alumnos_escuela[0]['alumn_t_6']);//8;

    var g_g1 =  parseInt(arr_datos.estadis_grupos_escuela[0]['grupos_1']);//3;
    var g_g2 =  parseInt(arr_datos.estadis_grupos_escuela[0]['grupos_2']);//3;
    var g_g3 =  parseInt(arr_datos.estadis_grupos_escuela[0]['grupos_3']);//3;
    var g_g4 =  parseInt(arr_datos.estadis_grupos_escuela[0]['grupos_4']);//3;
    var g_g5 =  parseInt(arr_datos.estadis_grupos_escuela[0]['grupos_5']);//3;
    var g_g6 =  parseInt(arr_datos.estadis_grupos_escuela[0]['grupos_6']);//3;

    var d_g1 =  parseInt(arr_datos.estadis_docentes_escuela[0]['docentes_1_g']);//3;
    var d_g2 =  parseInt(arr_datos.estadis_docentes_escuela[0]['docentes_2_g']);//3;
    var d_g3 =  parseInt(arr_datos.estadis_docentes_escuela[0]['docentes_3_g']);//3;
    var d_g4 =  parseInt(arr_datos.estadis_docentes_escuela[0]['docentes_4_g']);//3;
    var d_g5 =  parseInt(arr_datos.estadis_docentes_escuela[0]['docentes_5_g']);//3;
    var d_g6 =  parseInt(arr_datos.estadis_docentes_escuela[0]['docentes_6_g']);//3;

    // var g_mg =  20;//3;
    //
    var t_docentes =  d_g1+d_g2+d_g3+d_g4+d_g5+d_g6;//10;
    var t_alumnos  =  parseInt(arr_datos.estadis_alumnos_escuela[0]['alumn_t_t']);//10;
    var t_grupos   =  g_g1+g_g2+g_g3+g_g4+g_g5+g_g6;//10;

    //
    // var q1 = parseInt(obj_graficas.arr_riesgo['muyalto']);
    // var q2 = parseInt(obj_graficas.arr_riesgo['alto']);
    // var q3 = parseInt(obj_graficas.arr_riesgo['medio']);
    // var q4 = parseInt(obj_graficas.arr_riesgo['bajo']);
    //
    //
    // var t1 = parseInt(obj_graficas.arr_riesgot['total1']);
    // var t2 = parseInt(obj_graficas.arr_riesgot['total2']);
    // var t3 = parseInt(obj_graficas.arr_riesgot['total3']);
    // var t4 = parseInt(obj_graficas.arr_riesgot['total4']);
    // var t5 = parseInt(obj_graficas.arr_riesgot['total5']);
    // var t6 = parseInt(obj_graficas.arr_riesgot['total6']);
    //
    // var cadena_nivel = '';
    //
    // obj_graficas.arr_ind_perma = [];
    // obj_graficas.arr_ind_perma = arr_datos['ind_perma'];
    //
    // var valor_retencion =  obj_graficas.arr_ind_perma['valor_retencion'];
    // var valor_aprobacion =  obj_graficas.arr_ind_perma['valor_aprobacion'];
    // var valor_et =  obj_graficas.arr_ind_perma['valor_et'];
    // var valor_ete =  obj_graficas.arr_ind_perma['valor_ete'];
    //
    // var valor_retencion  = parseFloat(valor_retencion);
    // var valor_aprobacion = parseFloat(valor_aprobacion);
    // var valor_et = parseFloat(valor_et);
    // var valor_ete = parseFloat(valor_ete);
    //
    // obj_graficas.array_planea = [];
    // obj_graficas.array_planea = arr_datos['planea'];
    //
    //
    var lyc1_15  = parseFloat(arr_datos.planea15_escuela[0]['lyc_i']);
    var lyc2_15  = parseFloat(arr_datos.planea15_escuela[0]['lyc_ii']);
    var lyc3_15  = parseFloat(arr_datos.planea15_escuela[0]['lyc_iii']);
    var lyc4_15  = parseFloat(arr_datos.planea15_escuela[0]['lyc_iv']);
    var mat1_15  = parseFloat(arr_datos.planea15_escuela[0]['mat_i']);
    var mat2_15  = parseFloat(arr_datos.planea15_escuela[0]['mat_ii']);
    var mat3_15  = parseFloat(arr_datos.planea15_escuela[0]['mat_iii']);
    var mat4_15  = parseFloat(arr_datos.planea15_escuela[0]['mat_iv']);

    var lyc1_16  = parseFloat(arr_datos.planea16_escuela[0]['lyc_i']);
    var lyc2_16  = parseFloat(arr_datos.planea16_escuela[0]['lyc_ii']);
    var lyc3_16  = parseFloat(arr_datos.planea16_escuela[0]['lyc_iii']);
    var lyc4_16  = parseFloat(arr_datos.planea16_escuela[0]['lyc_iv']);
    var mat1_16  = parseFloat(arr_datos.planea16_escuela[0]['mat_i']);
    var mat2_16  = parseFloat(arr_datos.planea16_escuela[0]['mat_ii']);
    var mat3_16  = parseFloat(arr_datos.planea16_escuela[0]['mat_iii']);
    var mat4_16  = parseFloat(arr_datos.planea16_escuela[0]['mat_iv']);


 this.GraficoEstadisticaPrimaria_alumn = function(){
      Highcharts.theme = {
            colors: ['#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2', '#3C5AA2', '#3C5AA2',
                     '#3C5AA2', '#3C5AA2', '#3C5AA2'],
            chart: {
                backgroundColor: {
                    linearGradient: [0, 0, 0, 0],
                    stops: [
                        [0, 'rgb(255, 255, 255)'],
                        [1, 'rgb(255, 255, 255)']
                    ]
                },
            },
            title: {
                style: {
                    color: '#000',
                    font: 'bold 18px'
                }
            },
            subtitle: {
                style: {
                    color: 'blue',
                    font: 'bold 20px'
                }
            },

            legend: {
                itemStyle: {
                    font: '9pt',
                    color: 'black'
                },
                itemHoverStyle:{
                    color: 'gray'
                }
            }
      };

      // Apply the theme
      Highcharts.setOptions(Highcharts.theme);

      // Codigo para graficar la seccion estadistica de la escuela
      // Create the chart
      var defaultSubtitle = "Total de alumnos: "+t_alumnos
      var estadPrimaria = new Highcharts.chart('dv_info_graf_alumn', {
          lang: {
              drillUpText: ''
          },
          credits: {
              enabled: false
          },
          chart: {
              type: 'column',
              events: {

                }
          },
          title: {
              text: 'Alumnos'
          },
          subtitle: {
              text: defaultSubtitle
          },
          xAxis: {
              type: 'category',
              title: {
                  text: 'Grados'
              }
          },
          yAxis: {
              title: {
                  text: 'Número de alumnos'
              }

          },
          legend: {
              enabled: false
          },
          plotOptions: {
              series: {
                  borderWidth: 0,
                  dataLabels: {
                      enabled: true,
                      format: '{point.y}'
                  }
              }
          },

          tooltip: {
              headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
              pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
          },

          series: [{
              name: 'Número de alumnos en',
              colorByPoint: true,
              data: [
                      [
                          '1º',
                          a_g1
                      ],
                      [
                          '2º',
                          a_g2
                      ],
                      [
                          '3º',
                          a_g3
                      ],
                      [
                          '4º',
                          a_g4
                      ],
                      [
                          '5º',
                          a_g5
                      ],
                      [
                          '6º',
                          a_g6
                      ]
                  ]
          }]

      });

      $(".highcharts-background").css("fill","#FFF");
      if (screen.width<600){
        estadPrimaria.setSize(
            ($(document).width()/10)*5,
            400,
           false
        );
      }
      else {
        estadPrimaria.setSize(
            ($(document).width()/10)*7,
            400,
           false
        );
      }

    }//GraficoEstadisticaPrimaria_alumn

  this.GraficoEstadisticaPrimaria_grupos = function(){
         Highcharts.theme = {
               colors: ['#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462', '#ECC462', '#ECC462',
                        '#ECC462', '#ECC462', '#ECC462'],
               chart: {
                   backgroundColor: {
                       linearGradient: [0, 0, 0, 0],
                       stops: [
                           [0, 'rgb(255, 255, 255)'],
                           [1, 'rgb(255, 255, 255)']
                       ]
                   },
               },
               title: {
                   style: {
                       color: '#000',
                       font: 'bold 18px'
                   }
               },
               subtitle: {
                   style: {
                       color: 'blue',
                       font: 'bold 20px'
                   }
               },

               legend: {
                   itemStyle: {
                       font: '9pt',
                       color: 'black'
                   },
                   itemHoverStyle:{
                       color: 'gray'
                   }
               }
         };

         // Apply the theme
         Highcharts.setOptions(Highcharts.theme);

         // Codigo para graficar la seccion estadistica de la escuela
         // Create the chart
         var defaultSubtitle = "Total de grupos: "+t_grupos
         var estadPrimaria = new Highcharts.chart('dv_info_graf_grupos', {
             lang: {
                 drillUpText: ''
             },
             credits: {
                 enabled: false
             },
             chart: {
                 type: 'column',
                 events: {

                   }
             },
             title: {
                 text: 'Grupos'
             },
             subtitle: {
                 text: defaultSubtitle
             },
             xAxis: {
                 type: 'category',
                 title: {
                     text: 'Grados'
                 }
             },
             yAxis: {
                 title: {
                     text: 'Número de grupos'
                 }

             },
             legend: {
                 enabled: false
             },
             plotOptions: {
                 series: {
                     borderWidth: 0,
                     dataLabels: {
                         enabled: true,
                         format: '{point.y}'
                     }
                 }
             },

             tooltip: {
                 headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                 pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
             },

             series: [{
                 name: 'Número de grupos en',
                 colorByPoint: true,
                 data: [
                      [
                          '1º',
                          g_g1
                      ],
                      [
                          '2º',
                          g_g2
                      ],
                      [
                          '3º',
                          g_g3
                      ],
                      [
                          '4º',
                          g_g4
                      ],
                      [
                          '5º',
                          g_g5
                      ],
                      [
                          '6º',
                          g_g6
                      ]/*,
                      [
                          'Multigrado',
                          g_mg
                      ]*/
                  ]
             }]

         });

         $(".highcharts-background").css("fill","#FFF");
         if (screen.width<600){
           estadPrimaria.setSize(
               ($(document).width()/10)*5,
               400,
              false
           );
         }
         else {
           estadPrimaria.setSize(
               ($(document).width()/10)*7,
               400,
              false
           );
         }
       }//GraficoEstadisticaPrimaria_grupos

       this.GraficoEstadisticaPrimaria_docentes = function(){
            Highcharts.theme = {
                  colors: ['#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C', '#D5831C', '#D5831C',
                           '#D5831C', '#D5831C', '#D5831C'],
                  chart: {
                      backgroundColor: {
                          linearGradient: [0, 0, 0, 0],
                          stops: [
                              [0, 'rgb(255, 255, 255)'],
                              [1, 'rgb(255, 255, 255)']
                          ]
                      },
                  },
                  title: {
                      style: {
                          color: '#000',
                          font: 'bold 18px'
                      }
                  },
                  subtitle: {
                      style: {
                          color: 'blue',
                          font: 'bold 20px'
                      }
                  },

                  legend: {
                      itemStyle: {
                          font: '9pt',
                          color: 'black'
                      },
                      itemHoverStyle:{
                          color: 'gray'
                      }
                  }
            };

            // Apply the theme
            Highcharts.setOptions(Highcharts.theme);

            // Codigo para graficar la seccion estadistica de la escuela
            // Create the chart
            var defaultSubtitle = "Total de docentes: "+t_grupos
            var estadPrimaria = new Highcharts.chart('dv_info_graf_docen', {
                lang: {
                    drillUpText: ''
                },
                credits: {
                    enabled: false
                },
                chart: {
                    type: 'column',
                    events: {

                      }
                },
                title: {
                    text: 'Docentes'
                },
                subtitle: {
                    text: defaultSubtitle
                },
                xAxis: {
                    type: 'category',
                    title: {
                        text: 'Grados'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Número de docentes'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
                },

                series: [{
                    name: 'Número de docentes en',
                    colorByPoint: true,
                    data: [
                         [
                             '1º',
                             d_g1
                         ],
                         [
                             '2º',
                             d_g2
                         ],
                         [
                             '3º',
                             d_g3
                         ],
                         [
                             '4º',
                             d_g4
                         ],
                         [
                             '5º',
                             d_g5
                         ],
                         [
                             '6º',
                             d_g6
                         ]/*,
                         [
                             'Multigrado',
                             g_mg
                         ]*/
                     ]
                }]

            });

            $(".highcharts-background").css("fill","#FFF");
            if (screen.width<600){
              estadPrimaria.setSize(
                  ($(document).width()/10)*5,
                  400,
                 false
              );
            }
            else {
              estadPrimaria.setSize(
                  ($(document).width()/10)*7,
                  400,
                 false
              );
            }
          }//GraficoEstadisticaPrimaria_docentes



          this.GraficoEstadisticaSecundaria_alumn = function(){
               Highcharts.theme = {
                     colors: ['#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2', '#3C5AA2', '#3C5AA2',
                              '#3C5AA2', '#3C5AA2', '#3C5AA2'],
                     chart: {
                         backgroundColor: {
                             linearGradient: [0, 0, 0, 0],
                             stops: [
                                 [0, 'rgb(255, 255, 255)'],
                                 [1, 'rgb(255, 255, 255)']
                             ]
                         },
                     },
                     title: {
                         style: {
                             color: '#000',
                             font: 'bold 18px'
                         }
                     },
                     subtitle: {
                         style: {
                             color: 'blue',
                             font: 'bold 20px'
                         }
                     },

                     legend: {
                         itemStyle: {
                             font: '9pt',
                             color: 'black'
                         },
                         itemHoverStyle:{
                             color: 'gray'
                         }
                     }
               };

               // Apply the theme
               Highcharts.setOptions(Highcharts.theme);

               // Codigo para graficar la seccion estadistica de la escuela
               // Create the chart
               var defaultSubtitle = "Total de alumnos: "+t_alumnos
               var estadPrimaria = new Highcharts.chart('dv_info_graf_alumn', {
                   lang: {
                       drillUpText: ''
                   },
                   credits: {
                       enabled: false
                   },
                   chart: {
                       type: 'column',
                       events: {

                         }
                   },
                   title: {
                       text: 'Alumnos'
                   },
                   subtitle: {
                       text: defaultSubtitle
                   },
                   xAxis: {
                       type: 'category',
                       title: {
                           text: 'Grados'
                       }
                   },
                   yAxis: {
                       title: {
                           text: 'Número de alumnos'
                       }

                   },
                   legend: {
                       enabled: false
                   },
                   plotOptions: {
                       series: {
                           borderWidth: 0,
                           dataLabels: {
                               enabled: true,
                               format: '{point.y}'
                           }
                       }
                   },

                   tooltip: {
                       headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                       pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
                   },

                   series: [{
                       name: 'Número de alumnos en',
                       colorByPoint: true,
                       data: [
                               [
                                   '1º',
                                   a_g1
                               ],
                               [
                                   '2º',
                                   a_g2
                               ],
                               [
                                   '3º',
                                   a_g3
                               ]
                           ]
                   }]

               });

               $(".highcharts-background").css("fill","#FFF");
               if (screen.width<600){
                 estadPrimaria.setSize(
                     ($(document).width()/10)*5,
                     400,
                    false
                 );
               }
               else {
                 estadPrimaria.setSize(
                     ($(document).width()/10)*7,
                     400,
                    false
                 );
               }
             }//GraficoEstadisticaSecundaria_alumn

           this.GraficoEstadisticaSecundaria_grupos = function(){
                  Highcharts.theme = {
                        colors: ['#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462', '#ECC462', '#ECC462',
                                 '#ECC462', '#ECC462', '#ECC462'],
                        chart: {
                            backgroundColor: {
                                linearGradient: [0, 0, 0, 0],
                                stops: [
                                    [0, 'rgb(255, 255, 255)'],
                                    [1, 'rgb(255, 255, 255)']
                                ]
                            },
                        },
                        title: {
                            style: {
                                color: '#000',
                                font: 'bold 18px'
                            }
                        },
                        subtitle: {
                            style: {
                                color: 'blue',
                                font: 'bold 20px'
                            }
                        },

                        legend: {
                            itemStyle: {
                                font: '9pt',
                                color: 'black'
                            },
                            itemHoverStyle:{
                                color: 'gray'
                            }
                        }
                  };

                  // Apply the theme
                  Highcharts.setOptions(Highcharts.theme);

                  // Codigo para graficar la seccion estadistica de la escuela
                  // Create the chart
                  var defaultSubtitle = "Total de grupos: "+t_grupos
                  var estadPrimaria = new Highcharts.chart('dv_info_graf_grupos', {
                      lang: {
                          drillUpText: ''
                      },
                      credits: {
                          enabled: false
                      },
                      chart: {
                          type: 'column',
                          events: {

                            }
                      },
                      title: {
                          text: 'Grupos'
                      },
                      subtitle: {
                          text: defaultSubtitle
                      },
                      xAxis: {
                          type: 'category',
                          title: {
                              text: 'Grados'
                          }
                      },
                      yAxis: {
                          title: {
                              text: 'Número de grupos'
                          }

                      },
                      legend: {
                          enabled: false
                      },
                      plotOptions: {
                          series: {
                              borderWidth: 0,
                              dataLabels: {
                                  enabled: true,
                                  format: '{point.y}'
                              }
                          }
                      },

                      tooltip: {
                          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
                      },

                      series: [{
                          name: 'Número de grupos en',
                          colorByPoint: true,
                          data: [
                               [
                                   '1º',
                                   g_g1
                               ],
                               [
                                   '2º',
                                   g_g2
                               ],
                               [
                                   '3º',
                                   g_g3
                               ]
                           ]
                      }]

                  });

                  $(".highcharts-background").css("fill","#FFF");
                  if (screen.width<600){
                    estadPrimaria.setSize(
                        ($(document).width()/10)*5,
                        400,
                       false
                    );
                  }
                  else {
                    estadPrimaria.setSize(
                        ($(document).width()/10)*7,
                        400,
                       false
                    );
                  }
                }//GraficoEstadisticaSecundaria_grupos

                this.GraficoEstadisticaSecundaria_docentes = function(){
                     Highcharts.theme = {
                           colors: ['#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C', '#D5831C', '#D5831C',
                                    '#D5831C', '#D5831C', '#D5831C'],
                           chart: {
                               backgroundColor: {
                                   linearGradient: [0, 0, 0, 0],
                                   stops: [
                                       [0, 'rgb(255, 255, 255)'],
                                       [1, 'rgb(255, 255, 255)']
                                   ]
                               },
                           },
                           title: {
                               style: {
                                   color: '#000',
                                   font: 'bold 18px'
                               }
                           },
                           subtitle: {
                               style: {
                                   color: 'blue',
                                   font: 'bold 20px'
                               }
                           },

                           legend: {
                               itemStyle: {
                                   font: '9pt',
                                   color: 'black'
                               },
                               itemHoverStyle:{
                                   color: 'gray'
                               }
                           }
                     };

                     // Apply the theme
                     Highcharts.setOptions(Highcharts.theme);

                     // Codigo para graficar la seccion estadistica de la escuela
                     // Create the chart
                     var defaultSubtitle = "Total de docentes: "+t_grupos
                     var estadPrimaria = new Highcharts.chart('dv_info_graf_docen', {
                         lang: {
                             drillUpText: ''
                         },
                         credits: {
                             enabled: false
                         },
                         chart: {
                             type: 'column',
                             events: {

                               }
                         },
                         title: {
                             text: 'Docentes'
                         },
                         subtitle: {
                             text: defaultSubtitle
                         },
                         xAxis: {
                             type: 'category',
                             title: {
                                 text: 'Grados'
                             }
                         },
                         yAxis: {
                             title: {
                                 text: 'Número de docentes'
                             }

                         },
                         legend: {
                             enabled: false
                         },
                         plotOptions: {
                             series: {
                                 borderWidth: 0,
                                 dataLabels: {
                                     enabled: true,
                                     format: '{point.y}'
                                 }
                             }
                         },

                         tooltip: {
                             headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                             pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
                         },

                         series: [{
                             name: 'Número de docentes en',
                             colorByPoint: true,
                             data: [
                                  [
                                      '1º',
                                      d_g1
                                  ],
                                  [
                                      '2º',
                                      d_g2
                                  ],
                                  [
                                      '3º',
                                      d_g3
                                  ]
                              ]
                         }]

                     });

                     $(".highcharts-background").css("fill","#FFF");
                     if (screen.width<600){
                       estadPrimaria.setSize(
                           ($(document).width()/10)*5,
                           400,
                          false
                       );
                     }
                     else {
                       estadPrimaria.setSize(
                           ($(document).width()/10)*7,
                           400,
                          false
                       );
                     }
                   }//GraficoEstadisticaSecundaria_docentes






this.GraficoEstadisticaOtros = function(){
      Highcharts.theme = {
            //colors: ['#50B432', '#07A4B5', '#ED561B', '#006080', '#24CBE5', '#64E572',
            //colors: ['#50B432', '#ED561B', '#8B4513', '#006080', '#24CBE5', '#64E572',
            colors: ['#3C5AA2','#ECC462','#D5831C','#ECC462','#25383C','#A52A2A','#3CB371','#64E572', '#24CBE5', '#006080',
                     '#FF9655', '#FFF263', '#058DC7'],
            chart: {
                backgroundColor: {
                    linearGradient: [0, 0, 0, 0],
                    stops: [
                        [0, 'rgb(255, 255, 255)'],
                        [1, 'rgb(255, 255, 255)']
                    ]
                },
            },
            title: {
                style: {
                    color: '#000',
                    font: 'bold 16px'
                }
            },
            subtitle: {
                style: {
                    color: '#666666',
                    font: 'bold 14px'
                }
            },

            legend: {
                itemStyle: {
                    font: '9pt',
                    color: 'black'
                },
                itemHoverStyle:{
                    color: 'gray'
                }
            }
      };

      // Apply the theme
      Highcharts.setOptions(Highcharts.theme);

      // Codigo para graficar la seccion estadistica de la escuela
      // Create the chart
      var estadPrimaria = new Highcharts.chart('dv_info_graf_alumn', {
          lang: {
              drillUpText: ''
          },
          credits: {
              enabled: false
          },
          chart: {
              type: 'column'
          },
          title: {
              text: ''
          },
          subtitle: {
              text: ''
          },
          xAxis: {
              type: 'category'
          },
          yAxis: {
              title: {
                  text: 'Cantidad'
              }

          },
          legend: {
              enabled: false
          },
          plotOptions: {
              series: {
                  borderWidth: 0,
                  dataLabels: {
                      enabled: true,
                      format: '{point.y}'
                  }
              }
          },

          tooltip: {
              headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
              pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
          },

          series: [{
              name: 'Estadística',
              colorByPoint: true,
              data: [{
                  name: 'Alumnos',
                  y: t_alumnos,
                  drilldown: 'Alumnos'
              }, {
                  name: 'Grupos',
                  y: t_grupos,
                  drilldown: 'Grupos'
              }, {
                  name: 'Docentes',
                  y: t_docentes,
                  drilldown: 'Docentes'
              }]
          }]
      });

      $(".highcharts-background").css("fill","#FFF");
      if (screen.width<600){
        estadPrimaria.setSize(
            ($(document).width()/10)*5,
            400,
           false
        );
      }
      else {
        estadPrimaria.setSize(
            ($(document).width()/10)*7,
            400,
           false
        );
      }
    }



this.DibujarRadialProgressBarR = function(){
    //  Dibujamos el radial progress bar para Retención
    var bar = new ProgressBar.Circle(containerRPB01, {
      color: '#888888',
      strokeWidth: 8,
      trailWidth: 5,
      easing: 'easeInOut',
      duration: 9400,
      text: {
        autoStyleContainer: false
      },
      from: { color: '#D6DADC', width: 5 },
      to: { color: '#3C5AA2', width: 8 }, //#07A4B5
      // Set default step function for all animate calls
      step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        if(circle.value()==1.0){
          var value = Math.round(circle.value() * 100);
        }
        else {
          var value = circle.value() * 100;
        value = value.toFixed(2);
        }
        if (value === 0) {
          circle.setText('');
        } else {
          if (value>1) {
            circle.setText(valor_retencion+'%');
          }
          else {
            circle.setText(value+'%');
          }

        }

      }
    });
    bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(Math.min(valor_retencion/100, 1));  // Number from 0.0 to 1.0
  }

  this.DibujarRadialProgressBarAete = function(){
      // Dibujamos el radial progress bar para Eficiencia Terminal
      var bar = new ProgressBar.Circle(containerRPB03ete, {
        color: '#888888',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 8,
        trailWidth: 5,
        easing: 'easeInOut',
        duration: 7400,
        text: {
          autoStyleContainer: false
        },
        from: { color: '#FFA500', width: 5 },
        to: { color: '#ECC462', width: 8 },
        // Set default step function for all animate calls
        step: function(state, circle) {
          circle.path.setAttribute('stroke', state.color);
          circle.path.setAttribute('stroke-width', state.width);

          if(circle.value()==1.0){
            var value = Math.round(circle.value() * 100);
          }
          else {
            var value = circle.value() * 100;
          value = value.toFixed(2);
          }
          if (value === 0) {
            circle.setText('');
          } else {
            if (value>1) {
              circle.setText(valor_ete.toFixed(2)+'%');
            }
            else {
              circle.setText(value+'%');
            }
          }

        }
      });
      bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
      bar.text.style.fontSize = '2rem';

      bar.animate(Math.min(valor_ete/100, 1));  // Number from 0.0 to 1.0
    }

  this.DibujarRadialProgressBarA = function(){
    // Dibujamos el radial progress bar para Aprobación
    var bar = new ProgressBar.Circle(containerRPB02, {
      color: '#888888',
      // This has to be the same size as the maximum width to
      // prevent clipping
      strokeWidth: 8,
      trailWidth: 5,
      easing: 'easeInOut',
      duration: 6400,
      text: {
        autoStyleContainer: false
      },
      from: { color: '#D6DADC', width: 5 },
      to: { color: '#FF9900', width: 8 }, /*e50016 rojo negativo para el usuario*/
      // Set default step function for all animate calls
      step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        if(circle.value()==1.0){
          var value = Math.round(circle.value() * 100);
        }
        else {
          var value = circle.value() * 100;
        value = value.toFixed(2);
        }
        if (value === 0) {
          circle.setText('');
        } else {
          if (value>1) {
            circle.setText(valor_aprobacion+'%');
          }
          else {
            circle.setText(value+'%');
          }
        }

      }
    });
    bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(Math.min(valor_aprobacion/100, 1));  // Number from 0.0 to 1.0
  }
  this.DibujarRadialProgressBarET = function(){
    // Dibujamos el radial progress bar para Eficiencia Terminal
    var bar = new ProgressBar.Circle(containerRPB03, {
      color: '#888888',
      // This has to be the same size as the maximum width to
      // prevent clipping
      strokeWidth: 8,
      trailWidth: 5,
      easing: 'easeInOut',
      duration: 7400,
      text: {
        autoStyleContainer: false
      },
      from: { color: '#D6DADC', width: 5 },
      to: { color: '#ECC462', width: 8 },
      // Set default step function for all animate calls
      step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        if(circle.value()==1.0){
          var value = Math.round(circle.value() * 100);
        }
        else {
          var value = circle.value() * 100;
        value = value.toFixed(2);
        }
        if (value === 0) {
          circle.setText('');
        } else {
          if (value>1) {
            circle.setText(valor_et+'%');
          }
          else {
            circle.setText(value+'%');
          }
        }

      }
    });
    bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(Math.min(valor_et/100, 1));  // Number from 0.0 to 1.0
  }


  this.PieDrilldownPlanea05y06 = function(){

        Highcharts.theme = {
            colors: ['#ECC462','#D5831C','#935116','#CCCC00','#FF9900','#3C5AA2'],
            chart: {
                backgroundColor: {
                    linearGradient: [0, 0, 0, 0],
                    stops: [
                        [0, 'rgb(255, 255, 255)'],
                        [1, 'rgb(255, 255, 255)']
                    ]
                },
            },
            title: {
                style: {
                    color: '#000',
                    font: 'bold 16px'
                }
            },
            subtitle: {
                style: {
                    color: '#666666',
                    font: 'bold 14px'
                }
            },

            legend: {
                itemStyle: {
                    font: '9pt',
                    color: 'black'
                },
                itemHoverStyle:{
                    color: 'gray'
                }
            }
        };

        // Apply the theme
        Highcharts.setOptions(Highcharts.theme);

        // Dibujamos un grafico tipo pie-drilldown planea 2015
        // Creamos la gráfica
        var defaultTitle="Resultados PLANEA 2015 " ;
        var defaultSubtitle="Haz clic para ver los porcentajes por área.";
        // var drilldownTitle = "Matemáticas";

          var chartp2015 = new Highcharts.chart('dv_info_graf_nlogromat', {
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'column'
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">Lenguaje y Comunicación</b>'
              },
              legend: {
                  enabled: false
              },
              subtitle: {
                  //text: 'PLANEA 2015 y PLANEA 2016 ('+cadena_nivel+')'
              },
              xAxis: {
                  categories: [
                      'I <br> Insuficiente',
                      'II <br> Elemental',
                      'III <br> Bueno',
                      'IV <br>Excelente'
                  ],
                  crosshair: true
              },
              yAxis: {
                  min: 0,
                  title: {
                      text: 'Nivel de logro (%)'
                  }
              },
              plotOptions: {
                  series: {
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },
                  column: {
                      pointPadding: 0.2,
                      borderWidth: 0
                  }
              },
              tooltip: {
                  headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                      '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
                  footerFormat: '</table>',
                  shared: true,
                  useHTML: true
              },
              series: [{
                  name: 'Leng. y comunicación 2015',
                  data: [lyc1_15, lyc2_15, lyc3_15, lyc4_15]

              }, {
                  name: 'Leng. y comunicación 2016',
                  data: [lyc1_16, lyc2_16, lyc3_16, lyc4_16]

              },]
          });





        // Dibujamos un grafico tipo pie-drilldown planea 2016
        // Create the chart
        var defaultTitle="Resultados PLANEA 2016 ";
        var defaultSubtitle="Haz clic para ver los porcentajes por área.";
        // var drilldownTitle = "Matemáticas";

        var chartp2016 = new Highcharts.chart('dv_info_graf_nlogrolyc', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: '<b style="font-size: 2.3vh;">Matemáticas</b>'
            },
            legend: {
                enabled: false
            },
            subtitle: {
                //text: 'PLANEA 2015 y PLANEA 2016 ('+cadena_nivel+')'
            },
            xAxis: {
                categories: [
                    'I <br> Insuficiente',
                    'II <br> Elemental',
                    'III <br> Bueno',
                    'IV <br>Excelente'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nivel de logro (%)'
                }
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                },
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            series: [{
                name: 'Matemáticas 2015',
                data: [mat1_15, mat2_15, mat3_15, mat4_15]

            }, {
                name: 'Matemáticas 2016',
                data: [mat1_16, mat2_16, mat3_16, mat4_16]

            }]
        });



        // Apply background-color
        $(".highcharts-background").css("fill","#FFF");
        if (screen.width<600){
          chartp2015.setSize(
              ($(document).width()/10)*5,
              400,
             false
          );
        }
        else {
          chartp2015.setSize(
              ($(document).width()/10)*7,
              400,
             false
          );
        }

        if (screen.width<600){
          chartp2016.setSize(
              ($(document).width()/10)*5,
              400,
             false
          );
        }
        else {
          chartp2016.setSize(
              ($(document).width()/10)*7,
              400,
             false
          );
        }


    }

    this.TablaPieGraficaPie = function(){

          Highcharts.theme = {
              //colors: ['#50B432', '#07A4B5', '#ED561B', '#006080', '#24CBE5', '#64E572',
              colors: ['#FF0000', '#FF9900', '#FFFF00', '#3CB371', '#24CBE5', '#64E572',
                       '#FF9655', '#FFF263', '#058DC7'],
              chart: {
                  backgroundColor: {
                      linearGradient: [0, 0, 500, 500],
                      stops: [
                          [0, 'rgb(255, 255, 255)'],
                          [1, 'rgb(240, 240, 255)']
                      ]
                  },
              },
              title: {
                  style: {
                      color: '#000',
                      font: 'bold 12px'
                  }
              },
              subtitle: {
                  style: {
                      color: '#666666',
                      font: 'bold 12px'
                  }
              },

              legend: {
                  itemStyle: {
                      font: '9pt',
                      color: 'black'
                  },
                  itemHoverStyle:{
                      color: 'gray'
                  }
              }
          };

          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);

          // Build the chart
          estadPrimaria= new Highcharts.chart('containerpiechartRiesgo', {
              credits: {
                  enabled: false
              },
              chart: {
                  plotBackgroundColor: null,
                  plotBorderWidth: null,
                  plotShadow: false,
                  type: 'pie'
              },
              title: {
                  text: '<b style="font-size: 2.3vw;"><br>Proporciones de acuerdo a matrícula escolar</b>'
              },
              tooltip: {
                  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
              },
              plotOptions: {
                  pie: {
                      allowPointSelect: true,
                      cursor: 'pointer',
                      dataLabels: {
                          enabled: true,
                          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                          style: {
                              color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                          }
                      },
                      showInLegend: false /*Ocultamos o Muy ALto  o Alto o Medio o Bajo*/
                  }
              },
              series: [{
                  name: 'Porcentaje',
                  colorByPoint: true,
                  data: [{
                      name: 'Muy alto',
                      y: q1,
                      sliced: true,
                      selected: true
                  }, {
                      name: 'Alto',
                      y: q2
                  }, {
                      name: 'Medio',
                      y: q3
                  }, {
                      name: 'Bajo',
                      y: q4
                  }]
              }]
          });

          $(".highcharts-background").css("fill","#FFF");
          if (screen.width<600){
            estadPrimaria.setSize(
                ($(document).width()/10)*5,
                400,
               false
            );
          }
          else {
            estadPrimaria.setSize(
                ($(document).width()/10)*7,
                400,
               false
            );
          }

        }




this.TablaPieGraficaBarPrimaria= function(){

        Highcharts.theme = {
            colors: ['#DAA520','#228B22','#696969','#8B008B','#228B22','#DAA520',
                     '#FF9655', '#FFF263', '#058DC7'],
            chart: {
                backgroundColor: {
                    linearGradient: [0, 0, 500, 500],
                    stops: [
                        [0, 'rgb(255, 255, 255)'],
                        [1, 'rgb(240, 240, 255)']
                    ]
                },
            },
            title: {
                style: {
                    color: '#000',
                    font: 'bold 16px'
                }
            },
            subtitle: {
                style: {
                    color: '#666666',
                    font: 'bold 12px'
                }
            },

            legend: {
                itemStyle: {
                    font: '9pt',
                    color: 'black'
                },
                itemHoverStyle:{
                    color: 'gray'
                }
            }
        };

        // Apply the theme
        Highcharts.setOptions(Highcharts.theme);

        // Gráfica opcion 2 para distribucion por grado Riesgo de abandono escolar
        estadPrimaria = new Highcharts.chart('containerbarchartRiesgo', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: '<b style="font-size: 2.3vw;"><br>Distribución por grado</b>'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    '1er °',
                    '2do °',
                    '3er °',
                    '4to °',
                    '5to °',
                    '6to °'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Alumnos'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    showInLegend: false /*Ocultamos a la vista del usuario   o Alumnos*/
                }
            },
            series: [{
                name: 'Alumnos',
                data: [t1,t2,t3,t4,t5,t6]
            }]
        });

        // Apply background-color
        $(".highcharts-background").css("fill","#FFF");
        if (screen.width<600){
          estadPrimaria.setSize(
              ($(document).width()/10)*5,
              400,
             false
          );
        }
        else {
          estadPrimaria.setSize(
              ($(document).width()/10)*7,
              400,
             false
          );
        }

      }



this.TablaPieGraficaBarSecundaria= function(){

        Highcharts.theme = {
            colors: ['#DAA520','#228B22','#696969','#8B008B','#228B22','#DAA520',
                     '#FF9655', '#FFF263', '#058DC7'],
            chart: {
                backgroundColor: {
                    linearGradient: [0, 0, 500, 500],
                    stops: [
                        [0, 'rgb(255, 255, 255)'],
                        [1, 'rgb(240, 240, 255)']
                    ]
                },
            },
            title: {
                style: {
                    color: '#000',
                    font: 'bold 16px'
                }
            },
            subtitle: {
                style: {
                    color: '#666666',
                    font: 'bold 12px'
                }
            },

            legend: {
                itemStyle: {
                    font: '9pt',
                    color: 'black'
                },
                itemHoverStyle:{
                    color: 'gray'
                }
            }
        };

        // Apply the theme
        Highcharts.setOptions(Highcharts.theme);

        // Gráfica opcion 2 para distribucion por grado Riesgo de abandono escolar
        estadPrimaria = new Highcharts.chart('containerbarchartRiesgo', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: '<b style="font-size: 2.3vw;">Distribución por grado</b>'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    '1er °',
                    '2do °',
                    '3er °'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Alumnos'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    showInLegend: false
                }
            },
            series: [{
                name: 'Alumnos',
                data: [t1,t2,t3]
            }]
        });

        // Apply background-color
        $(".highcharts-background").css("fill","#FFF");
        if (screen.width<600){
          estadPrimaria.setSize(
              ($(document).width()/10)*5,
              400,
             false
          );
        }
        else {
          estadPrimaria.setSize(
              ($(document).width()/10)*7,
              400,
             false
          );
        }

      }



      this.click_riesgo = function(){
      }





      this.get_riesgo_abandono = function(){
          var bimes = $("#select_opcbimestre").val();
          var ciclo = $("#select_opcciclo").val();
          var global_cct = $("#global_cct").val();
          var global_nombre_turno = $("#global_nombre_turno").val();
          var global_nivel = $("#global_nivel").val();
          if (bimes!=1 && ciclo=='2017-2018') {
            alert("AUN NO DISPONIBLE");

          }
          else {

          var ruta = base_url+"escuela/info_escuela_riesgoabandono";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'bimestre':bimes,'ciclo':ciclo,
                   'global_cct':global_cct, 'global_nombre_turno':global_nombre_turno,
                   'global_nivel':global_nivel},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
              swal.close();
              var result = data.respuesta;
              var html = result.html;
              $("#div_info_riesgoabandono").empty();
              $("#div_info_riesgoabandono").append(html);

              var arr_graficas = result.array_graficas;
              obj_graficas.hace_graficas(arr_graficas, global_nivel, function(result2){
                  if(result2==1){
                  }
              });
          })
          .fail(function(e) {
              console.error("Error in get_riesgo_abandono()"); console.table(e);
          });
        }
      }// get_riesgo_abandono()






      //////////////////////////////////////////////////////////// Por Unidades de Análisis
      //////////////////////////////////////////////////////////// Por Unidades de Análisis
      this.graficoplanea_ud_prim_lyc = function(arr_lyc,id_cct){
        // console.info(id_cct);

        arr_lyc.sort(function (a, b) {
            return (a.porcen_alum_respok - b.porcen_alum_respok)
        });
          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                    width: ($(document).width()/10)*6,
                    height: ($(document).width()/10)*15
                },
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    }
                },
                subtitle: {
                    style: {
                        color: 'blue'
                    }
                },

                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    }
                }
          };

          var arr_lyc_aux = new Array();;
          for (var i = 0; i < arr_lyc.length; i++){
             arr_lyc_aux.push({'id_cont': arr_lyc[i]['id_contenido'],'name': arr_lyc[i]['contenidos'],'y': parseFloat(arr_lyc[i]['porcen_alum_respok']),'drilldown': arr_lyc[i]['total_reac_xua']});
          }

          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);
          // Codigo para graficar la seccion estadistica de la escuela
          var estadPreescolar = new Highcharts.chart('dv_info_graf_contlyc', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'bar'
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2016</b>'
              },
              subtitle: {
                  text: '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+parseInt(arr_lyc[0]['alumnos_evaluados'])+'</b>'
              },
              xAxis: {
                  type: 'category'
              },
              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                  }
              },
              legend: {
                  enabled: false
              },
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
              },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },

                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,1,2);
                               }
                           }
                       }
                   }
                  //
              },

              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'
              },

              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_lyc_aux
              }],

          });

          $(".highcharts-background").css("fill","#FFF");
          // if (screen.width<600){
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*5,
          //       500,
          //      false
          //   );
          // }
          // else {
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*7,
          //       1000,
          //      false
          //   );
          // }
      }// graficoplanea_ud_prim_lyc()

      this.graficoplanea_ud_prim_mate = function(arr_mate,id_cct){
        // console.info(arr_mate);
        arr_mate.sort(function (a, b) {
            return (a.porcen_alum_respok - b.porcen_alum_respok)
        });
          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                    width: ($(document).width()/10)*6,
                    height: ($(document).width()/10)*12
                },
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    }
                },
                subtitle: {
                    style: {
                        color: 'blue',
                        font: 'bold 20px'
                    }
                },
                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    }
                }
          };
          var arr_mate_aux = new Array();;
          for (var i = 0; i < arr_mate.length; i++){
             arr_mate_aux.push({'id_cont': arr_mate[i]['id_contenido'],'name': arr_mate[i]['contenidos'],'y': parseFloat(arr_mate[i]['porcen_alum_respok']),'drilldown': arr_mate[i]['total_reac_xua']});
          }
          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);
          // Codigo para graficar la seccion estadistica de la escuela
          var estadPreescolar = new Highcharts.chart('dv_info_graf_contmat', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'bar'
                  // width: 1000
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2016</b>'
              },
              subtitle: {
                  text: '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+parseInt(arr_mate[0]['alumnos_evaluados'])+'</b>'
              },
              xAxis: {
                  type: 'category'
              },
              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                  }
              },
              legend: {
                  enabled: false
              },
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
              },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },
                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                 //console.info(this);
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,1,1);
                               }
                           }
                       }
                   }
              },
              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'

              },
              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_mate_aux
              }],
          });

          $(".highcharts-background").css("fill","#FFF");
          // $("#container_chartFreqAtaTailNum").highcharts().setSize(200, 200, false);
          // if (screen.width<600){
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*5,
          //       500,
          //      false
          //   );
          // }
          // else {
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*7,
          //       1000,
          //      false
          //   );
          // }

      }// graficoplanea_ud_prim_mate()

      this.graficoplanea_ud_secu_lyc = function(arr_lyc,id_cct){
        // console.info(arr_lyc);
        arr_lyc.sort(function (a, b) {
            return (a.porcen_alum_respok - b.porcen_alum_respok)
        });
          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                  /*
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                },
                */
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    },
                    text: '<b style="font-size: 2.3vh;">PLANEA 2016</b>'
                },
                subtitle: {
                    style: {
                        color: 'blue',
                        font: 'bold 20px'
                    },
                    text: '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+parseInt(arr_lyc[0]['alumnos_evaluados'])+'</b>'
                },
                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    },
                    enabled: false
                }
          };

          Highcharts.setOptions(Highcharts.theme);

          var arr_lyc_aux = new Array();;
          for (var i = 0; i < arr_lyc.length; i++){
             arr_lyc_aux.push({'id_cont': arr_lyc[i]['id_contenido'],'name': arr_lyc[i]['contenidos'],'y': parseFloat(arr_lyc[i]['porcen_alum_respok']),'drilldown': arr_lyc[i]['total_reac_xua']});
          }

          // Apply the theme

          // Codigo para graficar la seccion estadistica de la escuela
          var estadPreescolar = new Highcharts.chart('dv_info_graf_contlyc', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              /*
              chart: {
                  type: 'bar'
              },
              */
              chart: {
                  type: 'bar',
                  backgroundColor: {
                      linearGradient: [0, 0, 0, 0],
                      stops: [
                          [0, 'rgb(255, 255, 255)'],
                          [1, 'rgb(255, 255, 255)']
                      ]
                  },
                  width: ($(document).width()/10)*6,
                  height: ($(document).width()/10)*12
              },
              /*
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2016</b>'
              },
              subtitle: {
                  text: '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+arr_lyc[0]['alumnos_evaluados']+'</b>'
              },
              */
              xAxis: {
                  type: 'category'
              },

              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                      // text: '<div>Porcentaje de alumnos con respuestas correctas</div>'
                  },
                  /*
                  labels: {
                      overflow: 'justify'
                  }
                  */
              },
              /*
              legend: {
                  enabled: false
              },
              */
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
                     },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'

                      }
                  },

                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,1,2);
                               }
                           }
                       }
                   }
                  //
              },

              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'
              },

              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_lyc_aux
              }],

          });


          $(".highcharts-background").css("fill","#FFF");
          /*
          if (screen.width<600){
            estadPreescolar.setSize(
                ($(document).width()/10)*5,
                500,
               false
            );
          }
          else {
            estadPreescolar.setSize(
                ($(document).width()/10)*7,
                900,
               false
            );
          }
          */
      }// graficoplanea_ud_secu_lyc()

      this.graficoplanea_ud_secu_mate = function(arr_mate,id_cct){
        // console.info(arr_mate);
        arr_mate.sort(function (a, b) {
            return (a.porcen_alum_respok - b.porcen_alum_respok)
        });
          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                    width: ($(document).width()/10)*6,
                    height: ($(document).width()/10)*12
                },
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    }
                },
                subtitle: {
                    style: {
                        color: 'blue',
                        font: 'bold 20px'
                    }
                },
                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    }
                }
          };
          var arr_mate_aux = new Array();;
          for (var i = 0; i < arr_mate.length; i++){
             arr_mate_aux.push({'id_cont': arr_mate[i]['id_contenido'],'name': arr_mate[i]['contenidos'],'y': parseFloat(arr_mate[i]['porcen_alum_respok']),'drilldown': arr_mate[i]['total_reac_xua']});
          }
          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);
          // Codigo para graficar la seccion estadistica de la escuela
          // Create the chart
          var defaultSubtitle = "Total de alumnos evaluados: "+parseFloat(arr_mate[0]['alumnos_evaluados'])
          var estadPreescolar = new Highcharts.chart('dv_info_graf_contmat', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'bar'
                  // width: 1000
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2016</b>'
              },
              subtitle: {
                  text:  '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+arr_mate[0]['alumnos_evaluados']+'</b>'
              },
              xAxis: {
                  type: 'category'
              },
              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                  }
              },
              legend: {
                  enabled: false
              },
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
              },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },
                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                 //console.info(this);
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,1,1);
                               }
                           }
                       }
                   }
              },
              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'

              },
              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_mate_aux
              }],
          });

          $(".highcharts-background").css("fill","#FFF");
          // $("#container_chartFreqAtaTailNum").highcharts().setSize(200, 200, false);
          // if (screen.width<600){
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*5,
          //       500,
          //      false
          //   );
          // }
          // else {
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*7,
          //       1000,
          //      false
          //   );
          // }

      }// graficoplanea_ud_secu_mate()

      this.graficoplanea_ud_ms_lyc = function(arr_lyc){
        // console.info(arr_lyc);


          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                    width: ($(document).width()/10)*6,
                    height: ($(document).width()/10)*12
                },
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    }
                },
                subtitle: {
                    style: {
                        color: 'blue',
                        font: 'bold 20px'
                    }
                },

                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    }
                }
          };
          var arr_lyc_aux = new Array();;
          for (var i = 0; i < arr_lyc.length; i++){
             arr_lyc_aux.push({'name': arr_lyc[i]['contenidos'],'y': arr_lyc[i]['porcen_alum_respok'],'drilldown': arr_lyc[i]['total_rea_xua']});
          }
          //console.log( arr_lyc );

          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);
          // Codigo para graficar la seccion estadistica de la escuela
          var estadPreescolar = new Highcharts.chart('containerbar_unidad_analisis_lyc', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'bar'
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2017</b>'
              },
              subtitle: {
                  text: '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+arr_lyc[0]['alumnos_evaluados']+'</b>'
              },
              xAxis: {
                  type: 'category'
              },
              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                  }
              },
              legend: {
                  enabled: false
              },
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
              },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },

                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,"lyc", "ms");
                               }
                           }
                       }
                   }
                  //
              },

              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'
              },


              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_lyc_aux
              }],

          });

          $(".highcharts-background").css("fill","#FFF");
          // if (screen.width<600){
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*5,
          //       500,
          //      false
          //   );
          // }
          // else {
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*7,
          //       1400,
          //      false
          //   );
          // }
      }// graficoplanea_ud_ms_lyc()



      this.graficoplanea_ud_ms_mate = function(arr_mate){
        // console.info(arr_mate);
          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',

                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                    width: ($(document).width()/10)*6,
                    height: ($(document).width()/10)*10
                },
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    }
                },
                subtitle: {
                    style: {
                        color: 'blue',
                        font: 'bold 20px'
                    }
                },
                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    }
                }
          };

          var arr_mate_aux = new Array();;
          for (var i = 0; i < arr_mate.length; i++){
             arr_mate_aux.push({'name': arr_mate[i]['contenidos'],'y': arr_mate[i]['porcen_alum_respok'],'drilldown': arr_mate[i]['total_rea_xua']});
          }

          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);
          // Codigo para graficar la seccion estadistica de la escuela
          var estadPreescolar = new Highcharts.chart('containerbar_unidad_analisis_mate', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'bar'
                  // width: 1000
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2017</b>'
              },
              subtitle: {
                  text:  '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+arr_mate[0]['alumnos_evaluados']+'</b>'
              },
              xAxis: {
                  type: 'category'
              },
              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                  }
              },
              legend: {
                  enabled: false
              },
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
              },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },
                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                // console.info(this);
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,"mat","ms");
                               }
                           }
                       }
                   }
              },
              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'

              },
              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_mate_aux
              }],
          });

          $(".highcharts-background").css("fill","#FFF");
          // $("#container_chartFreqAtaTailNum").highcharts().setSize(200, 200, false);
          // if (screen.width<600){
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*5,
          //       600,
          //      false
          //   );
          // }
          // else {
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*7,
          //       1000,
          //      false
          //   );
          // }

      }// graficoplanea_ud_ms_mate()


      this.hace_graficas = function(arr_graficas, nivel_g, callback){
          var aux = 0;
          var graf = new HaceGraficas(arr_graficas,true);
          switch(nivel_g) {
              case "PREESCOLAR":
              break;
              case "PRIMARIA":
                  graf.TablaPieGraficaBarPrimaria();

              break;
              case "SECUNDARIA":
                  graf.TablaPieGraficaBarSecundaria();
              break;
              default:
              break;
          }
          graf.TablaPieGraficaPie();
          return callback(aux);
      }// hace_graficas()

      this.get_reactivos_xunidad_de_analisis = function(nombre,id_cont,id_cct,periodo,idcampodis){

          // alert(id_cont);
          var ruta = base_url+"info/info_xcont_xcct";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: { 'id_cont':id_cont,'id_cct':id_cct,'periodo':periodo,'idcampodis':idcampodis
                  },
            beforeSend: function( xhr ) {
              obj_loader.show();
            }
          })
          .done(function( data ) {
            obj_loader.hide();
              swal.close();
              var result = data.graph_cont_reactivos_xcctxcont;

              var html = "<div style='text-align:left !important;'><ul>";
              if (result.length==0) {
                html += "<p><li>En este contenido temático más del 50% los alumnos contestaron en forma correcta las preguntas.</li></p><br>";
              }
              else {
                html += "<p><label>Reactivos donde al menos el 50% de los alumnos de esta escuela no contestaron o lo hicieron en forma incorrecta.</label><br>";
                for (var i = 0; i < result.length; i++) {
                  html += "<p><li>"+result[i]['descripcion']+"</li></p>";
                }
              }


              html += "</ul></div>";

              $('#modal_visor_reactivos .modal-body #div_reactivos').empty();
              $('#modal_visor_reactivos .modal-body #div_reactivos').html(html);

              $("#modal_reactivos_title").empty();
              $("#modal_reactivos_title").html("Contenido temático: "+nombre);

              $("#modal_visor_reactivos").modal("show");

          })
          .fail(function(e) {
              console.error("Error in get_reactivos_xunidad_de_analisis()"); console.table(e);
          });
      }// get_reactivos_xunidad_de_analisis()





}// HaceGraficas()






function get_riesgo_abandono(){
    obj_graficas.get_riesgo_abandono();
}
