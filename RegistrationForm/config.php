<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "lol";
$db_name = "vesrepo";
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';chaset=utf8',$db_user,$db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
