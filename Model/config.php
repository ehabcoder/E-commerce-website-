<?php
 ob_start();
 session_start();
 $timezone = date_default_timezone_set("Africa/Cairo");

 define("DB_HOST", "localhost:3307");
 define("DB_USER", "root");
 define("DB_PASS", "");
 define("DB_NAME", "market");

 try {
   $dns = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
   $dbh = new PDO($dns, DB_USER, DB_PASS);
 } catch (PDOException $e) {
   exit("Error: ". $e->getMessage());
 }
