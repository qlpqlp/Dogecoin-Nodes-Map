  <script type="text/javascript">
    var LeafIcon = L.Icon.extend({
        options: {
           iconSize:     [38, 38]
        }
    });
    var dogeIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/yhellowDogeMiner.gif'
    });

    var dogeredIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/redDogeMiner.gif'
    });
    var dogeFoundationIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/foundation.gif'
    });

    var teslanIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/tesla.gif'
    });
    var spacexIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/spacex.gif',
        iconSize:     [58, 38]
    });

    var reddogeIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/redDogeMiner.gif',
        iconSize:     [68, 48]
    });
    var starlinkdogeIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/starlinkDogeMiner.gif',
        iconSize:     [48, 70]
    });

    var starshipIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/starship.png',
        iconSize:     [10, 58]
    });
    var superHeavyIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/super-heavy.png',
        iconSize:     [10, 58]
    });
    var starlinkIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/starlink.gif',
        iconSize:     [58, 50]
    });

    var dogeclarenIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/dogeclaren.gif',
        iconSize:     [68, 58]
    });

    var dogeDDPIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/ddp.gif',
        iconSize:     [60, 98]
    });

    var burnmanIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/burnman.gif',
        iconSize:     [30, 50]
    });

    var radiodogeIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/radiodoge.gif',
        iconSize:     [90, 90],
        className: 'radiodoge',
    });

    var radiodogeStationIcon = new LeafIcon({
        iconUrl: 'https://<?php echo $_SERVER['SERVER_NAME'].'/'.trim(dirname($_SERVER["PHP_SELF"]),'/'); ?>/inc/markers/img/radiodogeStation.gif',
        iconSize:     [60, 78]
    });

    var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'For all <a href="https://dogecoin.com">Dogecoin</a> comunity!'
      }),

            latlng = L.latLng(0, 0);

        var map = L.map('map', {center: latlng, zoom: 2.5, minZoom: 0, layers: [tiles]});

        var markers = L.markerClusterGroup();

        for (var i = 0; i < addressPoints.length; i++) {
            var a = addressPoints[i];
            var title = a[2];
            if (a[3] == "dogeIcon"){
                var marker = L.marker(new L.LatLng(a[0], a[1]), { title: title,icon: dogeIcon });
            }else{
                var marker = L.marker(new L.LatLng(a[0], a[1]), { title: title,icon: starlinkdogeIcon });
            }

            marker.bindPopup(title);
            markers.addLayer(marker);
        }
     map.addLayer(markers);

     var theMarker = {};

     // we add aditional markes to the map
     var title = "Dogecoin Foundation"; theMarker = L.marker([51.5122267680323,-0.08994483058905306], { title: title,icon: dogeFoundationIcon }).addTo(map).bindPopup(title);
     var title = '<iframe width="100%" style="min-width:300px" height="315" src="https://www.youtube.com/embed/p4OixRuu2yA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br><br>Black Rock City<br><br> <a href="https://burningman.org/" target="_blank">burningman.org</a>'; theMarker = L.marker([40.787231388742995, -119.20645088497601], { title: title,icon: burnmanIcon }).addTo(map).bindPopup(title);

     var title = "Tesla Fremont Factory"; theMarker = L.marker([37.49355,-121.94361], { title: title,icon: teslanIcon }).addTo(map).bindPopup(title);
     var title = "Tesla Giga Shanghai"; theMarker = L.marker([30.87594255400217,121.77175311534269], { title: title,icon: teslanIcon }).addTo(map).bindPopup(title);
     var title = "Tesla Giga Texas"; theMarker = L.marker([30.221220412543023,-97.61874451732774], { title: title,icon: teslanIcon }).addTo(map).bindPopup(title);
     var title = "Tesla Giga Berlin"; theMarker = L.marker([52.400111264157715,13.800010727321547], { title: title,icon: teslanIcon }).addTo(map).bindPopup(title);

     var title = "Starbase - Cape Canaveral (Launch and Landing Control Center)"; theMarker = L.marker([28.48607108319623, -80.54294371048275], { title: title,icon: spacexIcon }).addTo(map).bindPopup(title);
     var title = "Starbase - Boca Chica (Launch Facility)"; theMarker = L.marker([25.99743317898298, -97.15730224801176], { title: title,icon: spacexIcon }).addTo(map).bindPopup(title);
     var title = "Starbase - California (Landing Zone 4)"; theMarker = L.marker([34.57660052071225, -120.63201179732054], { title: title,icon: spacexIcon }).addTo(map).bindPopup(title);

     var title = "SpaceX - Starship"; theMarker = L.marker([29.997949801894695,-97.15717601361384], { title: title,icon: starshipIcon, class: "leaflet-marker-icon leaflet-zoom-animated leaflet-interactive xx" }).addTo(map).bindPopup(title);
     var title = "SpaceX - Super Heavy"; theMarker = L.marker([25.997949801894695,-97.15717601361384], { title: title,icon: superHeavyIcon }).addTo(map).bindPopup(title);
<?php
    // we now get all Starlink Satelits and only show a few on the map
    /**
    *   File: SpaceX API
    *   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
    *   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
    *   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
    */

    // Here we get all SpaceX Realtime Starlink Satellites Coordinates
    $starlink = file_get_contents("https://api.spacexdata.com/v4/starlink");

    // To easy access data we decode the JSON output
    $starlink = json_decode($starlink);

    // Because there are so many satellites we try to randomly show only a few
    $show = rand(1,count($starlink));
    //$show = 5000;

    // initiate the count
    $is = 0;

    // Go tru all Satellites data
    foreach ($starlink as $value) {
    // There are some Satellites without coordinates, so we exclude that ones
        if ($value->latitude != ""){
            // We chek if the Random Satellite is the one to show
            if ($is == $show){
              // Now that we have cheked the Random Satellite, we generate anouther random because there are so many satellites we try to randomly show only a few
              $show = rand($is,count($starlink));
    // Now we add the Marker to the Doge Nodes Map
    ?>
     var title = "<?php echo $value->spaceTrack->OBJECT_NAME; ?>"; theMarker = L.marker([<?php echo $value->latitude; ?>,<?php echo $value->longitude; ?>], { title: title,icon: starlinkIcon }).addTo(map).bindPopup(title);
    <?php
    };
            };
    $is++;
    };
?>
    </script>