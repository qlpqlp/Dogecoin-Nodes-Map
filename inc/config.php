<?php
/**
*   File: Default Configuration of Doge Nodes Map
*   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
*   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
*   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
*/
    // Add your Data Base credentials here!
    $dbhost = "localhost";  // put here you database adress
    $dbname = ""; // your DB name
    $dbuser = ""; // your DB username
    $dbpass = ""; // your DB password

    // Add your Dogecoin Core Node credentials here!
    $rpcuser = "";
    $rpcpassword = "";
    $dogecoinCoreProtocol = "http://";
    $dogecoinCoreServer = "localhost";
    $dogecoinCoreServerPort = 22555;

     // Your https://ipinfo.io/ Token to get GEO Coordenates from peers
    $ipinfoToken = "";

    // Add your Twitter Dev credentials here! Apply for a Dev account here: https://dev.twitter.com/apps/
    $TwitterAccessToken = "j";
    $TwitterAccessTokenSecret = "";
    $TwitterConsumerKey = "";
    $TwitterConsumerSecret = "";

    // Here we define all Dogecoin Core Versions to be found and displayed on bottom of the Map
    $DogeNodeVersions = array("1.14.5","1.14.6","1.21");

    // What Word to find on Twitter to show the last post on Doge Nodes Map?
    $TwitterSpecialTag = "WhatisDogecoin";

    // Here we difine the message and link that shows on bottom center
    $DogeNodesBottomMessage = "Want to run your own Dogecoin Full Node? just follow this steps here!";
    $DogeNodesBottomMessageLink = "https://dogecoinisawesome.com/full-node";
?>