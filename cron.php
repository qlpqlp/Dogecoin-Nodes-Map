<?php
/**
*   File: Cron used execute background tasks to interact with Dogecoin Core Node
*   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
*   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
*   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
*/
    // we load the configurationb file
    include("inc/config.php");
    $cron = 1; //we specified this flag to only actuvate some functions to run wen CRON, to only comunicate with the Dogecoin Core Wallet
    // we load the functions file
    include("inc/functions.php");
?>