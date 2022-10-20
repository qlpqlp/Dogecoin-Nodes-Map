        <script type="text/javascript">

        var addressPoints = [
        <?php
        /**
        *   File: DogeCoin Nodes
        *   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
        *   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
        *   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
        */

                // now we initialize some variables to count them
                $i = 0;$t001 = 0; $starlinknodes = 0;

                // Now we will find all nodes that have the Longitude and Latitude fields filled, to display them on the Map, but only the last 14 days nodes that where updated recently because of the offline nodes or dynamic IP's
                $db = $pdo->query("SELECT * FROM nodes where lat !='' and lon !='' and date >= DATE(NOW()) - INTERVAL 15 DAY order by lat,lon");
                while ($row = $db->fetch()) {

                    // Just to make sure everyone is relaxed we randomize some degrees on the actual Internet Service Provider location
                    $new_lat = $row["lat"] + 0.00.(rand(1,4));
                    $new_lon = $row["lon"] + 0.00.(rand(1,4));

                    // we add the Grey DogeMiner by default
                    $class = "greyDogeMiner";

                    // find known node versions
                    foreach ($DogeNodeVersions as $value) {
                            $pos = strpos($row["subver"], $value);
                            if ($pos !== false) {
                                $class = "yhellowDogeMiner";
                                if (!isset($DogeNodeVersionsCheck[$value])){ $DogeNodeVersionsCheck[$value] = 0; };
                                $DogeNodeVersionsCheck[$value] = $DogeNodeVersionsCheck[$value] + 1;
                            };
                    };

                    $dogeIcon = "dogeIcon";

                    // find starlink nodes
                    $pos = strpos($row["ipinfo"], "starlink");
                    if ($pos !== false) {
                        $starlinknodes = $starlinknodes + 1;
                        $class = "starlinkDogeMiner";
                        //$starlink .= "var title = \"Starlink<br>".$row["subver"]."<br>Version:".$row["version"]."<br>".$ip."Country:".$row["country"]."<br>City:".$row["city"]."\"; theMarker = L.marker([".$new_lat.",".$new_lon."], { title: title,icon: starlinkdogeIcon }).addTo(map).bindPopup(title);";
                        $dogeIcon = "starlinkdogeIcon";
                    };

                    //we dont allow the known mobile wallets like the langerhans Android Wallet because they are not nodes :)
                    $pos = strpos($row["subver"], "bitcoinj:0.15.9/Dogecoin Wallet:4.0.0");
                    if ($pos === false) {
                            // Now we add the Dogecoin Node Marker to the map
                            echo '['.$new_lat.', '.$new_lon.', "'.$row["subver"].'<br>Version:'.$row["version"].'<br>'.$ip.'Country:'.$row["country"].'<br>City:'.$row["city"].'", "'.$dogeIcon.'"],';
                            $i++;
                    };
            };

        ?>
        ]
        </script>