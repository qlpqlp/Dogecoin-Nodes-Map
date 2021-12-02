<?php
/**
*   File: DogeCoin Nodes
*   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
*   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
*   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
*/

    // now we initialize some variables to count them
    $i = 0;$t001 = 0;

    // Here we generate a random number to hode the DogeEggs below
    $HideDogeEgg = rand(100,1000);

    // Now we will find all nodes that have the Longitude and Latitude fields filled, to display them on the Map, but only the last 14 days nodes that where updated recently because of the offline nodes or dynamic IP's
    $db = $pdo->query("SELECT * FROM nodes where lat !='' and lon !='' and date >= DATE(NOW()) - INTERVAL 7 DAY order by lat,lon");
    while ($row = $db->fetch()) {

      // We try to fix the location wen the same node is in the same longitude and latitude then outhers
      $new_lat = $row["lat"];
      $new_lon = $row["lon"];
      if ($new_lat == $old_lat){ $new_lat = $row["lat"] + 0.002; };
      if ($new_lon == $old_lon){ $new_lon = $row["lon"] + 0.002; };
      $old_lat = $row["lat"];
      $old_lon = $row["lon"];

      // if the peer order is the same then the random generated number, then include the DogeEggs
      if ($i == $HideDogeEgg){
        // We Include the DogeEggs to try to Hide a litle
        include("DogeEggs.php");
      }

      // we add the Grey DogeMiner by default
      $class = "greyDogeMiner";

      $json = json_decode($row["json"]);

      // find known node versions
      foreach ($DogeNodeVersions as $value) {
          $pos = strpos($row["subver"], $value);
          if ($pos !== false) {
            $class = "yhellowDogeMiner";
            if (!isset($DogeNodeVersionsCheck[$value])){ $DogeNodeVersionsCheck[$value] = 0; };
            $DogeNodeVersionsCheck[$value] = $DogeNodeVersionsCheck[$value] + 1;
          };
      };

      // check node fees filter 0.01
      if ($json->feefilter <= 0.01){ $t001++; };

      // check if the node has fees at 0.001, if not change the marker to blue
      if ($class == "yhellowDogeMiner"){ if ($json->feefilter > 0.01){ $class = "blueDogeMiner"; }; };

      // Check if the Node/Peer IP is the same that the user is showing to show the Red DogeMiner animation
      $ip = ""; $ip_only = $row["ip"]; $ip_only = explode(":",$ip_only); if ($ip_only[0] == $real_ip){ $ip = "<br>IP: ".$row["ip"]; $class = "redDogeMiner"; $pdo->query("UPDATE nodes SET verified = '1' WHERE id='".$row["id"]."' limit 1"); };

        // Now we add the Dogecoin Node Marker to the map
?>
    <div id="marker<?php echo $row["id"];?>" class="<?php echo $class; ?> lazyload" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<?php echo $row["subver"];?><br>Version:<?php echo $row["version"];?><?php echo $ip;?><br>Country:<?php echo $row["country"];?><br>City:<?php echo $row["city"];?>"></div>
    <script type="text/javascript"> var pos<?php echo $row["id"];?> = ol.proj.fromLonLat([<?php echo $new_lon;?>, <?php echo $new_lat;?>]); var marker<?php echo $row["id"];?> = new ol.Overlay({ position: pos<?php echo $row["id"];?>, positioning: 'center-center', element: document.getElementById('marker<?php echo $row["id"];?>'), stopEvent: false }); map.addOverlay(marker<?php echo $row["id"];?>); </script>
<?php
  $i++;
  };
?>
<div class="row" style="position: absolute; bottom: 0px; margin: 0px; width: 100% !important">
    <?php if ($DogeNodesBottomMessage != ""){ ?>
    <div class="col-12">
      <button type="button" class="btn btn-dark" style="background-color: rgba(10, 0, 0, 0.5)">
        <a href="<?php echo $DogeNodesBottomMessageLink; ?>" style="color: rgba(255, 255, 255, 1); text-decoration: none"><?php echo $DogeNodesBottomMessage; ?></a>
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
      <button type="button" class="btn btn-primary">
        Node FeeFilter @ 0.01: <span class="badge bg-light" style="color: #000000"><?php echo $t001; ?></span>
      </button>
    </div>