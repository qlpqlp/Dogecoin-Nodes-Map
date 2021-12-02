<?php
/**
*   File: Functions used on the Doge Nodes Map
*   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
*   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
*   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
*/
    // if cron is runnin we connect to the Dogecon Core Node
    If (isset($cron)){
        // Include the Dogecoin Core Bridge
        require_once 'vendors/jsonRPCClient.php';
        $DogePHPbridgeCommand = new jsonRPCClient($dogecoinCoreProtocol.$rpcuser.':'.$rpcpassword.'@'.$dogecoinCoreServer.':'.$dogecoinCoreServerPort);
     };


    // Add the PDO DB Connection
    $db = 'mysql:host='.$dbhost.';dbname='.$dbname;
    $opt = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
    try {
      $pdo = new PDO($db, $dbuser, $dbpass, $opt);
      }
    catch (PDOException $e) {
      echo '<br>DB Error: ' . $e->getMessage() . '<br><br>'; echo '<br>This page will auto refresh in 5 seconds to check if the issue is resolved!'; header("Refresh:5"); exit();
     };


// class DogeBridge to be able to interact beetwin DB and Dogecoin Core RCP
class DogeBridge {

    private $pdo;     // include PDO connections
    private $ipinfoToken;     // include the ipcinfo token
    public function __construct($pdo,$ipinfoToken) {
        $this->pdo = $pdo;
        $this->ipinfoToken = $ipinfoToken;
    }

  // update an existent peer
  public function UpdateNode($id_node,$ip,$version,$subver,$json)
    {

      $db = $this->pdo->query("UPDATE nodes SET
      id_node = '".$id_node."',
      version = '".$version."',
      subver = '".$subver."',
      json = '".$json."',
      date = '".date('Y-m-d H:i:s')."'
      WHERE ip = '".$ip."' limit 1");

      // update tge GEO corrdinates on the peer updated
      //$this->GeoNode($ip);

        return null;
    }

  // add a new peer
  public function AddNode($id_node,$ip,$version,$subver,$json)
    {

      $db = $this->pdo->query("INSERT INTO `nodes` (
      `id_node`,
      `ip`,
      `version`,
      `subver`,
      `json`,
      `date`
      ) VALUES (
      '$id_node',
      '$ip',
      '$version',
      '$subver',
      '$json',
      '".date('Y-m-d H:i:s')."'
      );");

      // update tge GEO corrdinates on the peer added
      $this->GeoNode($ip);

        return null;
    }

   //find a peer
  public function FindNode($ip)
    {

      $db = $this->pdo->query("SELECT * FROM nodes where ip='".$ip."' limit 1");
      if ($db->fetch()){
              return 1;
      };
      return false;
    }

  //add/update GEO location
  public function GeoNode($ip)
    {

      $ippre = explode(":",$ip);
      $details = json_decode(file_get_contents("http://ipinfo.io/".$ippre[0]."?token=".$this->ipinfoToken));
      $geo = explode(",",$details->loc);
      if (isset($details->country)){ // make sure ipinfo.io is working
        $db = $this->pdo->query("UPDATE nodes SET
        lat = '".$geo[0]."',
        lon = '".$geo[1]."',
        country = '".filter_var($details->country, FILTER_SANITIZE_STRING)."',
        city = '".filter_var($details->city, FILTER_SANITIZE_STRING)."'
        WHERE ip = '".$ip."' and lat = '' and lon = '' limit 1");
      };
        return null;
  }

  // Fix all blank GEO location nodes to make sure the data is OK
  public function FixGeoNode()
    {

    $dbq = $this->pdo->query("SELECT * FROM nodes where lat = ''");
    while ($row = $dbq->fetch()) {

      $ippre = explode(":",$row["ip"]);
      $details = json_decode(file_get_contents("http://ipinfo.io/".$ippre[0]."?token=".$this->ipinfoToken));
      $geo = explode(",",$details->loc);
      if (isset($details->country)){ // make sure ipinfo.io is working
        $db = $this->pdo->query("UPDATE nodes SET
        lat = '".$geo[0]."',
        lon = '".$geo[1]."',
        country = '".filter_var($details->country, FILTER_SANITIZE_STRING)."',
        city = '".filter_var($details->city, FILTER_SANITIZE_STRING)."'
        WHERE ip = '".$row["ip"]."' limit 1");
      };
      };
        return null;

  }

  // This functions is to get the visitor real IP to trey to detect if he has any Doge Coin Node on the MAP
  public function getIPAddress() {
   //whether ip is from the share internet
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
     }
    //whether ip is from the remote address
    else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
     return $ip;
  }

};

    $d = new DogeBridge($pdo,$ipinfoToken);

    // if cron is runnin, we update the peers, if not, we only validate IP check's
    If (isset($cron)){
        // We get all peers/nodes from the Dogecoin Blochain
        $result = $DogePHPbridgeCommand->getpeerinfo();

        // only clean banned nodes IP's if is 00:01 on the 1,3,6,9,12,15,18,21,24,27 or on day30 to give some time to catch all peers
        //$array_days = array(1,3,6,9,12,15,18,21,24,27,30);
        $array_days = array(1,4,8,12,16,20,24,28); // reduze the clear banned from 6 to 4 days
        $days = array_search(date("d"), $array_days);
        if ($days >= 1) {
          if (date("H:i") == "00:05"){
        // we send the Dogecoin Core command to remove all banned peers to catch again all
            $DogePHPbridgeCommand->clearbanned();
          };
        }

        // Quick clean all banned peers
        //$DogePHPbridgeCommand->clearbanned();

        // Quick fix all blank geo postions just uncomment below and let it run once
        //$d->FixGeoNode();

        // Go thru all peers detected to add new or update the olde ones
        $total = count($result);
        for ($i = 0; $i < $total; $i++ ) {

            // if it it dosent fint the peer, we add the new peer to the DB
            if ($d->FindNode($result[$i]["addr"]) != 1){
                $d->AddNode($result[$i]["id"],$result[$i]["addr"],$result[$i]["version"],$result[$i]["subver"],json_encode($result[$i]));
            }else{
            // if the peer alredy exists then we update the DB with the new data
                $d->UpdateNode($result[$i]["id"],$result[$i]["addr"],$result[$i]["version"],$result[$i]["subver"],json_encode($result[$i]));
            };

            // we ban the IP to be able to detect new peers
            $ip = explode(":",$result[$i]["addr"]);

            // we only ban 50% of peers because of the minning and validating process
            if ($i < ($total / 2)){
              if ($total > 5){ // only ban if above 5 nodes to prevent the node and wallets from running correctly
                $result1 = $DogePHPbridgeCommand->setban($ip[0],"add");
              };
            };
        };

    }else{
        // This is to get the visitor IP
        $real_ip = $d->getIPAddress();

        // we can also send an IP to the browser with GET like ?DogeNodeIp=127.0.0.1 to find a specific IP on the peers found
        if (isset($_GET["DogeNodeIp"])){
          // This is to get the an IP Adress from the URL exemple: https://what-is-dogecoin.com/nodes?DogeNodeIp=1.1.1.1 to try to find a specific IP on the MAP
          $real_ip = explode(":",$_GET["DogeNodeIp"]);
          // Now we filter if its really an valid IP because of the Hacks and also non IP's submited
          if (filter_var($real_ip[0], FILTER_VALIDATE_IP)) {
              $real_ip = $real_ip[0];
          }else{
              $real_ip = "";
          };
        };

    };
?>