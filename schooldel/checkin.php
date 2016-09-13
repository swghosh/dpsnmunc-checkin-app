<?php
include_once("../db.php");

function form_error() {
    die(header('Location: ../wrong.html'));
}

//Form Validation
if(isset($_POST['name']) == false || isset($_POST['number']) == false || isset($_POST['school']) == false || isset($_POST['committee']) == false) {
    form_error();
}

if(empty($_POST['name']) || empty($_POST['number']) || empty($_POST['school']) || empty($_POST['committee'])) {
    form_error();
}

$number = htmlspecialchars($_POST['number']);
$school = htmlspecialchars($_POST['school']);
?>
<!doctype html>
<html>
    <head>
        <title>Infinnovation'16 e-Check-In Pass</title>
        <meta name="viewport" content="width=device-width, user-scalable=yes">
        <link rel="stylesheet" href="../style2.css" type="text/css" />
        <meta name="theme-color" content="#336">
    </head>
    <body>
      <h1>Infinnovation'16 check-in pass!</h1>
      <ul>
        <li><span>School Participation</span></li>
        <li><span><?php echo $school; ?></span></li>
        <li><span><?php echo $number; ?></span></li>
        <?php
        for($i = 0; $i < sizeof($_POST['name']); $i++) {
          $name = $_POST['name'][$i];
          $committee = $_POST['committee'][$i];
          $sql = "INSERT INTO `participants` (`name`,`number`,`school`,`committee`) VALUES ('$name','$number','$school','$committee');";
          if(mysqli_query($db, $sql) == false) {
              die("Form Data Submission Error.");
          }
          echo "<li><span>".$name." - ".$committee."</span></li>\n";
        }
        ?>
      </ul>
      <p>Welcome aboard!</p>
      <p><small>You may exit this app at this moment.<br>Please do not press the back button at this time.<br>Please show us this page at our check-in desk.<br></small></p>
      <p>Thank You for your co-operation!</p>
    </body>
</html>