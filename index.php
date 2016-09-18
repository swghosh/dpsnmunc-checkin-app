<?php
include_once('db.php');
$sql = "SELECT `name` FROM `schools` ORDER by `name`;";
$res = mysqli_query($db, $sql);
$schools = array();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Infinnovation'16 e-Check-In</title>
        <meta name="viewport" content="width=device-width, user-scalable=yes">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <meta name="theme-color" content="#336">
    </head>
    <body>
        <header>
            <div class="wrapper">
                <div class="header">
                    <br/>
                    <div id="imageatr"><img src="images/logo.png"></div>
                    <h1>Infinnovation<br>e-Check-In <sup><small id="beta">&nbsp;beta&nbsp;</small></sup><br/><span id="tagline">&quot;Welcome, participants!&quot;</span></h1>
                    <br/>
                </div>
            </div>
            <div class="navbar">
	            <ul>
                    <li id="togglemenu"><a href="#menu" id="menubutton">&equiv;</a></li>
                    <li id="flogo"><a class="flogolink">infinnovation<br><small>e-check-in</small></a></li>
                    <li><a href="/">application home<br><small>checkin</small></a></li>
                    <li><a href="https://facebook.com/infinnovation16" target="_system">facebook page<br><small>fb.com/infinnovation16</small></a></li>
                    <li><a href="http://www.infinnovation.co" target="_system">our website<br><small>www.infinnovation.co</small></a></li>
	            </ul>
            </div>
        </header>
        <div class="content1">
            <br>
            <script src="formvalidate.js"></script>
            <form id="application" method="POST" action="schooldel/index.php" onsubmit="return formValidateSchool()">
                <label for="school">Your school's name</label><br>
                <select name="school">
                    <?php
                        while($row = mysqli_fetch_array($res)) {
                            $school = htmlspecialchars($row['name']);
                            $str = "<option value=\"".$school."\">".$school."</option>";
                            echo $str."\n";
                        }
                    ?>
                </select><br><br>
                <label for="number">Number of participants</label><br>
                <input type="number" name="number" placeholder="size"><br><br>
                <span><sup>*</sup><small>Participation size is inclusive of faculty advisors.</small></span>
                <br><br>
                <label for="uid">Provided Unique ID</label><br>
                <input type="password" name="uid" placeholder="unique id"><br><br>
                <label for="cnumber">Your contact number</label><br>
                +91<input type="number" name="cnumber" placeholder="contact number"><br><br>
                <span><sup>*</sup><small>Faculty advisor's contact number should be used.</small></span>
                <br><br>
                <button class="button" type="submit"> proceed </button>
            </form>
            <br>
        </div>
        <footer>
            <div class="foot">
                <br>&copy; Infinnovation'16.<br><a href="http://infinnovation.co/" target="_system">www.infinnovation.co</a><br>Made with <span class="heart">&hearts;</span> and JavaScript.<br><br>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script src="base.js"></script>
        <?php
            if(isset($_GET['uidmismatch'])) {
                echo "<script>uidMismatch();</script>\n";
            }
        ?>
    </body>
</html>
