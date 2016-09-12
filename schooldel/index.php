<?php
function form_error() {
//    die(header('Location: ../wrong.html'));
}

//Form Validation
if(isset($_POST['school']) == false || isset($_POST['number']) == false || isset($_POST['cnumber']) == false) {
    form_error();
}

if(empty($_POST['school']) || empty($_POST['number']) || empty($_POST['cnumber'])) {
    form_error();
}

$number = intval(htmlspecialchars($_POST['number']));
$school = htmlspecialchars($_POST['school']);
$cnumber = htmlspecialchars($_POST['cnumber']);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Infinnovation'16 e-Check-In</title>
        <meta name="viewport" content="width=device-width, user-scalable=yes">
        <link rel="stylesheet" href="../style.css" type="text/css" />
        <meta name="theme-color" content="#336">
    </head>
    <body>
        <header>
            <div class="wrapper">
                <div class="header">
                    <br/>
                    <div id="imageatr"><img src="../images/logo.png"></div>
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
            <form id="application" method="POST" action="checkin.php">
                <?php
                $string = "<label for=\"name\" id=\"name\">Name</label><br>
                <input type=\"text\" name=\"name[]\" placeholder=\"full name\" id=\"name\"><br><br>
                <label for=\"committee\">Committee</label><br>
                <select name=\"committee[]\">
                    <option value=\"general assembly\">General Assembly - DISEC</option>
                    <option value=\"security council\">Security Council</option>
                    <option value=\"ecosoc\">ECOSOC</option>
                    <option value=\"international press\">International Press Corps</option>
                    <option value=\"coc\">Clash of Caricatures</option>
                    <option value=\"photo\">Photography Videography</option>
                    <option value=\"faculty\">Faculty Advisor</option>
                </select><br><hr><br>";
                for($i = 1; $i <= $number; $i++) {
                  echo $string."\n";
                }
                ?>
                <input type="hidden" name="school" value="<?php echo $school; ?>">
                <input type="hidden" name="number" value="<?php echo $cnumber; ?>">
                <button class="button" type="submit"> check-in </button>
            </form>
            <br>
        </div>
        <footer>
            <div class="foot">
                <br>
                <br>&copy; Infinnovation'16.<br><a href="http://infinnovation.co/" target="_system">www.infinnovation.co</a><br>Made with <span class="heart">&hearts;</span> and JavaScript.<br><br>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script src="base.js"></script>
    </body>
</html>
