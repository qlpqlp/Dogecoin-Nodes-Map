<h1 align="center">
Dogecoin Nodes Map
<br><br>
<img src="https://what-is-dogecoin.com/nodes/img/dogeload.gif" alt="Dogecoin Nodes Map" width="300"/>
<br><br>
</h1>

## How to Install 💻

1- Get an Hosting  Account tor Web Server that supports ```PHP (V. 7 =>)``` + ```MySQL/MariaDB``` (also works locally with Docker or Xampp for exemple)

2- Create an Data Base and import the file ```nodes.sql```

3- Get create an account on ipinfo.io and generate a token.

4- Open the file with any text editor ```inc/config.php``` and follow the configurations needed

5- Upload all files (excluding nodes.sql and readme.md) to your Hosting Account

6- Add a cron task to the file cron.php, and let it run every minute and enjoy it :)

###Notes:

- It dosent store the Dogecoin Node IP on the Map Database. The GPS coordinates are taken from the Internet Service provider registration address and not from the node IP home address.
