<?php
/**
*   File: Default Configuration of Doge Nodes Map
*   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
*   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
*   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
*/
    //ini_set('display_errors', 1); to debug uncomment this
    // Add your Data Base credentials here!
    $dbhost = "localhost";  // put here you database adress
    $dbname = "nodes"; // your DB name
    $dbuser = ""; // your DB username
    $dbpass = ""; // your DB password

    // Add your Dogecoin Core Node credentials here!
    $rpcuser = "";
    $rpcpassword = "";
    $dogecoinCoreProtocol = "http://";
    $dogecoinCoreServer = "";
    $dogecoinCoreServerPort = 22555;

     // Your https://ipinfo.io/ Token to get GEO Coordenates from peers
    $ipinfoToken = "";

    // Here we define all Dogecoin Core Versions to be found and displayed on bottom of the Map
    $DogeNodeVersions = array("1.14.5","1.14.6","1.21");

    // Here we difine the message and link that shows on bottom center
    $DogeNodesBottomMessage = "Want to run your own Dogecoin Full Node?";
    $DogeNodesBottomMessageLink = "https://github.com/dogecoin/dogecoin/blob/master/doc/getting-started.md";
?>