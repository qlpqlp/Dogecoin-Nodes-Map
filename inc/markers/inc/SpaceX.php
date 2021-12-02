<?php
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
<div id="starlink<?php echo $is;?>" class="starlink lazyload" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<?php echo $value->spaceTrack->OBJECT_NAME; ?>"></div><script type="text/javascript"> var posstarlink<?php echo $is;?> = ol.proj.fromLonLat([<?php echo $value->longitude; ?>,<?php echo $value->latitude; ?>]); var starlink<?php echo $is;?> = new ol.Overlay({ position: posstarlink<?php echo $is;?>, positioning: 'center-center', element: document.getElementById('starlink<?php echo $is;?>'), stopEvent: false }); map.addOverlay(starlink<?php echo $is;?>);</script>
<?php
        };
    };
$is++;
};
?>
<!-- Here we add the SpaceX Super Heavy Rocket to the map -->
<div id="superheavy" class="superheavy lazyload" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="Super Heavy"></div><script type="text/javascript"> var possuperheavy = ol.proj.fromLonLat([-97.15717601361384,25.997949801894695]); var superheavy = new ol.Overlay({ position: possuperheavy, positioning: 'center-center', element: document.getElementById('superheavy'), stopEvent: false }); map.addOverlay(superheavy);</script>
<!-- Here we add the SpaceX Space Ship Rocket to the map -->
<div id="starship" class="starship lazyload" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="Starship"></div><script type="text/javascript"> var posstarship = ol.proj.fromLonLat([-97.15717601361384,25.997949801894695]); var starship = new ol.Overlay({ position: posstarship, positioning: 'center-center', element: document.getElementById('starship'), stopEvent: false }); map.addOverlay(starship);</script>
<!-- Here we add the SpaceX Base to the map -->
<div id="spacex" class="spacex lazyload" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="Starbase"></div><script type="text/javascript"> var posspacex = ol.proj.fromLonLat([-97.18670176937486,25.988190496357824]); var spacex = new ol.Overlay({ position: posspacex, positioning: 'center-center', element: document.getElementById('spacex'), stopEvent: false }); map.addOverlay(spacex);</script>