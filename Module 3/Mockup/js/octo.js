! function($) {
    $(document).ready(function() {

        //-- Sticky Header
        (function() {

            var mainnav = $('.header');

            if (mainnav.length) {
                var elmHeight = $('.header-top').outerHeight(true);
                $(window).scroll(function() {

                    var scrolltop = $(window).scrollTop();
                    if (scrolltop > elmHeight) {
                        if (!mainnav.hasClass('sticky')) {
                            mainnav.addClass('sticky');
                        }

                    } else {
                        mainnav.removeClass('sticky');
                    }
                })
            }
        })();

        //-- Search icon
        (function() {

            $(".open-form").click(function(){
                $(".open-form").hide();
                $(".close-form").css("display","block");
                $(".search-block-form").show();
                $(".search-block-form input").focus();
                return false;
            });
            $(".close-form").click(function(){
                $(".close-form").hide();
                $(".open-form").css("display","block");
                $(".search-block-form").hide();
                return false;
            });

        })();

        //-- Flexslider
        (function() {
            $('.flexslider').flexslider({
                direction: "vertical",
                controlNav: false,
                directionNav: false
            });
        })();

        //-- Parallax
        (function() {
            $(window).scroll(function(e){
                var bg = $('.intro');
                var yPos = -($(window).scrollTop() / bg.data('speed'));
                var coords = '50% '+ yPos + 'px';
                bg.css({ backgroundPosition: coords});
            })
        })();

        //-- Owl Carousel
        (function() {
            $('.owl-carousel').owlCarousel({
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem:true
            });
        })();

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

        //-- Scroll to
        (function() {
            $('#goto-section2').on('click', function(e){
                e.preventDefault()
                $.scrollTo('#section2', 800, { offset: -220 });
            });
        })();

    });
}(jQuery);