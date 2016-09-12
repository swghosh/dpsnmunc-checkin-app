<?php
//Set database settings
$host = getenv("OPENSHIFT_MYSQL_DB_HOST");
$username = getenv("OPENSHIFT_MYSQL_DB_USERNAME");
$password = getenv("OPENSHIFT_MYSQL_DB_PASSWORD");
$database = "infinnovationcheckin";
//-----------------------------
$db = mysqli_connect($host, $username, $password, $database) or die("Database connection failed.");
