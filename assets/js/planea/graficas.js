
function Graficasm(){
    obj_graficas = this;
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
                    width: ($(document).width()/10)*5,
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
          var estadPreescolar = new Highcharts.chart('div_graficas_masivo', {
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
                  text: '<b style="font-size: 2.3vh;">PLANEA 2016 Lenguaje y comunicación</b>'
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
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_filtro,1,1, va_por);
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
                    width: ($(document).width()/10)*5,
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
          var estadPreescolar = new Highcharts.chart('div_graficas_masivo', {
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
                  text: '<b style="font-size: 2.3vh;">PLANEA 2016 Matemáticas</b>'
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
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_filtro,1,2, va_por);
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

      }// graficoplanea_ud_prim_mate()

      Graficasm.prototype.graficoplanea_ud_secu_lyc = function(arr_lyc,id_cct, va_por){
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
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                  /*
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]graficoplanea_ud_prim_lyc
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
          var estadPreescolar = new Highcharts.chart('div_graficas_masivo', {
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
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,2,1, va_por);
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

      Graficasm.prototype.graficoplanea_ud_secu_mate = function(arr_mate,id_cct, va_por){
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
                 '#FF9900','#FF9900',
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
          var estadPreescolar = new Highcharts.chart('div_graficas_masivo', {
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
                                 //console.info(this);
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,2,2, va_por);
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

              var html = "<div style='text-align:left !important;'>";
              if (result[0]['mostrar'] == 'no') {
                html += "<div class='alert alert-success' role='alert'>En este contenido temático más del 50% los alumnos contestaron en forma correcta las preguntas.</div>";
              }
              else {
                html += "<div class='alert alert-warning' role='alert'>Reactivos donde al menos el 50% de los alumnos de esta escuela no contestaron o lo hicieron en forma incorrecta.</div>";
                html += "<table class='table table-condensed'>";
                html += "<tbody>";
                for (var i = 0; i < result.length; i++) {
                  html += "    <tr>";
                  html += "      <td class='text-center'><h5><span class='h3 badge badge-secondary text-white'>"+result[i]['n_reactivo']+"</span></h5></td>";
                  html += "      <td>";
                  if (result[i]['path_apoyo']!=null) {
                    html += "      <center><a style='color:blue;' href='#' onclick=obj_graficas.apoyo_reactivo('"+result[i]['path_apoyo']+"')>Texto/imagen (apoyo)</a></center>";
                  }
                  html += "<img src='http://proyectoeducativo.org/escuelacoahuilense/assets/docs/planea_reactivos/"+result[i]['path_react']+"' class='img-responsive center-block' />";
                  html += "     </td>";
                  html += "    </tr>";
                  html += "    <tr class='bgcolor-6'>";
                  html += "      <td></td>";
                  html += "      <td><button type='button' class='btn btn-style-1 color-6 bgcolor-2' onclick='obj_graficas.argumento_reactivo()'>Argumento</button>";
                  html += "      <button type='button' class='btn btn-style-1 color-6 bgcolor-3' onclick='obj_graficas.especificacion_reactivo()'>Especificación</button>";
                  html += "      <button type='button' class='btn btn-style-1 color-6 bgcolor-4' onclick='obj_graficas.apoyosacadem("+result[i]['n_reactivo']+")'>Apoyos académicos</button>";
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

              // swal.close();
              // var result = data.graph_cont_reactivos_xcctxcont;
              // console.log(result[0]['mostrar']);

              // var html = "<div style='text-align:left !important;'><ul>";
              // if (result[0]['mostrar'] == 'no') {
              //   html += "<p><li>En este contenido temático más del 50% los alumnos contestaron en forma correcta las preguntas.</li></p><br>";
              // }
              // else {
              //   html += "<p><label>Reactivos donde al menos el 50% de los alumnos de esta escuela no contestaron o lo hicieron en forma incorrecta.</label><br>";
              //   for (var i = 0; i < result.length; i++) {
              //     html += "<p><li>"+result[i]['descripcion']+"</li></p>";
              //   }
              // }


              // html += "</ul></div>";

              // $('#modal_visor_reactivos .modal-body #div_reactivos').empty();
              // $('#modal_visor_reactivos .modal-body #div_reactivos').html(html);

              // $("#modal_reactivos_title").empty();
              // $("#modal_reactivos_title").html("Contenido temático: "+nombre);

              // $("#modal_visor_reactivos").modal("show");

          })
          .fail(function(e) {
              console.error("Error in get_reactivos_xunidad_de_analisis()"); console.table(e);
          });
      }// get_reactivos_xunidad_de_analisis()


      Graficasm.prototype.graficoplanea_ud_ms_lyc = function(arr_lyc,id_cct, va_por){
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
                 '#FF9900','#FF9900','#FF9900','#FF9900',
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
          var estadPreescolar = new Highcharts.chart('div_graficas_masivo', {
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
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,2,1, va_por);
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


          // $(".highcharts-background").css("fill","#FFF");

          if (screen.width<600){
            estadPreescolar.setSize(
                ($(document).width()/10)*5,
                500,
               false
            );
          }
          else {
            estadPreescolar.setSize(
                ($(document).width()/10)*5,
                900,
               false
            );
          }
      }// graficoplanea_ud_ms_lyc()

      Graficasm.prototype.graficoplanea_ud_ms_mate = function(arr_mate,id_cct, va_por){
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
          var estadPreescolar = new Highcharts.chart('div_graficas_masivo', {
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
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,this.id_cont,id_cct,2,2, va_por);
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
          if (screen.width<600){
            estadPreescolar.setSize(
                ($(document).width()/10)*5,
                500,
               false
            );
          }
          else {
            estadPreescolar.setSize(
                ($(document).width()/10)*5,
                1000,
               false
            );
          }

      }// graficoplanea_ud_ms_mate()


         Graficasm.prototype.argumento_reactivo = function(){
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

           Utiles.showPDF("modal_visor_pdfc2", "info/arg_r1_lyc_17_sec.pdf");
           $("#modal_visor_pdfc2").modal("show");

            // window.open("http://proyectoeducativo.org/escuelacoahuilense/assets/docs/info/arg_r1_lyc_17_sec.pdf", "_blank");

         }
         Graficasm.prototype.especificacion_reactivo = function(){
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
             // window.open("http://proyectoeducativo.org/escuelacoahuilense/assets/docs/info/esp_r1_lyc_17_sec.pdf", "_blank");
         }

         Graficasm.prototype.apoyosacadem = function(n_react){
             swal.close();


             var html = "<div style='text-align:left !important;'><ul>";
               html += "<table class='table table-condensed'>";
               html += "<tbody>";
               if (n_react=='26') {
                 html += "    <tr>";
                 html += "      <td class='text-center'><h5><span class='h3 badge badge-secondary text-white'>1</span></h5></td>";
                 var srturl1='https://www.youtube.com/embed/Of2t3zcNtuM';
                 html += "      <td><a class='btn btn-style-1 color-6 bgcolor-4' href='#'  onclick=obj_graficas.material_reactivo('"+srturl1+"')>ÁREA DE UN TRAPECIO</a></td>";
                 html += "    </tr>";

                 html += "    <tr>";
                 html += "      <td class='text-center'><h5><span class='h3 badge badge-secondary text-white'>2</span></h5></td>";
                 var srturl2='https://upload.wikimedia.org/wikipedia/commons/b/bd/Trapecios_clasificaci%C3%B3n.png';
                 html += "      <td><a class='btn btn-style-1 color-6 bgcolor-3' href='#' onclick=obj_graficas.material_reactivo('"+srturl2+"')>TIPOS DE TRAPECIOS</a></td>";
                 html += "    </tr>";
               }
               else if (n_react=='4') {
                 html += "    <tr>";
                 html += "      <td class='text-center'><h5><span class='h3 badge badge-secondary text-white'>1</span></h5></td>";
                 var srturl1='https://www.youtube.com/embed/hbz9ZlnRBG4';
                 html += "      <td><a class='btn btn-style-1 color-6 bgcolor-4' href='#'  onclick=obj_graficas.material_reactivo('"+srturl1+"')>COCIENTE DE POTENCIAS CON LA MISA BASE</a></td>";
                 html += "    </tr>";
               }
               else {
                 html += "    <tr>";
                 html += "      <td class='text-center'><h5><span class='h3 badge badge-secondary text-white'>1</span></h5></td>";
                 var srturl1='https://www.youtube.com/embed/Of2t3zcNtuM';
                 html += "      <td><a class='btn btn-style-1 color-6 bgcolor-4' href='#'  onclick=obj_graficas.material_reactivo('"+srturl1+"')>EJEMPLO</a></td>";
                 html += "    </tr>";
                 html += "    <tr>";
                 html += "      <td class='text-center'><h5><span class='h3 badge badge-secondary text-white'>2</span></h5></td>";
                 var srturl1='https://www.youtube.com/embed/hbz9ZlnRBG4';
                 html += "      <td><a class='btn btn-style-1 color-6 bgcolor-4' href='#'  onclick=obj_graficas.material_reactivo('"+srturl1+"')>EJEMPLO</a></td>";
                 html += "    </tr>";

               }



               html += "</tbody>";
               html += "</table>";

             html += "</div>";

             $('#modal_visor_apoyos_academ .modal-body #div_listalinks').empty();
             $('#modal_visor_apoyos_academ .modal-body #div_listalinks').html(html);

             $("#modal_apoyos_academ_title").empty();
             $("#modal_apoyos_academ_title").html("Pregunta: 1, campo disciplinario: lenguaje y comunicación, periodo: 2016.");

             $("#modal_visor_apoyos_academ").modal("show");
         }

         Graficasm.prototype.apoyo_reactivo = function(path_apoyo){
             swal.close();


             var html = "<div style='text-align:left !important;'>";
               html += "<table class='table table-condensed'>";
               html += "<tbody> ";
               html += "    <tr>";
               html += "      <td><center>";
                 html += "<img style='width: 100%;' src='http://proyectoeducativo.org/escuelacoahuilense/assets/docs/planea_reactivos/"+path_apoyo+"' class='img-responsive center-block' />";
                 html += "      </center></td>";
                 html += "    </tr>";
             html += "</tbody>";
               html += "</table>";

               html += "</div>";

             $('#modal_visor_apoyos_reactivos .modal-body #div_listalinks').empty();
             $('#modal_visor_apoyos_reactivos .modal-body #div_listalinks').html(html);


             $("#modal_visor_apoyos_reactivos").modal("show");
         }

         Graficasm.prototype.material_reactivo = function(url){
             swal.close();

             var html = "<div class='embed-responsive embed-responsive-16by9'>";
             html += "  <iframe class='embed-responsive-item' src='"+url+"' allowfullscreen></iframe>";
             html += "</div>";



             $('#modal_visor_material_reactivos .modal-body #div_listalinks').empty();
             $('#modal_visor_material_reactivos .modal-body #div_listalinks').html(html);


             $("#modal_visor_material_reactivos").modal("show");
         }
         $("#md_close_iframe").click(function(){
         $('#modal_visor_material_reactivos .modal-body #div_listalinks').empty();
         $("#modal_visor_material_reactivos").modal("hide");
         });
