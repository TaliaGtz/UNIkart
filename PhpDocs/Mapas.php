<div id="mapa" class="mapa"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfqb11Rf16UahG0MijpidF4feGmVP7RLc"></script>
<script>
    google.maps.event.addDomListener(window, "load", function(){
        //Aquí ya tenemos lista la librería
        var mapElement = document.getElementById('mapa');
        var map = new google.maps.Map(mapElement,{
            center:{
                lat: 25.72568920332521, 
                lng: -100.31524864625413
            },
            zoom: 15
        });
    })
</script>
