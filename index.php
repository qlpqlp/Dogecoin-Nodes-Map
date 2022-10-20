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
    <meta name="description" content="Where are the Dogecoin nodes?">
    <meta name="description" content="Coded with the love for the Dogecoin Crypto, you can now see all Dogecoin Nodes on a World Map, in the future Moon and Mars also!">
    <meta name="author" content="All Dogecoin Community!">
    <meta name="generator" content="You!">
    <link href="//what-is-dogecoin.com/nodes/dogemining.ico" rel="icon" />

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin="" />
    <link href="//fonts.googleapis.com/css2?family=Comic+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/doge.css" type="text/css" type="text/css">

    <script src="//cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <script src="//unpkg.com/leaflet@1.0.3/dist/leaflet-src.js" integrity="sha512-WXoSHqw/t26DszhdMhOXOkI7qCiv5QWXhH9R7CgvgZMHz1ImlkVQ3uNsiQKu5wwbbxtPzFXd1hK4tzno2VqhpA==" crossorigin=""></script>
    <script src="js/leaflet.markercluster-src.js"></script>
    <!-- we include all Dogecoin Nodes on the Map -->
    <?php include("inc/markers/inc/DogecoinNodes.php"); ?>
    <!-- Here we show a cool Doge Minner wen the page is loading -->
    <script type="text/javascript">$(window).on('load', function() { $(".dogeload").fadeOut("slow"); });</script>
  </head>
  <body>
    <!-- We Include the Top menu -->
    <?php //include("inc/menu.php"); ?>
    <!-- This is the place to show the cool Doge Minner wen the page is loading -->
    <div class="dogeload"></div>
    <!-- This is the place to show the world map usinf OpenLayers and OpenStreetMap  -->
    <div id="map" class="map"></div>
    <!-- This is the javascript file that loads some of the Markers behaviors and also initialize the OpenLayers with OpenStreetMap  -->

<div class="row" style="position: absolute; bottom: 0px; margin: 0px; width: 100% !important">
    <?php if ($DogeNodesBottomMessage != ""){ ?>
    <div class="col-12" id="slides">
      <button type="button" class="btn btn-dark" style="background-color: rgba(10, 0, 0, 0.5)">
        <a href="<?php echo $DogeNodesBottomMessageLink; ?>" target="_blank" style="color: rgba(255, 255, 255, 1); text-decoration: none"><?php echo $DogeNodesBottomMessage; ?></a>
      </button>
    </div>
    <?php };?>
    <div class="col">
      <button type="button" class="btn btn-light">
        Total Nodes: <span class="badge bg-dark"><?php echo $i; ?></span>
      </button>
    </div>
<?php
    foreach ($DogeNodeVersionsCheck as $key => $value) {
?>
    <div class="col">
      <button type="button" class="btn btn-warning">
        Running <?php echo $key;?>: <span class="badge bg-light" style="color: #000000"><?php echo $value; ?></span>
      </button>
    </div>
<?php
    };
?>
    <div class="col">
      <button type="button" class="btn btn-primary" style="background-color: rgba(0, 0, 0, 1); border-color: rgba(0, 0, 0, 1)" >
        SpaceX Starlink Nodes: <span class="badge bg-light" style="color: #000000"><?php echo $starlinknodes; ?></span>
      </button>
    </div>
    <!-- we include all markers + the Aditional like Dogecoin Foundation, SpaceX, Tesla etc. -->
    <?php include("inc/markers/inc/Extra.php"); ?>
</body>
</html>