
function Graficasm(){
    obj_graficas = this;
  }



 Graficasm.prototype.GraficoEstadisticaPrimaria_alumn = function(a_g1,a_g2,a_g3,a_g4,a_g5,a_g6,t_alumnos){
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

  Graficasm.prototype.GraficoEstadisticaPrimaria_grupos = function(g_g1,g_g2,g_g3,g_g4,g_g5,g_g6,t_grupos){
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

       Graficasm.prototype.GraficoEstadisticaPrimaria_docentes = function(d_g1,d_g2,d_g3,d_g4,d_g5,d_g6,t_docentes){
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
            var defaultSubtitle = "Total de docentes: "+t_docentes
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



          Graficasm.prototype.GraficoEstadisticaSecundaria_alumn = function(a_g1,a_g2,a_g3,t_alumnos){
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

           Graficasm.prototype.GraficoEstadisticaSecundaria_grupos = function(g_g1,g_g2,g_g3,t_grupos){
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

                Graficasm.prototype.GraficoEstadisticaSecundaria_docentes = function(d_g1,d_g2,d_g3,t_docentes){
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
                     var defaultSubtitle = "Total de docentes: "+t_docentes
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






Graficasm.prototype.GraficoEstadisticaOtros = function(t_alumnos,t_grupos,t_docentes){
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
                    font: 'bold 16px'
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
              text: '',
              font: 'bold 16px'
          },
          subtitle: {
              text: '',
              font: 'bold 16px'
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

      $(".highcharts-background").css("fill","none");
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



Graficasm.prototype.PieDrilldownPlanea05y06 = function(lyc1_15,lyc2_15,lyc3_15,lyc4_15,mat1_15,mat2_15,mat3_15,mat4_15,lyc1_16,lyc2_16,lyc3_16,lyc4_16,mat1_16,mat2_16,mat3_16,mat4_16){

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

  Graficasm.prototype.TablaPieGraficaPie = function(q1,q2,q3,q4){

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
          estadPrimaria= new Highcharts.chart('dv_riesgo_esc_pie', {
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




Graficasm.prototype.TablaPieGraficaBarPrimaria= function(t1,t2,t3,t4,t5,t6){

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
        estadPrimaria = new Highcharts.chart('dv_riesgo_esc_bar', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: '<b style="font-size: 2.1vw;"><br>Distribución por grado de alumnos con muy alto riesgo de abandono escolar</b>'
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



Graficasm.prototype.TablaPieGraficaBarSecundaria= function(t1,t2,t3){

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
        estadPrimaria = new Highcharts.chart('dv_riesgo_esc_bar', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: '<b style="font-size: 2.1vw;">Distribución por grado de alumnos con muy alto riesgo de abandono escolar</b>'
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











      //////////////////////////////////////////////////////////// Por Unidades de Análisis
      //////////////////////////////////////////////////////////// Por Unidades de Análisis
      Graficasm.prototype.graficoplanea_ud_prim_lyc = function(arr_lyc,id_filtro, va_por){

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
          var estadPreescolar = new Highcharts.chart('div_graficas_masivo_lyc', {
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
                                  // alert("funciona");
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_filtro,1,2, va_por);
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

      Graficasm.prototype.graficoplanea_ud_prim_mate = function(arr_mate,id_filtro, va_por){
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
          var estadPreescolar = new Highcharts.chart('div_graficas_masivo_matematicas', {
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
                                // alert("mate");
                                 console.info(this);
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_filtro,1,1, va_por);
                                  // obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_filtro,1,2, va_por);
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

      Graficasm.prototype.graficoplanea_ud_secu_lyc = function(arr_lyc,id_cct){
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
                // title: {
                //     style: {
                //         color: '#000',
                //         font: 'bold 18px'
                //     },
                //     text: '<b style="font-size: 2.3vh;">PLANEA 2016</b>'
                // },
                // subtitle: {
                //     style: {
                //         color: 'blue',
                //         font: 'bold 20px'
                //     },
                //     text: '<b style="font-size: 1.5vh;"> Total de alumnos evaluadoos: '+parseInt(arr_lyc[0]['alumnos_evaluados'])+'</b>'
                // },
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
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2016</b>'
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

      Graficasm.prototype.graficoplanea_ud_secu_mate = function(arr_mate,id_cct){
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



      Graficasm.prototype.get_reactivos_xunidad_de_analisis = function(nombre,id_cont,id_filtro,periodo,idcampodis, tipo_filtro, va_por){

          // alert(id_cont);
          var ruta = base_url+"planea/planea_xcont_xmunicipio";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: { 'id_cont':id_cont,'id_xzona_o_municipio':id_filtro,'periodo':periodo,'idcampodis':idcampodis, 'tipo_filtro': tipo_filtro
                  },
            beforeSend: function( xhr ) {
              // obj_loader.show();
            }
          })
          .done(function( data ) {
            // obj_loader.hide();
              swal.close();
              var result = data.graph_cont_reactivos_xcctxcont;
              console.log(result[0]['mostrar']);

              var html = "<div style='text-align:left !important;'><ul>";
              if (result[0]['mostrar'] == 'no') {
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