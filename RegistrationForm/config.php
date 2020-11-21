<?php
$db_user = "root";
$db_pass = "";
$db_name = "vesrepo";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';chaset=utf8',$db_user,$db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
