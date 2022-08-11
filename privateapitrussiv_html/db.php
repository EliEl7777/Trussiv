<?php

$db_name = "equi-264607:us-central1:trussivmysql";
$db_server = "35.184.61.149";
$db_user = "p1002810957360-v0la13@gcp-sa-cloud-sql.iam.gserviceaccount.com";
$db_pass = "Sea0710579";

$db = new PDO("mysql:host={$db_server};dbname={$db_name};charset=utf8", $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
