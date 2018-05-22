<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$usernameserver = $url["user"];
$passwordserver = $url["pass"];
$db = substr($url["path"], 1);
$host= "mysql:host=$server;dbname=$db";
?>