function HaceGraficas(){
    obj_graficas = this;
  }



 HaceGraficas.prototype.GraficoEstadisticaPrimaria_alumn = function(a_g1,a_g2,a_g3,a_g4,a_g5,a_g6,t_alumnos){
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
            ($(document).width()/10)*5,
            400,
           false
        );
      }

    }//GraficoEstadisticaPrimaria_alumn

  HaceGraficas.prototype.GraficoEstadisticaPrimaria_grupos = function(g_g1,g_g2,g_g3,g_g4,g_g5,g_g6,t_grupos){
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
               ($(document).width()/10)*5,
               400,
              false
           );
         }
       }//GraficoEstadisticaPrimaria_grupos

       HaceGraficas.prototype.GraficoEstadisticaPrimaria_docentes = function(d_g1,d_g2,d_g3,d_g4,d_g5,d_g6,t_docentes){
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
                  ($(document).width()/10)*5,
                  400,
                 false
              );
            }
          }//GraficoEstadisticaPrimaria_docentes



          HaceGraficas.prototype.GraficoEstadisticaSecundaria_alumn = function(a_g1,a_g2,a_g3,t_alumnos){
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
                   }],
                   responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 600
                        },
                        chartOptions: {
                            chart: {
                                className: 'd-flex'
                            }
                        }
                    }]
                }

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
                     ($(document).width()/10)*5,
                     400,
                    false
                 );
               }
             }//GraficoEstadisticaSecundaria_alumn

           HaceGraficas.prototype.GraficoEstadisticaSecundaria_grupos = function(g_g1,g_g2,g_g3,t_grupos){
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
                        ($(document).width()/10)*5,
                        400,
                       false
                    );
                  }
                }//GraficoEstadisticaSecundaria_grupos

                HaceGraficas.prototype.GraficoEstadisticaSecundaria_docentes = function(d_g1,d_g2,d_g3,t_docentes){
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
                           ($(document).width()/10)*5,
                           400,
                          false
                       );
                     }
                   }//GraficoEstadisticaSecundaria_docentes






HaceGraficas.prototype.GraficoEstadisticaOtros = function(t_alumnos,t_grupos,t_docentes){
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
            ($(document).width()/10)*5,
            400,
           false
        );
      }
    }

    HaceGraficas.prototype.DibujarRadialProgressBarET = function(valor_et){
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

    HaceGraficas.prototype.DibujarRadialProgressBarcobertura = function(cobertura){
      // Dibujamos el radial progress bar para cobertura
      // var valor_et=80;
      var bar = new ProgressBar.Circle(dv_info_graf_Cobertura, {
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
              circle.setText(cobertura+'%');
            }
            else {
              circle.setText(value+'%');
            }
          }

        }
      });
      bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
      bar.text.style.fontSize = '2rem';

      bar.animate(Math.min(cobertura/100, 1));  // Number from 0.0 to 1.0
    }

    HaceGraficas.prototype.DibujarRadialProgressBarabsorcion = function(absorcion){
      // Dibujamos el radial progress bar para cobertura
      // var valor_et=80;
      var bar = new ProgressBar.Circle(dv_info_graf_Absorcion, {
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
              circle.setText(absorcion+'%');
            }
            else {
              circle.setText(value+'%');
            }
          }

        }
      });
      bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
      bar.text.style.fontSize = '2rem';

      bar.animate(Math.min(absorcion/100, 1));  // Number from 0.0 to 1.0
    }

    HaceGraficas.prototype.DibujarRadialProgressBarretencion = function(varix){
      // Dibujamos el radial progress bar para cobertura
      // var valor_et=80;
      var bar = new ProgressBar.Circle(dv_info_graf_Retencion, {
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
              circle.setText(varix+'%');
            }
            else {
              circle.setText(value+'%');
            }
          }

        }
      });
      bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
      bar.text.style.fontSize = '2rem';

      bar.animate(Math.min(varix/100, 1));  // Number from 0.0 to 1.0
    }

    HaceGraficas.prototype.DibujarRadialProgressBaraprobacion = function(varix){
      // Dibujamos el radial progress bar para cobertura
      // var valor_et=80;
      var bar = new ProgressBar.Circle(dv_info_graf_Aprobacion, {
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
              circle.setText(varix+'%');
            }
            else {
              circle.setText(value+'%');
            }
          }

        }
      });
      bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
      bar.text.style.fontSize = '2rem';

      bar.animate(Math.min(varix/100, 1));  // Number from 0.0 to 1.0
    }

    HaceGraficas.prototype.DibujarRadialProgressBaraefi = function(varix){
      // Dibujamos el radial progress bar para cobertura
      // var valor_et=80;
      var bar = new ProgressBar.Circle(dv_info_graf_Eficiencia_Terminal, {
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
              circle.setText(varix+'%');
            }
            else {
              circle.setText(value+'%');
            }
          }

        }
      });
      bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
      bar.text.style.fontSize = '2rem';

      bar.animate(Math.min(varix/100, 1));  // Number from 0.0 to 1.0
    }



HaceGraficas.prototype.PieDrilldownPlanea05y06 = function(lyc1_15,lyc2_15,lyc3_15,lyc4_15,mat1_15,mat2_15,mat3_15,mat4_15,lyc1_16,lyc2_16,lyc3_16,lyc4_16,mat1_16,mat2_16,mat3_16,mat4_16){

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
              ($(document).width()/10)*5,
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
              ($(document).width()/10)*5,
              400,
             false
          );
        }


    }

  HaceGraficas.prototype.TablaPieGraficaPie = function(q1,q2,q3,q4){

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
                ($(document).width()/10)*5,
                400,
               false
            );
          }

        }




HaceGraficas.prototype.TablaPieGraficaBarPrimaria= function(t1,t2,t3,t4,t5,t6){

        Highcharts.theme = {
            colors: ['#FF0000','#228B22','#696969','#8B008B','#228B22','#DAA520',
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
              ($(document).width()/10)*5,
              400,
             false
          );
        }

      }



HaceGraficas.prototype.TablaPieGraficaBarSecundaria= function(t1,t2,t3){

        Highcharts.theme = {
            colors: ['#FF0000','#228B22','#696969','#8B008B','#228B22','#DAA520',
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
              ($(document).width()/10)*5,
              400,
             false
          );
        }

      }











      //////////////////////////////////////////////////////////// Por Unidades de Análisis
      //////////////////////////////////////////////////////////// Por Unidades de Análisis
      HaceGraficas.prototype.graficoplanea_ud_prim_lyc = function(arr_lyc,id_cct){

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
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos que contestó correctamente </div>'
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
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,1,1);
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
                  name: 'Porcentaje de alumnos que contestó correctamente: ',
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
          //       ($(document).width()/10)*5,
          //       1000,
          //      false
          //   );
          // }
      }// graficoplanea_ud_prim_lyc()

      HaceGraficas.prototype.graficoplanea_ud_prim_mate = function(arr_mate,id_cct){
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
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos que contestó correctamente</div>'
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
              },
              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'

              },
              series: [{
                  name: 'Porcentaje de alumnos que contestó correctamente: ',
                  colorByPoint: true,
                  data: arr_mate_aux
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
          //       ($(document).width()/10)*5,
          //       1000,
          //      false
          //   );
          // }

      }// graficoplanea_ud_prim_mate()

      HaceGraficas.prototype.graficoplanea_ud_secu_lyc = function(arr_lyc,id_cct){
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
                 '#FF9900','#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],

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
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos que contestó correctamente</div>'
                      // text: '<div>Porcentaje de alumnos con respuestas correctas</div>'
                  },
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
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,2,1);
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
                  name: 'Porcentaje de alumnos que contestó correctamente: ',
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
          //       ($(document).width()/10)*5,
          //       900,
          //      false
          //   );
          // }
      }// graficoplanea_ud_secu_lyc()

      HaceGraficas.prototype.graficoplanea_ud_secu_mate = function(arr_mate,id_cct){
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
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos que contestó correctamente</div>'
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
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,2,2);
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
                  name: 'Porcentaje de alumnos que contestó correctamente: ',
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
          //       ($(document).width()/10)*5,
          //       1000,
          //      false
          //   );
          // }

      }// graficoplanea_ud_secu_mate()

      HaceGraficas.prototype.graficoplanea_ud_ms_lyc = function(arr_lyc,id_cct){
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
                 '#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],

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
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos que contestó correctamente</div>'
                      // text: '<div>Porcentaje de alumnos con respuestas correctas</div>'
                  },
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
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,2,1);
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
                  name: 'Porcentaje de alumnos que contestó correctamente: ',
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
          //       ($(document).width()/10)*5,
          //       900,
          //      false
          //   );
          // }
      }// graficoplanea_ud_ms_lyc()

      HaceGraficas.prototype.graficoplanea_ud_ms_mate = function(arr_mate,id_cct){
        arr_mate.sort(function (a, b) {
            return (a.porcen_alum_respok - b.porcen_alum_respok)
        });
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
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos que contestó correctamente</div>'
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
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,2,2);
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
                  name: 'Porcentaje de alumnos que contestó correctamente: ',
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
          //       ($(document).width()/10)*5,
          //       1000,
          //      false
          //   );
          // }

      }// graficoplanea_ud_ms_mate()



      HaceGraficas.prototype.get_reactivos_xunidad_de_analisis = function(nombre,id_cont,id_cct,periodo,idcampodis){

          // alert(id_cont);
          var ruta = base_url+"info/info_xcont_xcct";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: { 'id_cont':id_cont,'id_cct':id_cct,'periodo':periodo,'idcampodis':idcampodis
                  },
            beforeSend: function( xhr ) {
              // obj_loader.show();
            }
          })
          .done(function( data ) {
            // obj_loader.hide();
              swal.close();
              var result = data.graph_cont_reactivos_xcctxcont;
              // var result_apoyoxreact = data.graph_cont_reactivos_xcctxcont_apoyo;

              var html = "<div style='text-align:left !important;'>";
              if (result.length==0) {
                html += "<div class='alert alert-success' role='alert'>En este contenido temático más del 50% los alumnos contestaron en forma correcta las preguntas.</div>";
              }
              else {
                html += "<div class='alert alert-warning' role='alert'>Reactivo donde al menos el 50% de los alumnos de esta escuela no contestó o contestó incorrectamente.</div>";
                html += "<table class='table table-condensed'>";
                html += "<tbody>";
                for (var i = 0; i < result.length; i++) {
                  html += "    <tr>";
                  html += "      <td class='text-center'><h5><span class='h3 badge badge-secondary text-white'>"+result[i]['n_reactivo']+"</span></h5></td>";
                  html += "      <td>";
                  if (result[i]['path_apoyo']!=null) {
                    html += "      <center><a style='color:blue;' href='#' onclick=obj_graficas.apoyo_reactivo('"+result[i]['path_apoyo']+"')>Texto/imagen (apoyo)</a></center>";
                  }
                  html += "<img src='http://proyectoeducativo.org/sarape/assets/docs/planea_reactivos/"+result[i]['path_react']+"' class='img-responsive center-block' />";
                  html += "     </td>";
                  html += "    </tr>";
                  html += "    <tr class='bgcolor-6'>";
                  html += "      <td></td>";
                  html += "      <td><button type='button' class='btn btn-style-1 color-6 bgcolor-2' onclick=obj_graficas.argumento_reactivo('"+result[i]['url_argumento']+"')>Argumento</button>";
                  html += "      <button type='button' class='btn btn-style-1 color-6 bgcolor-3' onclick='obj_graficas.especificacion_reactivo()'>Especificación</button>";
                  html += "      <button type='button' class='btn btn-style-1 color-6 bgcolor-4' onclick=obj_graficas.apoyosacadem('"+result[i]['id_reactivo']+"')>Apoyos académicos</button>";
                  html += "      </td>";
                  html += "    </tr>";
                }
                html += "</tbody>";
                html += "</table>";
              }
              html += "</div>";

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

      HaceGraficas.prototype.argumento_reactivo = function(url_argumento){
        // alert("entro");
        var html = "<div style='text-align:left !important;'><ul>";
          html += "<table class='table table-condensed'>";
          html += "<tbody> <center>";


          html += "</center></tbody>";
          html += "</table>";

          html += "</div>";

          $('#modal_visor_pdfc2 .modal-header #exampleModalLabel').empty();
          $('#modal_visor_pdfc2 .modal-header #exampleModalLabel').html("");

        $('#modal_visor_pdfc2 .modal-body #div_listalinks').empty();
        $('#modal_visor_pdfc2 .modal-body #div_listalinks').html(html);

        Utiles.showPDF("modal_visor_pdfc2", url_argumento);
        $("#modal_visor_pdfc2").modal("show");

         // window.open("http://proyectoeducativo.org/sarape/assets/docs/info/arg_r1_lyc_17_sec.pdf", "_blank");

      }
      HaceGraficas.prototype.especificacion_reactivo = function(){
          // alert("entro1");
          var html = "<div style='text-align:left !important;'><ul>";
            html += "<table class='table table-condensed'>";
            html += "<tbody> <center>";


            html += "</center></tbody>";
            html += "</table>";

            html += "</div>";

            $('#modal_visor_pdfc3 .modal-header #exampleModalLabel').empty();
            $('#modal_visor_pdfc3 .modal-header #exampleModalLabel').html("");

          $('#modal_visor_pdfc3 .modal-body #div_listalinks').empty();
          $('#modal_visor_pdfc3 .modal-body #div_listalinks').html(html);

          Utiles.showPDF("modal_visor_pdfc3", "info/esp_r1_lyc_17_sec.pdf");
          $("#modal_visor_pdfc3").modal("show");
          // window.open("http://proyectoeducativo.org/sarape/assets/docs/info/esp_r1_lyc_17_sec.pdf", "_blank");
      }

      HaceGraficas.prototype.apoyosacadem = function(id_reactivo){
          swal.close();
          var ruta = base_url+"info/apoyos_academxid_reac";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: { 'id_reactivo':id_reactivo
                  },
            beforeSend: function( xhr ) {
              // obj_loader.show();
            }
          })
          .done(function( data ) {
            // obj_loader.hide();
              swal.close();
              var result = data.arr_apoyosacade_xidreact;
              // console.table(result);
              var html = "<div style='text-align:left !important;'><ul>";
                html += "<table class='table table-condensed'>";
                html += "<tbody>";

              result.forEach(function(result, index) {
                html += "    <tr>";
                html += "      <td class='text-center'><h5><span class='h3 badge badge-secondary text-white'>"+(1+index)+"</span></h5></td>";
                switch (result.idtipo) {
                  case '1':
                      html += "      <td><a class='btn btn-style-1 color-6 bgcolor-4' href='#'  onclick=obj_graficas.material_reactivo('"+result.ruta+"')>"+result.titulo+"</a><li>Fuente: "+result.fuente+"</li></td>";
                    break;
                  case '2':
                      html += "      <td><a class='btn btn-style-1 color-6 bgcolor-4' href='#'  onclick=obj_graficas.material_reactivo('"+result.ruta+"')>"+result.titulo+"</a><li>Fuente: "+result.fuente+"</li></td>";
                    break;
                  case '3':
                      html += "      <td><a class='btn btn-style-1 color-6 bgcolor-4' href='"+result.ruta+"' target='_blank'>"+result.titulo+"</a><li>Fuente: "+result.fuente+"</li></td>";
                    break;
                  case '4':
                      html += "      <td><a class='btn btn-style-1 color-6 bgcolor-4' href='"+result.ruta+"' target='_blank'>"+result.titulo+"</a><li>Fuente: "+result.fuente+"</li></td>";
                    break;
                  default:
                    break;
                }
                html += "    </tr>";

              console.log("Persona " + index + " | tipo: " + result.idtipo + " ruta: " + result.ruta)
              });


                html += "</tbody>";
                html += "</table>";

              html += "</div>";

              $('#modal_visor_apoyos_academ .modal-body #div_listalinks').empty();
              $('#modal_visor_apoyos_academ .modal-body #div_listalinks').html(html);

              $("#modal_apoyos_academ_title").empty();
              $("#modal_apoyos_academ_title").html("Pregunta: 1, campo disciplinario: lenguaje y comunicación, periodo: 2016.");

              $("#modal_visor_apoyos_academ").modal("show");


          })
          .fail(function(e) {
              console.error("Error in get_reactivos_xunidad_de_analisis()"); console.table(e);
          });
      }

      HaceGraficas.prototype.apoyo_reactivo = function(path_apoyo){
          swal.close();


          var html = "<div style='text-align:left !important;'>";
            html += "<table class='table table-condensed'>";
            html += "<tbody> ";
            html += "    <tr>";
            html += "      <td><center>";
              html += "<img style='width: 100%;' src='http://proyectoeducativo.org/sarape/assets/docs/planea_reactivos/"+path_apoyo+"' class='img-responsive center-block' />";
              html += "      </center></td>";
              html += "    </tr>";
          html += "</tbody>";
            html += "</table>";

            html += "</div>";

          $('#modal_visor_apoyos_reactivos .modal-body #div_listalinks').empty();
          $('#modal_visor_apoyos_reactivos .modal-body #div_listalinks').html(html);


          $("#modal_visor_apoyos_reactivos").modal("show");
      }

      HaceGraficas.prototype.material_reactivo = function(url){
          swal.close();

          var html = "<div class='embed-responsive embed-responsive-16by9'>";
          html += "  <iframe class='embed-responsive-item' src='"+"http://proyectoeducativo.org/sarape/"+url+"' allowfullscreen></iframe>";
          html += "</div>";



          $('#modal_visor_material_reactivos .modal-body #div_listalinks').empty();
          $('#modal_visor_material_reactivos .modal-body #div_listalinks').html(html);


          $("#modal_visor_material_reactivos").modal("show");
      }
$("#md_close_iframe").click(function(){
  $('#modal_visor_material_reactivos .modal-body #div_listalinks').empty();
  $("#modal_visor_material_reactivos").modal("hide");
});
