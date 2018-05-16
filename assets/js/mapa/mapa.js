var map;
      function initMap() {
        var base_url = "http://localhost/escuelacoahuilense/";
        $.ajax({
            url: 'http://localhost/escuelacoahuilense/index.php/Mapa/get_marcadores',
            type: 'POST',
            dataType: 'json',
            data: "",
        })
        .done(function(data) {
            console.log(data.response);
            var marcadores = data.response;
            var map = new google.maps.Map(document.getElementById('map'), {
               zoom: 8,
               center: new google.maps.LatLng(27.95805681558072,-101.85515216406247),
               mapTypeId: google.maps.MapTypeId.ROADMAP
           });
            var infowindow = new google.maps.InfoWindow({
                maxWidth: 330
            });
            var marker, i;
            var iconBase = base_url+'assets/img/';
            for (i = 0; i < marcadores.length; i++) {
        marker = new google.maps.Marker({
         position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
         map: map,
         // icon: iconBase + 'marker.png',
         // animation: google.maps.Animation.DROP
     });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
         return function() {
            var contentString = '<div id="content">'+
            '<form action="'+base_url+'propiedad/visor_propiedad/'+marcadores[i][0]+'" method="POST">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">'+marcadores[i][0]+'</h1>'+
            '<div id="bodyContent">'+
            '<p class="bodyText">'+marcadores[i][0]+'</p>'+
            '<div class="vermas">'+
            '<input type="hidden" name="id_propiedad" value="'+marcadores[i][0]+'">'+
            '<button type="submit" data-toggle="tooltip" title="" data-original-title="Ver mas">Ver mas</button>'+
            '</div>'+
            '</div>'+
            '</form>'+
            '</div>';
            infowindow.setContent(contentString);
            infowindow.open(map, marker);
        }
    })(marker, i));
    }
})
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
      }