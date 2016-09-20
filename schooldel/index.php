<?php
function form_error() {
    die(header('Location: ../wrong.html'));
}

//Form Validation
if(isset($_POST['school']) == false || isset($_POST['number']) == false || isset($_POST['cnumber']) == false || isset($_POST['uid']) == false) {
    form_error();
}

if(empty($_POST['school']) || empty($_POST['number']) || empty($_POST['cnumber'])  || empty($_POST['uid'])) {
    form_error();
}

$number = intval(htmlspecialchars($_POST['number']));
$school = htmlspecialchars($_POST['school']);
$cnumber = htmlspecialchars($_POST['cnumber']);

//Form unique id validation
include_once('../db.php');
$uid = htmlspecialchars($_POST['uid']);
$sql = "SELECT * FROM schools WHERE uid = '$uid' AND name = '$school';";
$res = mysqli_query($db, $sql);
if(mysqli_num_rows($res) != 1) {
    die(header('Location: ../?uidmismatch'));
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Infinnovation'16 e-Check-In</title>
        <meta name="viewport" content="width=device-width">
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
            <script src="../formvalidate.js"></script>
            <form id="application" method="POST" action="checkin.php" onsubmit="return formValidateParticipant()">
                <span><sup>*</sup><small>Please fill in this form carefully.<br>Make sure that you provide us correct spellings for the partipant names and their respective events.<br>Please double-check all information before checking in.</small></span>
                <br><br>
                <?php
                $string = "<label for=\"name\" id=\"name\">Name</label><br>
                <input type=\"text\" name=\"name[]\" placeholder=\"full name\" id=\"name\"><br><br>
                <label for=\"committee\">Event</label><br>
                <select name=\"committee[]\">
                    <option value=\"faculty\">Faculty Advisor</option>
                    <option value=\"infiinvest\">Infi-Invest</option>
                    <option value=\"infilaunch\">Infi-Launch</option>
                    <option value=\"infiepaper\">Infi-E-Paper</option>
                    <option value=\"infiquiz\">Infi-Quiz</option>
                    <option value=\"inficonnect\">Infi-Connect</option>
                </select><br><br><br><br>";
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
                <br>&copy; Infinnovation'16.<br>Made with <span class="heart">&hearts;</span> and JavaScript.<br>
                Designed and Developed by <a href="https://facebook.com/swghosh" target="_blank" onclick="window.open('https://www.github.com/swghosh');">Swarup Ghosh</a>.<br>
                <a href="https://twitter.com/SwG_Ghosh" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @SwG_Ghosh</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script><br><br>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script async src="../base.js"></script>
    </body>
</html>
