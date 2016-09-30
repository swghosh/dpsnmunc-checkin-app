<?php
include_once("../db.php");

$sql = "SELECT * FROM `participants`;";
$res = mysqli_query($db, $sql);
$number = mysqli_num_rows($res);

header('Content-Type: application/json');

$kext = array('total' => $number);

print(json_encode($kext));
