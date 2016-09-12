<?php
include_once("../db.php");

$sql = "SELECT * FROM `participants`;";
$res = mysqli_query($db, $sql);
$number = mysqli_num_rows($res);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>DPSNMUNC'16 FOOTFALL</title>
        <meta name="viewport" content="width=device-width, user-scalable=yes">
        <link rel="stylesheet" href="../style2.css" type="text/css" />
        <meta name="theme-color" content="#336">
    </head>
    <body>
      <h1><?php echo $number;?></h1>
<!--
      <ul>
        <li><span>Individual Applicants: <?php echo $indidel; ?></span></li>
        <li><span>School Delegation: <?php echo $schooldel; ?></span></li>
        <li><span>DPS Newtown Delegates: <?php echo $dpsndel;?></span></li>
      </ul>
-->
      <p>Infinnovation 2016<br><small>Delhi Public School Newtown</small></p>
    </body>
</html>
