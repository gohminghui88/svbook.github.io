jQuery(document).ready(function($) {
    "use strict";

    //Banner Slider
    if ($('#home-banner').length) {
        $('#home-banner').bxSlider({
            auto: true,
            speed: 1500,
			slideMargin: 20,
            infiniteLoop: true,
            hideControlOnEnd: true
        });
    }

    //Parallax Effect
    $(window).stellar();

    //Mobile Slider Section
    if ($('#mobile-slider').length) {
        $('#mobile-slider').bxSlider({
            infiniteLoop: true,
            hideControlOnEnd: true
        });
    }

    //Author Slider
    if ($('#author-slider').length) {
        $('#author-slider').bxSlider({
            infiniteLoop: true,
            hideControlOnEnd: true
        });
    }

    //Author Slider
    if ($('#blog-slider').length) {
        $('#blog-slider').bxSlider({
            infiniteLoop: true,
            hideControlOnEnd: true
        });
    }

    //Sidebar Tab
    $('#myTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    })

    //Testimonial Slider
    if ($('#testimonial-slider').length) {
        $('#testimonial-slider').bxSlider({
            mode: 'fade',
            captions: true,
            auto: true
        });
    }

    //Project Slider
    if ($('#project-slider').length) {
        $('#project-slider').bxSlider({
            infiniteLoop: true,
            hideControlOnEnd: true
        });
    }

    //Smooth Scroll
    if ($('div#makeMeScrollable').length) {
        $("div#makeMeScrollable").smoothDivScroll({
            autoScrollingMode: "onStart"
        });
    }

    //Flip Slider
    $(window).load(function() {

        if ($('.container-draggable').length) {
            var originX = $('.container-draggable').position().left;
        }

        $('.btn-drag-watch').mousedown(function(e) {
            var elt = $(this),
                topParent = elt.parents('.photo').position().top,
                leftParent = elt.parents('.photo').position().left,
                heightParent = elt.parents('.photo').height(),
                widthParent = elt.parents('.photo').width(),
                topContainer = elt.parents('.side').position().top + parseFloat(elt.parents('.side').css('padding-top'));

            e.preventDefault();
            elt.addClass('active');

            $(document).bind('mousemove', function(e) {
                var pageX = e.pageX - elt.parents('.photo').parent().offset().left,
                    pageY = e.pageY - topContainer;

                if (pageX > leftParent && pageX < leftParent + widthParent) {
                    $('.photo .face').css({
                        width: pageX - leftParent + 2
                    });
                    $('.photo .dos').css({
                        width: leftParent + widthParent - pageX + 2
                    });

                    elt.parent().css({
                        right: originX - pageX + elt.parent().width() / 2
                    });
                }

                if (pageY > topParent && pageY < topParent + heightParent) {
                    elt.css({
                        bottom: topParent + heightParent - pageY - elt.height()
                    })
                }

                $(this).mouseup(function() {
                    $(this).unbind('mousemove');

                    elt.removeClass('active').stop().animate({
                        bottom: 0
                    }, 600, 'easeInOutQuart');
                });

                e.preventDefault();
                return false;
            });
            return false;
        })

    });

    //Smoth for Nav	
    $(".home_nav a").click(function(event) {
        event.preventDefault();
        //calculate destination place
        var dest = 0;
        if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
            dest = $(document).height() - $(window).height() - 80;
        } else {
            dest = $(this.hash).offset().top - 80;
        }
        //go to destination
        $('html,body').animate({
            scrollTop: dest
        }, 1000, 'swing');
    });
	
	//Google Map Contact Page
    if ($('#map_contact_1').length) {
        var map;
        var myLatLng = new google.maps.LatLng(48.85661, 2.35222)
            //Initialize MAP
        var myOptions = {
            zoom: 11,
            center: myLatLng,
            disableDefaultUI: true,
            zoomControl: true,
            styles: [{
                stylers: [{
                    hue: '#333333'
                }, {
                    saturation: -10
                }, ]
            }],
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map_contact_1'), myOptions);
        //End Initialize MAP
        //Set Marker
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map
        });
        marker.getPosition();
        //End marker

        //Set info window
        var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '<p>Location Address</p>' +
            '</div>' +
            '<div id="bodyContent">' +
            '<p><i class="icon-map-marker"></i>Location Summary' +
            '</p>' +
            '</div>' +
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            //content: contentString,
            position: myLatLng,
            icon: 'images/map-icon-2.png'
        });
        var marker, i;
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.open(map);
            }
        })(marker, i));
    }

    //Function End
});