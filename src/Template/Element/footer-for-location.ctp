<footer>
<div class="container py-5">
<div class="row">
<div class="col-md-4"><div class="ftr_common">
<figure><img src="<?=SITE_PATH?>images/logo.png" class="img-fluid" alt="Dynamic Name"></figure>
<div class="copyright">Copyright © 2018, All rights reserved</div>
<div class="ftr_heading">Common Links</div>
<ul>
<li><a href="<?=SITE_PATH?>">Home</a></li>
<li><a href="<?=SITE_PATH?>contact-us/">Contact Us</a></li>
<li><a href="<?=SITE_PATH?>post/">Blogs</a></li>
<li><a href="<?=SITE_PATH?>disclaimer/" rel="nofollow">Disclaimer</a></li>
</ul>
</div></div>
<div class="col-md-2"><div class="prj_link">
<div class="ftr_heading">Project Links</div>
<ul>
<?  
//print_r($query);

foreach($query as $project) { 
?>
<li><a href="<?=SITE_PATH?>project/<? echo $project['url']?>" target="_blank"><? echo $project['name'];?></a></li>
<? }  ?>
</ul>
</div></div>
<div class="col-md-3"><div class="prj_link">
<div class="ftr_heading">Blog Links</div>
<ul>
<?  
//print_r($query);

foreach($blog as $blog) { 
?>
<li><a href="<?=SITE_PATH?>post/<? echo $blog['url']?>"><? echo $blog['name'];?></a></li>
<? }  ?>
</ul>
</div></div>
<div class="col-md-3"><div class="follow_us">
<div class="ftr_heading">Follow With Us</div>
<ol>
<li><a href="https://www.facebook.com/yoonewprojects" class="fa-facebook" target="_blank">Facebook</a></li>
<li><a href="https://twitter.com/yoo_new" class="fa-twitter" target="_blank">Twitter</a></li>
<li><a href="https://plus.google.com/102377378040275674107" class="fa-google-plus" target="_blank">google +</a></li>
<li><a href="https://in.pinterest.com/yoonewprojects/" class="fa-pinterest-p" target="_blank">Pinterest</a></li>
<li><a href="https://www.youtube.com/channel/UC3cIDkw0nWSMi85FRMYYhsA" class="fa-youtube-play" target="_blank">Youtube</a></li>
<li><a href="#" class="fa-linkedin" target="_blank">LinkedIn</a></li>
</ol>
</div></div>
</div>
</div>
</footer>
<script src="<?=SITE_PATH?>js/jquery-1.10.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128355151-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-128355151-1');
</script>
<script type="text/javascript">
$(window).scroll(function() {  
var hmscroll = $(window).scrollTop();
if (hmscroll > 20) {
$(".bg-dark").addClass("theme_bg");
}
else {$(".bg-dark").removeClass("theme_bg");}
});

function myFunction(){
var dots = document.getElementById("dots");
var moreText = document.getElementById("des_more");
var btnText = document.getElementById("myBtn");

if (dots.style.display === "none") {
dots.style.display = "inline";
btnText.innerHTML = "Read More &darr;"; 
moreText.style.display = "none";
} else {
dots.style.display = "none";
btnText.innerHTML = "Less &uarr;"; 
moreText.style.display = "inline";
}
}

$(window).scroll(function() {
if ($(this).scrollTop() > 870) {
$('#gotoQ').fadeIn('fast');
} else {
$('#gotoQ').fadeOut('fast');
}});
$("#gotoQ").click(function (){ $("html, body").animate({scrollTop: 0},'slow');});
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTcm6kHY9C0PtQ5LYYmKSjKfpkicYJ6HM&libraries=places"></script>
<script type="text/javascript">
     $(window).load(function () {
    $('.chkbox').click(function () {
        $(':checkbox').prop('checked', false);
        $('#' + $(this).prop('id')).prop('checked', true);
        search_types(map.getCenter());
    });
  
    var markersArray = [];
    var marker;
    var geocoder = new google.maps.Geocoder();
    var pyrmont = new google.maps.LatLng(28.524616, 77.352898);
    var map;
    var infowindow;
    map_initialize(); // load map
    function map_initialize() {
        map = new google.maps.Map(document.getElementById("map"), {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: pyrmont,
            zoom: 13
        });

        infowindow = new google.maps.InfoWindow();
        //document.getElementById('directionsPanel').innerHTML='';
        search_types();
    }
    function createMarker(place, icon) {
        var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location,
            icon: icon,
            visible: true

        });

        markersArray.push(marker);
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent("<b>Name:</b>" + place.name + "<br><b>Address:</b>" + place.vicinity + "<br>");
            infowindow.open(map, this);
        });

    }
    var source = "";
    var dest = '';

    function search_types(latLng) {
        clearOverlays();

        if (!latLng) {
            var latLng = pyrmont;
        }
        var type = $('.chkbox:checked').val();
        var icon = "<?=CDN_PATH?>images/" + type + ".png";


        var request = {
            location: latLng,
            radius: 2000,
            types: [type] //e.g. school, restaurant,bank,bar,city_hall,gym,night_club,park,zoo
        };

        var service = new google.maps.places.PlacesService(map);
        service.search(request, function (results, status) {
            map.setZoom(13);
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    results[i].html_attributions = '';
                    createMarker(results[i], icon);
                }
            }
        });

    }


    // Deletes all markers in the array by removing references to them
    function clearOverlays() {
        if (markersArray) {
            for (i in markersArray) {
                markersArray[i].setVisible(false);

            }
            //markersArray.length = 0;
        }
    }

    function clearMarkers() {
        $('#show_btn').show();
        $('#hide_btn').hide();
        clearOverlays();
    }
    function showMarkers() {
        $('#show_btn').hide();
        $('#hide_btn').show();
        if (markersArray) {
            for (i in markersArray) {
                markersArray[i].setVisible(true);
            }

        }
    }

    //function showMap(){
    var imageUrl = 'https://chart.apis.google.com/chart?cht=mm&chs=24x32&chco=FFFFFF,&ext=.png';
    var markerImage = new google.maps.MarkerImage(imageUrl, new google.maps.Size(24, 32));
    var input_addr = $('#address').val();
    geocoder.geocode({address: input_addr}, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            var latitude = $('#lat').val();
            var longitude = $('#long').val();
            var latlng = new google.maps.LatLng(latitude, longitude);
            if (results[0]) {
                map.setZoom(13);
                map.setCenter(latlng);
                marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: markerImage,
                    draggable: true

                });
                //$('#btn').hide();
                //$('#latitude,#longitude').show();
				var add = $('#address').val();
                $('#address').val(results[0].formatted_address);
                $('#latitude').val(marker.getPosition().lat());
                $('#longitude').val(marker.getPosition().lng());
                infowindow = new google.maps.InfoWindow({
                content: ("<div style='background-color:#666; margin-bottom:10px; padding:10px;'><img src='<? echo SITE_PATH.'img/property/logo/'.$projects[0]['property_logo']; ?>'></div><div>"+ add + "</div>")
                });
                infowindow.open(map, marker);
                search_types(marker.getPosition());
                google.maps.event.addListener(marker, 'click', function () {
					infowindow = new google.maps.InfoWindow({
                content: ("<div style='background-color:#666; margin-bottom:10px;'><img src='<? echo SITE_PATH.'img/property/logo/'.$projects[0]['property_logo']; ?>'></div><div>"+ add + "</div>")
                });
                    infowindow.open(map, marker);

                });

                google.maps.event.addListener(marker, 'dragend', function () {
                    geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                //$('#btn').hide();
                                //$('#latitude,#longitude').show();
                                $('#address').val(results[0].formatted_address);
                                $('#latitude').val(marker.getPosition().lat());
                                $('#longitude').val(marker.getPosition().lng());
                            }
                            infowindow.setContent(results[0].formatted_address);
                            var centralLatLng = marker.getPosition();
                            search_types(centralLatLng);
                            infowindow.open(map, marker);
                        }
                    });
                });
            } else {
            }
        } else {
        }
    });
});

        </script>