$("#slc_xest_muni_estmunicipio").change(function(){
  var id_municipio = $( "#slc_xest_muni_estmunicipio" ).val();
  $.ajax({
    url:base_url+"Estadistica/estad_indi_generales_getnivel",
    method:"POST",
    data:{"id_municipio":id_municipio},
    beforeSend: function(xhr) {
      // $("#wait").modal("show");
    },
    success:function(data){
      // $("#wait").modal("hide");
      $("#slc_xest_muni_nivel").empty();
      $.each(data, function (index, item) {
          $("#slc_xest_muni_nivel").append('<option value="'+index+'">'+item+'</option>');
        });
      // console.log(data);
    },
    error: function(error){
      console.log(error);
    }
  });

});

$("#slc_xest_muni_nivel").change(function(){
  var id_municipio = $( "#slc_xest_muni_estmunicipio" ).val();
  var id_nivel = $( "#slc_xest_muni_nivel" ).val();
  $.ajax({
    url:base_url+"Estadistica/estad_indi_generales_getsost",
    method:"POST",
    data:{"id_municipio":id_municipio,"id_nivel":id_nivel},
    beforeSend: function(xhr) {
      // $("#wait").modal("show");
    },
    success:function(data){
      // $("#wait").modal("hide");
      $("#slc_xest_muni_sostenimiento").empty();
      $.each(data, function (index, item) {
          $("#slc_xest_muni_sostenimiento").append('<option value="'+index+'">'+item+'</option>');
        });
      // console.log(data);
    },
    error: function(error){
      console.log(error);
    }
  });

});

$("#slc_xest_muni_sostenimiento").change(function(){
  var id_municipio = $( "#slc_xest_muni_estmunicipio" ).val();
  var id_nivel = $( "#slc_xest_muni_nivel" ).val();
  var id_sostenimiento = $( "#slc_xest_muni_sostenimiento" ).val();
  $.ajax({
    url:base_url+"Estadistica/estad_indi_generales_getmodali",
    method:"POST",
    data:{"id_municipio":id_municipio,"id_nivel":id_nivel,"id_sostenimiento":id_sostenimiento},
    beforeSend: function(xhr) {
      // $("#wait").modal("show");
    },
    success:function(data){
      // $("#wait").modal("hide");
      $("#slc_xest_muni_modalidad").empty();
      $.each(data, function (index, item) {
          $("#slc_xest_muni_modalidad").append('<option value="'+index+'">'+item+'</option>');
        });
      // console.log(data);
    },
    error: function(error){
      console.log(error);
    }
  });

});

$("#slc_xest_muni_modalidad").change(function(){
  var id_municipio = $( "#slc_xest_muni_estmunicipio" ).val();
  var id_nivel = $( "#slc_xest_muni_nivel" ).val();
  var id_sostenimiento = $( "#slc_xest_muni_sostenimiento" ).val();
  var id_modalidad = $( "#slc_xest_muni_modalidad" ).val();
  $.ajax({
    url:base_url+"Estadistica/estad_indi_generales_getciclo",
    method:"POST",
    data:{"id_municipio":id_municipio,"id_nivel":id_nivel,"id_sostenimiento":id_sostenimiento,"id_modalidad":id_modalidad},
    beforeSend: function(xhr) {
      // $("#wait").modal("show");
    },
    success:function(data){
      // $("#wait").modal("hide");
      $("#slc_xest_muni_cicloe").empty();
      $.each(data, function (index, item) {
          $("#slc_xest_muni_cicloe").append('<option value="'+index+'">'+item+'</option>');
        });
      // console.log(data);
    },
    error: function(error){
      console.log(error);
    }
  });

});

$("#slc_xest_nivel_zona").change(function(){
  var id_nivel = $( "#slc_xest_nivel_zona" ).val();
  $.ajax({
    url:base_url+"Estadistica/estad_indi_generales_getsubsost_zona",
    method:"POST",
    data:{"id_nivel":id_nivel},
    beforeSend: function(xhr) {
      // $("#wait").modal("show");
    },
    success:function(data){
      // $("#wait").modal("hide");
      $("#slc_xest_sostenimiento_zona").empty();
      $.each(data, function (index, item) {
          $("#slc_xest_sostenimiento_zona").append('<option value="'+index+'">'+item+'</option>');
        });
      // console.log(data);
    },
    error: function(error){
      console.log(error);
    }
  });

});

$("#slc_xest_sostenimiento_zona").change(function(){
  var id_nivel = $( "#slc_xest_nivel_zona" ).val();
  var id_subsost = $( "#slc_xest_sostenimiento_zona" ).val();
  $.ajax({
    url:base_url+"Estadistica/estad_indi_generales_getzonassubsost_zona",
    method:"POST",
    data:{"id_nivel":id_nivel,"id_subsost":id_subsost},
    beforeSend: function(xhr) {
      // $("#wait").modal("show");
    },
    success:function(data){
      // $("#wait").modal("hide");
      $("#slc_xest_zona").empty();
      $.each(data, function (index, item) {
          $("#slc_xest_zona").append('<option value="'+index+'">'+item+'</option>');
        });
      // console.log(data);
    },
    error: function(error){
      console.log(error);
    }
  });

});

$("#slc_xest_zona").change(function(){
  var id_nivel = $( "#slc_xest_nivel_zona" ).val();
  var id_subsost = $( "#slc_xest_sostenimiento_zona" ).val();
  var id_zona = $( "#slc_xest_zona" ).val();


  $.ajax({
    url:base_url+"Estadistica/estad_indi_generales_getcicloxnxsubxz_zona",
    method:"POST",
    data:{"id_nivel":id_nivel,"id_subsost":id_subsost,"id_zona":id_zona},
    beforeSend: function(xhr) {
      // $("#wait").modal("show");
    },
    success:function(data){
      // $("#wait").modal("hide");
      $("#slc_xest_cicloe_zona").empty();
      $.each(data, function (index, item) {
          $("#slc_xest_cicloe_zona").append('<option value="'+index+'">'+item+'</option>');
        });
      // console.log(data);
    },
    error: function(error){
      console.log(error);
    }
  });

});
