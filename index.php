<?php
/**
*   File: Index file of Doge Nodes Map
*   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
*   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
*   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
*/
    // Now we include the basic configurations for Doge Nodes Map
    include("inc/config.php");
    // Now we include the basic functions for Doge Nodes Map
    include("inc/functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dogecoin Nodes Map!</title>
    <meta name="description" content="Coded with the love for the Dogecoin Crypto, you can now see all Dogecoin Nodes on a World Map, in the future Moon and Mars also!">
    <meta name="author" content="All Dogecoin Community!">
    <meta name="generator" content="You!">
    <link href="//what-is-dogecoin.com/nodes/dogemining.ico" rel="icon" />

    <link rel="stylesheet" href="css/doge.css" type="text/css" type="text/css">
    <link rel="stylesheet" href="inc/markers/css/DogecoinNodes.css" type="text/css" type="text/css">
    <link rel="stylesheet" href="inc/markers/css/DogeEggs.css" type="text/css" type="text/css">
    <link rel="stylesheet" href="inc/markers/css/SpaceX.css" type="text/css" type="text/css">
    <link rel="stylesheet" href="inc/markers/css/Tesla.css" type="text/css" type="text/css">
    <link rel="stylesheet" href="inc/markers/css/TheOceanCleanup.css" type="text/css" type="text/css">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/css/ol.css" type="text/css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/build/ol.js"></script>
<!-- Here we show a cool Doge Minner wen the page is loading -->
    <script type="text/javascript">$(window).on('load', function() { $(".dogeload").fadeOut("slow"); });</script>
  </head>
  <body>
    <!-- We Include the Top menu -->
    <?php include("inc/menu.php"); ?>
    <!-- This is the place to show the cool Doge Minner wen the page is loading -->
    <div class="dogeload"></div>
    <!-- This is the place to show the world map usinf OpenLayers and OpenStreetMap  -->
    <div id="map" class="map"></div>
    <!-- This is the javascript file that loads some of the Markers behaviors and also initialize the OpenLayers with OpenStreetMap  -->
    <script src="js/doge.js"></script>
    <!-- We Include the SpaceX Starlink Satelites and Rockets -->
    <?php include("inc/markers/inc/SpaceX.php"); ?>
    <!-- We Include the Tesla Factories -->
    <?php include("inc/markers/inc/Tesla.php"); ?>
    <!-- We Include the The Ocean Cleanup Interceptors -->
    <?php include("inc/markers/inc/TheOceanCleanup.php"); ?>
    <!-- We Include the The DogeEggs -->
    <?php include("inc/markers/inc/DogeEggs.php"); ?>
    <!-- We Include the DogeCoin Nodes -->
    <?php include("inc/markers/inc/DogecoinNodes.php"); ?>
    <!-- We Include the Twitter API -->
    <?php include("inc/markers/inc/Twitter.php"); ?>

    <!-- by default this DIV is hodden on the code, to display the real user IP adress -->
    <div class="col" style="position: absolute; top: 0px; right: 0px; padding: 0px; margin: 0px; text-align: right; display: none">
    <button type="button" class="btn btn-dark">
      Your IP: <span class="badge bg-light" style="color: #000000"><?php echo $real_ip; ?></span>
    </button>
    </div>
    <!-- We initialise the Tool Tips PopUp on Mouse/Finger Hover-->
    <script type="text/javascript"> var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')); var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) { return new bootstrap.Tooltip(tooltipTriggerEl); })</script>
  </body>
</html>