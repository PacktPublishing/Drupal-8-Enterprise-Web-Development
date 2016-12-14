! function($) {
    $(document).ready(function() {

        //-- Google Map
        (function() {

            function initialize_gmap($element) {
                var myLatlng = new google.maps.LatLng($element.data('lat'),$element.data('lng'));
                var markerLatlng = new google.maps.LatLng($element.data('markerlat'),$element.data('markerlng'));
                var mapOptions = {
                    zoom: 15,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles: "",
                    scrollwheel: false,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                        position: google.maps.ControlPosition.BOTTOM_CENTER
                    },
                    panControl: true,
                    panControlOptions: {
                        position: google.maps.ControlPosition.RIGHT_CENTER
                    },
                    zoomControl: true,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.LARGE,
                        position: google.maps.ControlPosition.RIGHT_CENTER
                    },
                    scaleControl: true,
                    scaleControlOptions: {
                        position: google.maps.ControlPosition.BOTTOM_LEFT
                    },
                    streetViewControl: false,
                    streetViewControlOptions: {
                        position: google.maps.ControlPosition.RIGHT_CENTER
                    }
                };
                var elemnt_id = $element.attr('id');
                var map = new google.maps.Map(document.getElementById(elemnt_id), mapOptions);
                var infowindow = new google.maps.InfoWindow({
                    content: $element.data('markercontent')
                });
                var marker = new google.maps.Marker({
                    position: markerLatlng,
                    map: map,
                    title: $element.data('markertitle')
                });
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                });
            }

            $('#map').each(function(){
                google.maps.event.addDomListener(window, 'load', initialize_gmap($(this)));
            });

        })();

    });
}(jQuery);